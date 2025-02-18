<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\SmsService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private $smsService;

    public function __construct(SmsService $smsService){
        $this->smsService = $smsService;
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => 'required|numeric|digits:5',
        ]);
        
        // Получение сохраненного кода из сессии
        $phone = $request->input('phone');
        $user = User::where('phone', $phone)->first();
        $storedCode = $user->code;

        // Проверка, совпадает ли введенный код с кодом из сессии
        if ($request->input('code') == $storedCode) {
            $user->update([
                'code' => null,
                'code_expires_at' => null,
                'phone_verified' => 1,
            ]);

            event(new Registered($user));
            Auth::login($user);
            return redirect(route('dashboard', absolute: false));
        } else {
            return back()->withErrors([
                'code' => 'Incorrect verification code. Please try again.'
            ])->withInput()->with('step', 2);
        }
    }
    public function sendCode(RegisterRequest $request)
    {
        $verificationCode = rand(10000, 99999);
        $phone = $request->input('phone');

        $user = User::where('phone', $phone)->first();
        if (!$user) {
            $data = $this->smsService->sendCode($phone, $verificationCode);
            if($data['status'] == 'success'){
                $expiresAt = Carbon::now()->addMinutes(5);
                $user = User::create([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'code' => $verificationCode,
                    'password' => $request->input('password'),
                    'code_expires_at' => $expiresAt
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Код отправлен!',
                    'verification_code' => $verificationCode,
                    'user' => $user,
                ], 200);
            }else{
                return response()->json([
                    'message' => 'Что-то пошло не так!',
                ], 200);
            }
        }else{
            $notVerifiedUser = User::where('phone', $phone)->where('phone_verified', 0)->first();
            if($notVerifiedUser){
                $data = $this->smsService->sendCode($phone, $verificationCode);
                if($data['status'] == 'success'){
                    $expiresAt = Carbon::now()->addMinutes(5);
                    $notVerifiedUser->update([
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'password' => $request->input('password'),
                        'code' => $verificationCode,
                        'code_expires_at' => $expiresAt
                    ]);
    
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Пользователь существует, но Код отправлен!',
                        'verification_code' => $verificationCode,
                        'user' => $user,
                    ], 200);
                }else{
                    return response()->json([
                        'message' => 'Что-то пошло не так!',
                    ], 200);
                }
            }
            return response()->json([
                'message' => 'Пользователь существует',
            ], 200);
        }
    }
}
