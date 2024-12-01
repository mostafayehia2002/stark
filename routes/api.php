<?php


use App\Http\Controllers\Api\UserLoginController;
use App\Http\Controllers\Api\UserLogoutController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserRegisterController;
use App\Http\Controllers\Api\VerifyOtpController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api'], function () {

    Route::prefix('auth')->group(function () {
          Route::post('/login', [UserLoginController::class, 'login']);
          Route::post('/register', [UserRegisterController::class, 'register']);
          Route::post('/verify-otp',[VerifyOTPController::class, 'verifyOTP']);
          Route::middleware('auth:sanctum')->group(function () {
              Route::post('/logout', [UserLogoutController::class, 'logout']);
              Route::post('/profile', [UserProfileController::class, 'profile']);
              Route::post('/update-profile', [UserProfileController::class, 'updateProfile']);
          });
    });

    Route::post('/contact-us/send',[\App\Http\Controllers\Api\ContactUsController::class, 'sendContactUsMessage']);
});
