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

Route::get('profile/confirm/facebook', 'ProfileConfirmController@facebook');
Route::get('profile/confirm/facebook/callback', 'ProfileConfirmController@facebookCallback');
Route::get('profile/confirm/email', 'ProfileConfirmController@email');
Route::get('profile/confirm/email/end/{key}', 'ProfileConfirmController@emailConfirm');
Route::post('profile/confirm/mobile', 'ProfileConfirmController@mobile');
Route::post('profile/confirm/mobile/end', 'ProfileConfirmController@mobileConfirm');
Route::post('profile/confirm/passport', 'ProfileConfirmController@passport');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/facebook', 'Auth\AuthController@facebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@facebookCallback');

// Registration routes...
Route::get('register', 'IndexController@register');
Route::get('register/tasker', 'Auth\AuthController@getRegisterTasker');
Route::post('register/tasker', 'Auth\AuthController@postRegisterTasker');
Route::get('register/client', 'Auth\AuthController@getRegisterClient');
//Route::post('register/client', 'Auth\AuthController@postRegisterClient');


Route::get('category/sub/{category}/{format?}', 'CategoryController@subCategory');
Route::get('c/{categoryUrl}/{category}', 'TaskController@category');
// task client
Route::get('task/create/{category?}', 'TaskController@create');
Route::post('task/store', 'TaskController@store');
Route::get('task/bid/{bidId}/accept', 'TaskController@bidAccept');
Route::get('task/bid/{bidId}/decline', 'TaskController@bidDecline');
Route::get('task/{taskId}/pay', 'TaskController@pay');
Route::get('task/{taskId}/close', 'TaskController@close');
Route::get('task/{taskId}/done', 'TaskController@done');
Route::get('task/edit/{taskId}', 'TaskController@edit');
Route::post('task/update/{taskId}', 'TaskController@update');
Route::get('task/destroy/{taskId}', 'TaskController@destroy');
Route::get('task/show/{taskId}', 'TaskController@show');
// task tasker
Route::post('task/{taskId}/refund', 'TaskController@refund');
Route::post('task/{taskId}/bid', 'TaskController@bid');
Route::post('task/bid/{bidId}/deal', 'TaskController@bidDeal');
// comments
Route::get('task/bid/{bidId}/comments', 'TaskController@bidComments');
Route::post('task/bid/{bidId}/comment', 'TaskController@bidComment');
Route::get('task/{taskId}/comments', 'TaskController@comments');
Route::post('task/{taskId}/comment', 'TaskController@comment');

//Route::get('/test', 'TestController@test');
Route::get('paypal/test', 'PaypalController@test');
Route::get('payment/paypal/callback/success/{taskId}', 'PaypalController@success');
Route::get('payment/paypal/callback/fail/{taskId}', 'PaypalController@fail');

Route::get('stripe/test', 'StripeController@test');



/* ADMIN */
Route::get('/admin', 'Admin\IndexController@index');
// category
Route::get('/admin/category', 'Admin\CategoryController@index');
Route::get('/admin/category/show/{id}', 'Admin\CategoryController@show');
Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit');
Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update');
Route::get('/admin/category/create', 'Admin\CategoryController@create');
Route::post('/admin/category/store/{id}', 'Admin\CategoryController@store');
Route::get('/admin/category/destroy/{id}', 'Admin\CategoryController@destroy');
// location
Route::get('/admin/location', 'Admin\LocationController@index');
Route::get('/admin/location/show/{id}', 'Admin\LocationController@show');
Route::get('/admin/location/edit/{id}', 'Admin\LocationController@edit');
Route::post('/admin/location/update/{id}', 'Admin\LocationController@update');
Route::get('/admin/location/create', 'Admin\LocationController@create');
Route::post('/admin/location/store/{id}', 'Admin\LocationController@store');
Route::get('/admin/location/destroy/{id}', 'Admin\LocationController@destroy');
// user
Route::get('/admin/user', 'Admin\UserController@index');
Route::get('/admin/user/ban/{id}', 'Admin\UserController@ban');
Route::get('/admin/user/unban/{id}', 'Admin\UserController@unban');

Route::get('/admin/passport', 'Admin\UserController@passport');
Route::get('/admin/passport/approve/{id}', 'Admin\UserController@passportApprove');
