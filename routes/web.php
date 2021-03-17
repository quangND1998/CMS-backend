<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
// Route :: view ( '/ admin' , 'admin.dashboard.index' ); 
// Route :: view ( '/ admin / login' , 'admin.auth.login' );
Route::group(['middleware' => ['prevent-back-history']], function () {
    Route::get('/', function () {
        return redirect('/login');
    });



    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('auth.login');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout_user'])->name('auth.logout');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/admin/{any}', function () {
            return view('admin.dashboard.index');
        })->where('any', '.*');;
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
