<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Livewire\SignupForm;

Route::get('/', function () {
    return view('page/HomePage');
});

Route::get('/register', SignupForm::class)->name('register');
