<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UploadingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(){
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::resource('feedback', FeedbackController::class);

Route::resource('uploading', UploadingController::class);

Route::get('/info', [InfoController::class, 'info'])
    ->name('news');

Route::group(['prefix' => ''], static function(){
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where ('id', '\d+')
        ->name('news.show');
});

Route::group(['prefix' => ''], static function(){
    Route::get('/categories', [CategoryController::class, 'showAllCategory'])
        ->name('categories');

    Route::get('/categories/{id}/show', [CategoryController::class, 'showOneCategory'])
        ->where ('id', '\d+')
        ->name('categories.show');
});





