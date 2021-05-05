<?php

use App\Http\Controllers\APi\AuthController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\BLog\ContactController;
use App\Http\Controllers\Blog\LoaiTinController;
use App\Http\Controllers\Blog\SlideController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SectionCategoryController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\Blog\TheLoaiController;
use App\Http\Controllers\Blog\TinTucController;
use App\Http\Controllers\Scan3dController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ThumbnailController;
use App\Http\Controllers\UserController;
use App\Http\Resources\TheLoaiResource;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::post("login", [AuthController::class, 'login']);
});


Route::middleware(['jwt.auth', 'prevent-back-history','adminAuth'])->group(function () {

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

        Route::prefix('{id}/section_category')->group(function () {
            Route::get('', [SectionCategoryController::class, 'getSectionCateGory']);
            Route::post('', [SectionCategoryController::class, 'store']);
        });
    });


    Route::prefix('item')->group(function () {
        Route::get('/{id}', [ItemController::class, 'edit']);
        Route::post('update/{id}', [ItemController::class, 'update']);
        Route::delete('delete/{id}', [ItemController::class, 'delete']);
    });

    Route::prefix('theme')->group(function () {
        Route::get('', [ThemeController::class, 'getTheme']);
        Route::post('', [ThemeController::class, 'store']);
        Route::get('{id}', [ThemeController::class, 'edit']);
        Route::post('update/{id}', [ThemeController::class, 'update']);
        Route::delete('delete/{id}', [ThemeController::class, 'delete']);
    });

    Route::prefix('style')->group(function () {
        Route::get('{id}', [StyleController::class, 'edit']);
        Route::put('update/{id}', [StyleController::class, 'update']);
        Route::delete('delete/{id}', [StyleController::class, 'delete']);
    });

    Route::prefix('section_category')->group(function () {
        Route::get('{id}', [SectionCategoryController::class, 'edit']);
        Route::put('update/{id}', [SectionCategoryController::class, 'update']);
        Route::delete('delete/{id}', [SectionCategoryController::class, 'delete']);
        Route::prefix('{id}/items')->group(function () {
            Route::get('', [SectionCategoryController::class, 'getItembySectionCateGory']);
            Route::post('', [SectionCategoryController::class, 'storebySectionCategory']);
        });
    });


    Route::post("logout", [AuthController::class, 'logout']);
    // Route group The Loai
    Route::group(['prefix' => 'theloai'], function () {
        // Route URL: admin/theloai/danhsach
        Route::get('', [TheLoaiController::class, 'list']);
        Route::post('', [TheLoaiController::class, 'store']);
        // Route URL: admin/theloai/sua
        Route::get('{id}', [TheLoaiController::class, 'get']);
        Route::put('update/{id}', [TheLoaiController::class, 'update']);
        Route::delete('delete/{id}', [TheLoaiController::class, 'delete']);
    });
    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('', [LoaiTinController::class, 'list']);
        Route::post('', [LoaiTinController::class, 'store']);
        Route::get('{id}', [LoaiTinController::class, 'get']);
        Route::put('update/{id}', [LoaiTinController::class, 'update']);
        Route::delete('delete/{id}', [LoaiTinController::class, 'delete']);
    });

    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('', [TinTucController::class, 'list']);
        Route::post('', [TinTucController::class, 'store']);
        Route::get('{id}', [TinTucController::class, 'get']);
        Route::post('update/{id}', [TinTucController::class, 'update']);
        Route::delete('delete/{id}', [TinTucController::class, 'delete']);
    });


    Route::group(['prefix' => 'slide'], function () {
        Route::get('', [SlideController::class, 'list']);
        Route::post('', [SlideController::class, 'store']);
        Route::get('{id}', [SlideController::class, 'get']);
        Route::post('update/{id}', [SlideController::class, 'update']);
        Route::delete('delete/{id}', [SlideController::class, 'delete']);
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('', [ContactController::class, 'getDanhSach']);
        Route::delete('delete/{id}', [ContactController::class, 'Xoa']);
    });

    Route::group(['prefix' => 'comment'], function () {
        Route::get('', [CommentController::class, 'getDanhSach']);
        Route::delete('delete/{id}', [CommentController::class, 'Xoa']);
        Route::post('{article_id}', [CommentController::class, 'Them']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('', [UserController::class, 'getDanhSach']);
        Route::post('', [UserController::class, 'XuLyThemUser']);
        Route::get('{id}', [UserController::class, 'Sua']);
        Route::put('update/{id}', [UserController::class, 'XuLySuaUser']);
        Route::delete('delete/{id}', [UserController::class, 'Xoa']);
    });

    Route::group(['prefix' => 'scan-3d'], function() {
        Route::get('', [Scan3dController::class, 'index']);
        Route::post('', [Scan3dController::class, 'store']);
        Route::post('{id}', [Scan3dController::class, 'update']);
        Route::delete('{id}', [Scan3dController::class, 'destroy']);
    });

    Route::prefix('thumbnail')->group(function () {
        Route::get('', [ThumbnailController::class, 'index']);
        Route::post('', [ThumbnailController::class, 'store']);
        Route::get('{id}', [ThumbnailController::class, 'edit']);
        Route::post('{id}', [ThumbnailController::class, 'update']);
        Route::delete('{id}', [ThumbnailController::class, 'destroy']);
    });


});
// Route::middleware(['jwt.refresh'])->group(function () {
//     Route::get('/token/refresh', [AuthController::class, 'refresh']);
// });