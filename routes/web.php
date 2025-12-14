<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Homepage\HomepageController;
use App\Livewire\CreatePost;
use App\Livewire\LoginForm;
use App\Livewire\SignupForm;
use Illuminate\Auth\Events\Login;
use App\Http\Middleware\PreventBackHistory;
use App\Livewire\Navbar;
Route::get('/', [HomepageController::class, 'index', 'departments' => \App\Models\Department::all()])->middleware('preventbackhistory')->name('homepage');



Route::get('/message', function () {
    return view('page.messagePage'); // use dot notation, not slash
})->name('message');



Route::get('/login-form', LoginForm::class)->name('login-form');

Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'custom:user' ,'preventbackhistory'])->group(function () {
    Route::get('/create-post', CreatePost::class)->name('create-post');

    Route::get('/latest', [HomepageController::class, 'latestpost'])->name('latest');

    Route::get('/popular', [HomepageController::class, 'popularpost'])->name('popular');

    Route::get('/profile', [HomepageController::class, 'profile'])->name('profile');
   
    Route::get('/search', [HomepageController::class, 'searchPosts'])->name('search');
});

