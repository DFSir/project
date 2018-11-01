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


// 前台用户管理
Route::resource('/admin/huser', 'Admin\UsersController');

// 文章类别的资源管理器
Route::resource('/admin/cates', 'Admin\CatesController');
// 文章详情的资源管理器
Route::resource('/admin/articles', 'Admin\ArticlesController');


// 心情随笔(日记)资源控制器
Route::resource('/admin/diary','Admin\DiaryController');

