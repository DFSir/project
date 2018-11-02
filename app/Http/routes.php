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
// 文章审核页面
Route::get('/admin/articles/astate/{id}', 'Admin\ArticlesController@astate');
// 文章确定过审
Route::get('/admin/articles/audit/{id}', 'Admin\ArticlesController@audit');
// 文章推荐位上架
Route::get('/admin/articles/switchup/{id}', 'Admin\ArticlesController@switchup');
// 文章推荐位上架
Route::get('/admin/articles/switchdown/{id}', 'Admin\ArticlesController@switchdown');
// 文章评论删除
Route::get('/admin/articles/comment/{id}', 'Admin\ArticlesController@comment');


// 心情随笔(日记)资源控制器
Route::resource('/admin/diary','Admin\DiaryController');

// 友情链接资源控制器
Route::resource('/admin/blogroll','Admin\BlogrollsController');

// 广告管理资源控制器
Route::resource('/admin/advert','Admin\AdvertsController');