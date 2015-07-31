<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// home
Route::get('/', 'IndexController@index');
Route::get('/home', 'IndexController@index');

// change language
Route::get('locale/{locale}', 'IndexController@locale');

// user
Route::get('profile', 'ProfileController@index');
Route::get('profile/types', 'ProfileController@getTypes');
Route::post('profile/types', 'ProfileController@postTypes');
Route::get('profile/fill', 'ProfileController@getFill');
Route::post('profile/fill', 'ProfileController@postFill');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/facebook', 'Auth\AuthController@facebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@facebookCallback');

// Registration routes...
Route::get('register', 'IndexController@register');
Route::get('register/tasker', 'Auth\AuthController@getRegisterTasker');
//Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('register/tasker', 'Auth\AuthController@postRegisterTasker');






Route::get('/test', 'TestController@test');