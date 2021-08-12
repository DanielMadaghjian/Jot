<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\BirthdaysController;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/contacts', 'App\Http\Controllers\ContactsController@index');
    Route::post('/contacts', 'App\Http\Controllers\ContactsController@store');
    Route::get('/contacts/{contact}', 'App\Http\Controllers\ContactsController@show');
    Route::patch('/contacts/{contact}', 'App\Http\Controllers\ContactsController@update');
    Route::delete('/contacts/{contact}', 'App\Http\Controllers\ContactsController@destroy');

    Route::get('/posts', 'App\Http\Controllers\PostController@index');
    Route::post('/posts', 'App\Http\Controllers\PostController@store');
    Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show');
    Route::patch('/posts/{post}', 'App\Http\Controllers\PostController@update');
    Route::delete('/posts/{post}', 'App\Http\Controllers\PostController@destroy');

    Route::get('birthdays', 'App\Http\Controllers\BirthdaysController@index');
});

