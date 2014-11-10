<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('/about', 'HomeController@about');

Route::get('/login', 'SessionController@create');
Route::get('login/fb', 'FacebookController@login');
Route::get('login/fb/callback', 'FacebookController@fb_callback');
Route::get('/logout', 'SessionController@destroy');
Route::get('/registreer', 'UserController@create');
Route::get('/over-ons', 'HomeController@about');


Route::resource('users', 'UserController');
Route::resource('sessions', 'SessionController');
Route::resource('workshop', 'WorkshopController');
