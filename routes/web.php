<?php

use App\Http\Controllers\BLog\ContactController;
use App\Http\Controllers\Scan3dController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShowRoomController;
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

// Auth::routes();
// Route :: view ( '/ admin' , 'admin.dashboard.index' ); 
// Route :: view ( '/ admin / login' , 'admin.auth.login' );
Route::get('/project/{slug}.html/', [Scan3dController::class,'public'])->name('project.public');
Route::group(['middleware' => ['prevent-back-history','lang']], function () {
    Route::get('', [ShowRoomController::class, 'index']);



    // Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    // Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('auth.login');
    // Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout_user'])->name('auth.logout');

    // Route::group(['middleware' => ['auth']], funct0ion () {
    Route::get('/admin/{any}', function () {
        return view('admin.dashboard.index');
    })->where('any', '.*');;
    // });

    Route::post('message/send',[ContactController::class, 'XuLyThemMessage']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('message/send',[ContactController::class, 'XuLyThemMessage']);

    Route::get('loai-tin/{unsigned_name}',[ShowRoomController::class, 'LoaiTin']);

    Route::get('tin-tuc/{unsigned_name}.html',[ShowRoomController::class, 'TinTuc']);
});

