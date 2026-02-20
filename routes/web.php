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
use App\Livewire\VerifyUser;

Route::get('/', [HomepageController::class, 'index', 'departments' => \App\Models\Department::all()])->middleware('preventbackhistory')->name('homepage');


// superadmin
Route::get('/account', function () {
    return view('page.super_admin.accountReview');
})->name('accountReview');
Route::get('/superadmin', function () {
    return view('page.super_admin.dashboard');
})->name('superadmin');
Route::get('/staffAccount', function () {
    return view('page.super_admin.staffAccounts');
})->name('staffAccount');




Route::get('/map', function () {
    return view('page.admin.map');
})->name('map');
Route::get('/messages', function () {
    return view('page.admin.message');
})->name('messages');
Route::get('/adminlogin', function () {
    return view('page.admin.authentication.login');
})->name('adminlogin');
Route::get('/Reports', function () {
    return view('page.admin.reportsManagement');
})->name('reports');
Route::get('/tracker', function () {
    return view('page.admin.IssueTracker');
})->name('tracker');
Route::get('/dashboard', function () {
    return view('page.admin.mainDashboard');
})->name('dashboard');

Route::get('/login-form', LoginForm::class)->name('login-form');

Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/forgotpassword', [AuthController::class, 'showForgotPasswordForm'])->name('forgotpassword');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'custom:user', 'preventbackhistory'])->group(function () {
    Route::get('/create-post', CreatePost::class)->name('create-post');

    Route::get('/latest', [HomepageController::class, 'latestpost'])->name('latest');

    Route::get('/popular', [HomepageController::class, 'popularpost'])->name('popular');

    Route::get('/profile', [HomepageController::class, 'profile'])->name('profile');
    

    Route::get('/search', [HomepageController::class, 'searchPosts'])->name('search');

    Route::get('/message', [HomepageController::class, 'message'])->name('message');
    Route::get('/notifications', [HomepageController::class, 'notifications'])->name('notifications');
});

Route::middleware(['auth', 'AdminMiddleware:employee,superadmin', 'preventbackhistory'])->group(function () {

    
});
