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
Route::get('/login', 'AuthController@getLogin');
Route::get('/daftar', 'AuthController@getRegister');
Route::get('/pesawat', 'PagesController@plane');
Route::get('/hotel', 'PagesController@hotel');
Route::get('/kereta', 'PagesController@train');


Route::post('/login', 'AuthController@postLogin') -> name('login');
Route::post('/register', 'AuthController@postRegister') -> name('register');