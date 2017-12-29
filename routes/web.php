<?php

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
    return view('teams');
});

Route::get('/', 'TeamsController@index')->name('teams');

Route::get('/teams', 'TeamsController@index')->name('teams');

Route::get('/teams/{id}', 'TeamsController@show')->name('team');

Route::get('/players/{id}', 'PlayersController@show')->name('player');

Route::get('/register', 'RegisterController@create')->name('register');
Route::post('/register', 'RegisterController@store')->name('register-store');

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store')->name('login-store');
Route::get('/logout', 'LoginController@destroy')->name('logout');

//verify route
Route::get('/register/verify/{id}', 'RegisterController@verify')->name('verifyUser');