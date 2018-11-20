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
//返回视图
Route::get('index',function (){
    //view('路由名'，['key'=>'value'])
   return view('index',['name'=>'Mr.Chen']);
//   return view('index')->with('name','Mr.Chen');
});

//多请求路由
//Route::match(['post','get'],'index',function (){
//    return view('index',['name'=>'Mr.Chen']);
//});
//所有类型的请求
//Route::any('index',function (){
//    return view('index',['name'=>'Mr.Chen']);
//});


//路由参数
//单字段
//Route::get('index/{id}',function ($id){
//    return view('index',['name'=>$id]);
//})->where('id','[A-Za-z]+');
//多字段
//Route::get('index/{id}/{name}',function ($id,$name){
//    return view('index',['id'=>$id,'name'=>$name]);
//});

//路由别名
//Route::get('index',['as'=>'center',function (){
//    return route('center');
//}]);



//Route::get('/admin','AdminController@Home');

//获取用户输入
//Route::get('admin/create','AdminController@create');
//Route::post('admin','AdminController@store');

//资源管理路由
Route::resource('admin','AdminController');
Route::resource('photo','PhotoController');
//Route::resource('index','Admin\IndexController');

//一次创建多个资源管理路由
//Route::resource([
//    'admin'=>'AdminController',
//    'photo'=>'PhotoController'
//]);

//声明资源路由时，可以指定控制器应处理的部分行为
//Route::resource('photos','PhotoController')->only([
//    'index','show'
//]);
//Route::resource('photos','PhotoController')->except([
//    'create','store','update','destroy'
//]);

//声明API资源路由
//Route::apiResource('admin','AdminController');
//Route::apiResource('photo','PhotoController');
//
//Rout::apiResource([
//    'admin'=>'AdminController',
//    'photo'=>'PhotoController'
//]);

//依赖注入 & 路由参数
