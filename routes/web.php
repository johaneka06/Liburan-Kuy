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
Route::get('/flight/autocomplete', 'PagesController@autocomplete') -> name('search');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'AuthController@logout');
    Route::get('/user/profile', 'PagesController@profile');
    Route::get('/user/history', 'ProfileController@order');
    Route::get('/user/point', 'ProfileController@point');
    Route::get('/user/profile-list', 'ProfileController@profileMan');
    Route::get('/user/profile/settings', 'ProfileController@setting');
    Route::post('/user/profile/settings/phoneNo', 'ProfileController@phoneNoChanges') -> name('putPhoneNo');
    Route::post('/user/profile/settings/password', 'ProfileController@passwordChanges') -> name('putPassword');
    Route::post('/user/profile/settings/data', 'ProfileController@dataChanges') -> name('putData');
    Route::get('/user/manage-profile', 'ProfileController@retrieveProfile');
    Route::get('/user/manage-profile/{id}', 'ProfileController@getProfile') -> name('readProfile');
    Route::post('/user/manage-profile/{id}/success', 'ProfileController@updateProfile') -> name('putProfileUpdate');
    Route::post('/user/manage-profile/profile', 'ProfileController@addProfile') -> name('postProfile');
    Route::get('/user/manage-profile/delete/{id}', 'ProfileController@getProfileData') -> name('fetchProfile');
    Route::post('/user/manage-profile/delete/{id}/success', 'ProfileController@deleteProfile') -> name('deleteProfile');
    Route::get('/user/history/logs', 'ProfileController@find') -> name('findLogs');
    Route::get('/user/history/logs/detail/order_id={id}', 'TransactionController@viewDetailTransaction') -> name('getLogs');
});

Route::post('/login', 'AuthController@postLogin') -> name('postLogin');
Route::post('/auth', 'AuthController@postPassword') -> name('postPassword');
Route::post('/register', 'AuthController@postRegister') -> name('postRegister');
Route::post('/flight', 'SearchController@postFlightData') -> name('postFlight');