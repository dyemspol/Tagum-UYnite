<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Homepage\HomepageController;
use App\Livewire\LoginForm;
use App\Livewire\SignupForm;
use Illuminate\Auth\Events\Login;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');


Route::get('/profile', function () {
    return view('page/profilePage', ['isProfilePage' => true]);
});
Route::get('/login-form', LoginForm::class)->name('login-form');

Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


