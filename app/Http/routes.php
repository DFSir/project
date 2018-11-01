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

Route::get('/', function () {
    return view('/admin/layout/layout');
});


//用户管理的资源控制器
Route::resource('/admin/user', 'Admin\UsersController');








































// 心情随笔(日记)资源控制器
Route::resource('/admin/diary','Admin\DiaryController');
