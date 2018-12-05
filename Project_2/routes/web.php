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