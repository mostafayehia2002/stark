<?php

use Illuminate\Support\Facades\Route;





Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/login','login')->name('login');
    Route::get('/', function () {
        return view('dashboard.home');
    });
});


Route::fallback(function () {

    return view('404');
});

/*********************************/
Route::get('/', function () {
    return view('app');
});

