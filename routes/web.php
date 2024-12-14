<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\BookingRequestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\RedirectIfAuth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => RedirectIfAuth::class], function () {
    Route::view('/admin/login', 'dashboard.auth.login')->name('login');
    Route::post('/admin', [AdminAuthController::class, 'login'])->name('admin.login');
});
Route::group(['prefix' =>'admin', 'as' => 'admin.', 'middleware' => ['auth', 'checkPermission']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
    Route::prefix('management')->controller(AdminController::class)->group(function () {
        Route::get('/show-admins', 'index')->name('show-admins');
        Route::get('/create-admin', 'create')->name('create-admin');
        Route::post('/store-admin', 'store')->name('store-admin');
        Route::get('/edit-admin/{id}', 'edit')->name('edit-admin');
        Route::any('/update-admin/{id}', 'update')->name('update-admin');
        Route::get('/delete-admin/{id}', 'destroy')->name('delete-admin');
        Route::get('/block-admin/{id}', 'blockAdmin')->name('block-admin');
    });
    Route::prefix('members')->controller(UserController::class)->group(function () {
        Route::get('/show-users', 'index')->name('show-users');
        Route::get('/details-user/{id}', 'show')->name('details-user');
        Route::get('/delete-user/{id}', 'destroy')->name('delete-user');
        Route::get('/block-user/{id}', 'blockUser')->name('block-user');
    });
    Route::prefix('contact-us')->controller(ContactUsController::class)->group(function () {
        Route::get('/show-message', 'index')->name('show-message');
        Route::get('/read-message/{id}', 'read')->name('read-message');
        Route::get('/delete-message/{id}', 'delete')->name('delete-message');
    });
    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/show-category', 'index')->name('show-category');
        Route::Post('/store-category', 'store')->name('store-category');
        Route::post('/update-category', 'update')->name('update-category');
        Route::get('/delete-category/{id}', 'destroy')->name('delete-category');
    });
    Route::prefix('features')->controller(FeatureController::class)->group(function () {
        Route::get('/show-feature', 'index')->name('show-feature');
        Route::Post('/store-feature', 'store')->name('store-feature');
        Route::post('/update-feature', 'update')->name('update-feature');
        Route::get('/delete-feature/{id}', 'destroy')->name('delete-feature');
    });
    Route::prefix('units')->controller(UnitController::class)->group(function () {
       Route::get('/show-unit', 'index')->name('show-unit');
       Route::get('/change-status/{id}/{status}', 'changeStatus')->name('change-status');
       Route::get('/delete-unit/{id}', 'destroy')->name('delete-unit');
       Route::get('/show-details/{id}','details')->name('show-details');
       Route::get('/create-unit', 'create')->name('create-unit');
       Route::post('/store-unit', 'store')->name('store-unit');
       Route::get('/edit-unit/{id}','edit')->name('edit-unit');
       Route::post('/update-unit/{id}', 'update')->name('update-unit');
    });
    Route::prefix('booking-request')->controller(BookingRequestController::class)->group(function () {
        Route::get('/show-booking-request', 'index')->name('show-booking-request');
        Route::get('/details/{id}', 'details')->name('details-booking-request');
        Route::post('/change-status','changeStatus')->name('booking-change-status');
        Route::get('/delete/{id}','destroy')->name('delete-booking-request');
    });
    Route::prefix('booking')->controller(BookingController::class)->group(function () {
        Route::get('/show-booking', 'index')->name('show-booking');
        Route::get('/details/{id}', 'details')->name('details-booking');
        Route::get('delete/{id}', 'destroy')->name('delete-booking');
    });

    Route::prefix('settings')->controller(SettingController::class)->group(function () {
      Route::get('/show-setting','index')->name('show-setting');
      Route::post('/update-setting','update')->name('update-setting');
    });
});

Route::fallback(fn() => abort(404));
/*********************************/

//to run react front-end
Route::get('/', function () {
    return view('app');
});

//Route::view('/','coming');

