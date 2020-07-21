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

Route::get('/', 'PagesController@home');
Route::get('/login', 'AuthController@getLogin') -> name('login');
Route::get('/daftar', 'AuthController@getRegister');
Route::get('/pesawat', 'PagesController@plane');
Route::get('/hotel', 'PagesController@hotel');
Route::get('/kereta', 'PagesController@train');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'AuthController@logout');
    Route::get('/user/profile', 'PagesController@profile');
    Route::get('/user/history', 'ProfileController@order');
    Route::get('/user/point', 'ProfileController@point');
    Route::get('/user/profile-list', 'ProfileController@profileMan');
});

Route::post('/login', 'AuthController@postLogin') -> name('postLogin');
Route::post('/auth', 'AuthController@postPassword') -> name('postPassword');
Route::post('/register', 'AuthController@postRegister') -> name('postRegister');
Route::post('/flight', 'SearchController@postFlightData') -> name('postFlight');