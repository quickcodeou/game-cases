<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::post('/send-code', [RegisteredUserController::class, 'sendCode']);
