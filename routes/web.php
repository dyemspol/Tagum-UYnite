<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Livewire\SignupForm;




Route::get('/', function () {
    return view('page/HomePage', ['isProfilePage' => false]);
});

Route::get('/profile', function () {
    return view('page/profilePage', ['isProfilePage' => true]);
});
Route::get('/login', function () {
    return view('page/loginPage', ['isProfilePage' => true]);
});

Route::get('/signup', function () {
    return view('page/signupPage', ['isProfilePage' => true]);
});


Route::get('/register', SignupForm::class)->name('register');

