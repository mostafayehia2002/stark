<?php


use App\Http\Controllers\Api\UserLoginController;
use App\Http\Controllers\Api\UserLogoutController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserRegisterController;
use App\Http\Controllers\Api\VerifyOtpController;
use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['api']], function () {
//    // Public property routes - move these OUTSIDE the auth middleware
//    Route::get('/properties', [PropertyController::class, 'index']);
//    Route::get('/properties/{id}', [PropertyController::class, 'show']);
    // Protected routes
//    Route::middleware('auth:sanctum')->group(function () {
//        Route::get('properties/owner', [PropertyController::class, 'getOwnerProperties']);
//        Route::post('properties/{id}/save', [PropertyController::class, 'toggleSave']);
//    });
//});

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
});
