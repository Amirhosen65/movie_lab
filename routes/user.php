<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

