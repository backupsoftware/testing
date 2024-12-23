<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SettingsController;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;

// Define a route
Route::group([], function () {
    Route::get('/', fn() => view('home'));
    Route::get('/test', fn() => view('test'));
    Route::get('/1', fn() => view('signup.basic'));
    Route::get('/2', fn() => view('signup.otp'));
    Route::get('/3', fn() => view('signup.captcha'));
});
Route::get('/signup', [SettingsController::class, 'showForm'])->name('signup.get');


// Route::get('/signup', [CompanyController::class, 'signup'])->name('signup.get');

Route::get('/login', [CompanyController::class, 'login'])->name('login');

Route::get('/dash', [CompanyController::class, 'superadmindash'])->name('superAdminDash');
// Route::get('/Super-Admin-Dashboard', [CompanyController::class, 'superadmindash'])->name('superAdminDash');

