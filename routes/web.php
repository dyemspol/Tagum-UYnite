<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Homepage\HomepageController;
use App\Livewire\CreatePost;
use App\Livewire\LoginForm;
use App\Http\Controllers\Employee\EmployeeController;

//HOMEPAGE
Route::get('/', [HomepageController::class, 'index', 'departments' => \App\Models\Department::all()])->middleware('preventbackhistory')->name('homepage');



//HOMEPAGE LOGIN
Route::get('/login-form', LoginForm::class)->name('login-form');

//AUTHENTICATION
Route::get('/signup', [AuthController::class, 'showRegisterForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//FORGOT PASSWORD
Route::get('/forgotpassword', [AuthController::class, 'showForgotPasswordForm'])->name('forgotpassword');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');

//USER
Route::middleware(['auth', 'custom:user', 'preventbackhistory'])->group(function () {
    Route::get('/create-post', CreatePost::class)->name('create-post');

    Route::get('/latest', [HomepageController::class, 'latestpost'])->name('latest');

    Route::get('/popular', [HomepageController::class, 'popularpost'])->name('popular');

    Route::get('/profile', [HomepageController::class, 'profile'])->name('profile');


    Route::get('/search', [HomepageController::class, 'searchPosts'])->name('search');

    Route::get('/message', [HomepageController::class, 'message'])->name('message');
    Route::get('/notifications', [HomepageController::class, 'notifications'])->name('notifications');
});

//SUPERADMIN AND EMPLOYEE
Route::middleware(['auth', 'admin:employee,superadmin', 'preventbackhistory'])->group(function () {

    //EMPLOYEE
    Route::get('/map', [EmployeeController::class, 'map'])->name('map');
    Route::get('/messages', [EmployeeController::class, 'message'])->name('messages');
    Route::get('/Reports', [EmployeeController::class, 'reports'])->name('reports');
    Route::get('/tracker', [EmployeeController::class, 'tracker'])->name('tracker');
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');


    //SUPERADMIN
    Route::get('/account', [AdminController::class, 'accountReview'])->name('accountReview');
    Route::get('/superadmin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/staffAccount', [AdminController::class, 'staffAccounts'])->name('staffAccounts');
});
