<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Apply remember me middleware to all routes
Route::middleware(['web', 'remember.me'])->group(function () {
    
    // Public Frontend Routes (tidak perlu login)
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/news/{slug}', [HomeController::class, 'showNews'])->name('news.show');
    Route::get('/category/{slug}', [HomeController::class, 'categoryNews'])->name('category.news');

    // Authentication Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [AuthController::class, 'register']);
        Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
        Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
        
        // Social Authentication
        Route::get('/auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
        Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes (perlu login)
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        
        // News Routes
        Route::resource('news', NewsController::class);
        Route::post('/news/{news}/approve', [NewsController::class, 'approve'])->name('news.approve')->middleware('role:admin,editor');
        Route::post('/news/{news}/reject', [NewsController::class, 'reject'])->name('news.reject')->middleware('role:admin,editor');
    });
    
});