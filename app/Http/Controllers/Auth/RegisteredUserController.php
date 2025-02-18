<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'regex:/^\+372\d{7,8}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $verificationCode = rand(10000, 99999);
        $phone = $request->input('phone');

        $data = $this->smsService->sendCode($phone, $verificationCode);
        if($data['status'] == 'success'){
            $expiresAt = Carbon::now()->addMinutes(5);
            $user = User::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'code' => $verificationCode,
                'password' => Hash::make($request->password),
                'code_expires_at' => $expiresAt
            ]);

            return response()->json([
                'message' => 'Код отправлен!',
                'verification_code' => $verificationCode,
                'user' => $user,
            ], 200);
        }else{
            return response()->json([
                'message' => 'Что-то пошло не так!',
            ], 200);
        }
    }
    public function verifyCode(Request $request): RedirectResponse|JsonResponse
    {
        // Валидация данных
        $request->validate([
            'code' => 'required|numeric|digits:5',
            'phone' => 'required',
        ]);

        // Получение сохраненного кода из сессии
        $phone = $request->input('phone');
        $user = User::where('phone', $phone)->first();
        $storedCode = $user->code;

        // Проверка, совпадает ли введенный код с кодом из сессии
        if ($phone == $storedCode) {
            $user->update([
                'code' => null,
                'code_expires_at' => null,
            ]);

            event(new Registered($user));
    
            Auth::login($user);
            return redirect(route('dashboard', absolute: false));
        } else {
            return response()->json([
                'message' => 'Неверный код, попробуйте снова.',
            ], 400);
        }
    }
}
