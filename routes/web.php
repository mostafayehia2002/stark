<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\RedirectIfAuth;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => RedirectIfAuth::class], function () {
    Route::view('/login','dashboard.login')->name('login');
    Route::post('admin/login',[AdminAuthController::class,'login'])->name('admin.login');
});
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>['auth','checkPermission']],function () {
    Route::get('/',[AdminAuthController::class,'index'])->name('dashboard');
    Route::post('/logout',[AdminAuthController::class,'logout'])->name('logout');
    Route::resource('roles', RoleController::class);
Route::prefix('management')->controller(AdminController::class)->group(function () {
    Route::get('/show-admins','index')->name('show-admins');
    Route::get('/create-admin','create')->name('create-admin');
    Route::post('/store-admin','store')->name('store-admin');
    Route::get('/edit-admin/{id}','edit')->name('edit-admin');
    Route::any('/update-admin/{id}','update')->name('update-admin');
    Route::get('/delete-admin/{id}','destroy')->name('delete-admin');
    Route::get('/block-admin/{id}','blockAdmin')->name('block-admin');
});
Route::prefix('members')->controller(UserController::class)->group(function () {
    Route::get('/show-users','index')->name('show-users');
    Route::get('/details-user/{id}','show')->name('details-user');
    Route::get('/delete-user/{id}','destroy')->name('delete-user');
    Route::get('/block-user/{id}','blockUser')->name('block-user');
});

});

Route::fallback(fn()=>abort(404));
/*********************************/
Route::get('/', function () {
    return view('app');
});

