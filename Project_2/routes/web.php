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

Route::get('/','IndexController@home')->name('home');
Route::get('/help','IndexController@help')->name('help');
Route::get('/about','IndexController@about')->name('about');


//添加登录路由
Route::get('signup','User\UserController@create')->name('signup');
Route::resource('users','User\UserController');

Route::get('login','User\SessionController@create')->name('login');
Route::post('login','User\SessionController@store')->name('login');
Route::delete('logout','User\SessionController@destroy')->name('logout');

//账号激活
Route::get('signup/confirm/{token}','User\UserController@confirmEmail')->name('confirm_email');

//密码重设
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//微博的创建和删除
Route::resource('statuses', 'Status\StatusesController', ['only' => ['store', 'destroy']]);