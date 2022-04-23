<?php

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

// Страница приветствия пользователей
Route::get('/hello/{name}', function ( string $name ) {
    return "Hello, {$name}!";
})->where(['name' => '\w+']);

// Страница с информацией о проекте
Route::get('/info', function () {
    return "Laravel project";
});

// Страница для вывода одной или нескольких новостей
Route::get('/news/{news?}', function ( string $news = null ) {
    if ( !$news )
        return "Список всех новостей";

    return "Конкретная новость: {$news}";
})->where(['news' => '\w+']);

