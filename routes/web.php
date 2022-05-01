<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\InfoController as InfoController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\UserController as UserController;

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

Route::get('/', [InfoController::class, 'index'])
    ->name('info');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminController::class)
        ->name('index');

    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    // /news -- Выведет категории новостей
    Route::get('/',      [CategoryController::class, 'index'])
        ->name('categories');

    // /news/{catId} -- Новости определенной категрии
    Route::get('/{catId}', [NewsController::class, 'index'])
        ->where(['catId' => '\d+'])
        ->name('news');

    // /news/{catId}/{id} -- Выведет конкретную новость
    Route::get('/{catId}/{id}', [NewsController::class, 'show'])
        ->where(['catId' => '\d+', 'id' => '\d+'])
        ->name('show');
});


Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('/auth', [UserController::class, 'auth'])
    ->name('auth');
});

