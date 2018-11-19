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
    return view('welcome');
});

Route::get('/admin','AdminController@Home');

//获取用户输入
//Route::get('admin/create','AdminController@create');
//Route::post('admin','AdminController@store');

//资源管理路由
Route::resource('admin','AdminController');