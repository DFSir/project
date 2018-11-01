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


// 后台管理员的资源控制器
// 前台用户管理
Route::resource('/admin/huser', 'Admin\UsersController');







































// 杜娴最后一行
