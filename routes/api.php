<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SettingsController;

Route::get('/', [CompanyController::class, 'index']);

Route::get('/test', [CompanyController::class, 'test']);

Route::post('/update-form-type', [SettingsController::class, 'updateFormType']);
Route::post('/register', [CompanyController::class, 'store'])->name('signup.post');

Route::post('/check-email', [CompanyController::class, 'checkEmail'])->name('check.email');
Route::post('/send-otp', [CompanyController::class, 'sendOtp'])->name('send.otp');