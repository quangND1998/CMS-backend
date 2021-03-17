<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

    Route::get('/', function () {
        return view('admin.dashboard.index');
    });
});
