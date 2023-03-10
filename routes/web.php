<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UploadingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialProvidersController;

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

Route::group(['middleware' => 'auth'], static function () {

    Route::get('/logout',[LoginController::class, 'logout'])
        ->name('account.logout');

    Route::get('/account',AccountController::class)
        ->name('account');

    Route::resource('feedback', FeedbackController::class)->only([
        'index', 'show', 'create', 'store']);

    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function(){

        Route::get('/', AdminController::class)
        ->name('index');

        Route::get('/parser', ParserController::class)->name('parser');

        Route::resource('categories', AdminCategoryController::class);

        Route::resource('news', AdminNewsController::class);

        Route::resource('users', AdminUserController::class);

        Route::resource('sources', SourceController::class);

        Route::resource('feedback', FeedbackController::class)->only([
            'edit', 'update','destroy'
        ]);
    });
});



Route::resource('uploading', UploadingController::class);

Route::get('/info', [InfoController::class, 'info'])
    ->name('info');

Route::group(['prefix' => '',], static function(){
    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where ('id', '\d+')
        ->name('news.show');
});

Route::group(['prefix' => ''], static function(){

    Route::get('/categories/{id}/show', [CategoryController::class, 'show'])
        ->where ('id', '\d+')
        ->name('categories.show');
});

//Route::get('session', function()
//{
//    $sessionName = 'test';
//
//    if ( session()->has($sessionName)) {
//        //dd(session()->get($sessionName), session()->all());
//        session()->forget($sessionName);
//    }
//    //dd(session()->all());
//    session()->put($sessionName, 'example');
//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+');
});



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
