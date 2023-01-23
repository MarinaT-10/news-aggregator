<?php
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
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

Route::get('/hello/{name}', static function(string $name): string {
    return "Hello, {$name}";
});

Route::get('/info', static function(): string {
    return "Info";
});

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





