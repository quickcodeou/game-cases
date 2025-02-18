<?php

namespace App\Http\Controllers;

use App\Services\FortuneService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FortuneController extends Controller
{
    private $fortuneService;

    public function __construct(FortuneService $fortuneService){
        $this->fortuneService = $fortuneService;
    }

    public function index(){
        $this->fortuneService->list();

        return view('fortune.game', [
            'user' => Auth::user(),
        ]);
    }
}
