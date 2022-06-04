<?php

use App\Http\Controllers\Account\IndexController;
use App\Http\Controllers\UserFeedbackController;
use App\Http\Controllers\UserSourceOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', IndexController::class)->name('account');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('/', AdminController::class)
            ->name('index');

        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUserController::class);
    });
});

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    Route::get('/',      [CategoryController::class, 'index'])
        ->name('categories');

    Route::get('/{catSlug}', [CategoryController::class, 'show'])
        ->name('news');

    Route::get('/{catSlug}/{newsSlug}', [NewsController::class, 'show'])
        ->name('show');
});


Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('/auth', [UserController::class, 'auth'])
    ->name('auth');

    Route::resource('/feedback', UserFeedbackController::class);
    Route::resource('/order', UserSourceOrderController::class);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
