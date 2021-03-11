<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TemplateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('template')->group(function () {
    Route::post('/', [TemplateController::class, 'post']);
    Route::get('/', [TemplateController::class, 'get']);
    Route::get('/edit/{id}', [TemplateController::class, 'edit']);
    Route::delete('/delete/{id}', [TemplateController::class, 'delete']);
    Route::post('/update/{id}', [TemplateController::class, 'update']);
    Route::prefix('{id}/session')->group(function () {
        Route::get('', [SessionController::class, 'getSession']);
        Route::post('/store', [SessionController::class, 'store']);
    });
});
Route::prefix('session')->group(function () {
    Route::get('/{id}', [SessionController::class, 'edit']);
    Route::put('/update/{id}', [SessionController::class, 'update']);
    Route::delete('/delete/{id}', [SessionController::class, 'delete']);
    Route::prefix('{id}/items')->group(function () {
        Route::get('', [ItemController::class, 'getListItem']);   
    });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
