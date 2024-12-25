<?php

use App\Http\Controllers\Api\BookingRequestController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserLoginController;
use App\Http\Controllers\Api\UserLogoutController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserRegisterController;
use App\Http\Controllers\Api\VerifyOtpController;
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'v1','middleware'=>'api_lang'], function () {
    Route::get('/setting' ,[SettingController::class,'getSetting'] );
    Route::prefix('auth')->group(function () {
        Route::post('/login', [UserLoginController::class, 'login']);
        Route::post('/register', [UserRegisterController::class, 'register']);
        Route::post('/verify-otp', [VerifyOTPController::class, 'verifyOTP']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('/logout', [UserLogoutController::class, 'logout']);
            Route::post('/profile', [UserProfileController::class, 'profile']);
            Route::post('/update-profile', [UserProfileController::class, 'updateProfile']);
        });
    });
    Route::post('/contact-us/send', [ContactUsController::class, 'sendContactUsMessage']);
    Route::get('/categories', [CategoryController::class, 'getCategoryList']);
    Route::prefix('units')->controller(UnitController::class)->group(function () {
        Route::get('/', 'getAllUnits');
        Route::get('/type', 'getUnitType');
        Route::get('/details/{id}', 'getUnitDetails');
        Route::middleware(['auth:sanctum', 'checkUserType:owner'])->group(function () {
            Route::get('/owner-units', 'getOwnerUnits');
            Route::post('/store', 'store');
            Route::post('/update/{id}', 'update');
            Route::get('/delete/{id}', 'destroy');
        });
    });
    Route::prefix('favorites')->middleware('auth:sanctum')->controller(FavoriteController::class)->group(function () {
        Route::get('/', 'getAllFavorites');
        Route::post('/store', 'store');
        Route::get('/delete/{id}', 'destroy');
    });

    Route::prefix('booking-requests')->middleware('auth:sanctum')->controller(BookingRequestController::class)->group(function () {
        Route::get('/', 'getAllBookingRequests');
        Route::get('/details/{id}', 'details');
        Route::get('/status', 'getStatus');
        Route::post('/change-status', 'changeStatus')->middleware('checkUserType:owner');
        Route::get('/delete/{id}', 'destroy');
        Route::post('/store', 'store')->middleware('checkUserType:renter');
    });


});
