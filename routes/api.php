<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\ThemeController;
use App\Models\Style;
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

Route::prefix('page')->group(function () {
    Route::post('', [PageController::class, 'post']);
    Route::get('', [PageController::class, 'get']);
    Route::get('/{id}', [PageController::class, 'edit']);
    Route::delete('/delete/{id}', [PageController::class, 'delete']);
    Route::post('/update/{id}', [PageController::class, 'update']);
    Route::prefix('{id}/section')->group(function () {
        Route::get('', [SectionController::class, 'getSession']);
        Route::post('', [SectionController::class, 'store']);
    });
    Route::prefix('{id}/style')->group(function () {

        Route::get('', [StyleController::class, 'getStyle']);
        Route::post('', [StyleController::class, 'store']);
    });
});
Route::prefix('section')->group(function () {
    Route::get('/{id}', [SectionController::class, 'edit']);
    Route::put('/update/{id}', [SectionController::class, 'update']);
    Route::delete('/delete/{id}', [SectionController::class, 'delete']);
    Route::prefix('{id}/items')->group(function () {
        Route::get('', [ItemController::class, 'getListItem']);
        Route::post('', [ItemController::class, 'store']);
    });
    Route::prefix('{id}/theme')->group(function () {
        Route::get('', [ThemeController::class, 'getTheme']);
        Route::post('', [ThemeController::class, 'store']);
    });
});
Route::prefix('item')->group(function () {
    Route::get('/{id}', [ItemController::class, 'edit']);
    Route::post('update/{id}', [ItemController::class, 'update']);
    Route::delete('delete/{id}', [ItemController::class, 'delete']);
});
Route::prefix('theme')->group(function () {
    Route::get('{id}', [ThemeController::class, 'edit']);
    Route::put('update/{id}', [ThemeController::class, 'update']);
    Route::delete('delete/{id}', [ThemeController::class, 'delete']);
});
Route::prefix('style')->group(function () {
    Route::get('{id}', [StyleController::class, 'edit']);
    Route::put('update/{id}', [StyleController::class, 'update']);
    Route::delete('delete/{id}', [StyleController::class, 'delete']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
