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

// 登录后台
Route::get('/admins', function () {
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
// 标签资源控制器
Route::resource('/admin/tag','Admin\TagController');
// 关于我资源控制器
Route::resource('/admin/about','Admin\AboutController');
// 轮播图资源控制器
Route::resource('/admin/slide','Admin\SlideController');
//后台管理员资源控制器
Route::resource('/admin/auser','Admin\AdminController' );
//意见反馈
Route::get('/admin/opinion/hf/{id}', 'Admin\FeedbacksController@hf');
Route::post('/admin/opinion/state/{id}', 'Admin\FeedbacksController@state');
//后台意见反馈资源控制器
Route::resource('/admin/opinion','Admin\FeedbacksController');









// 前台首页
Route::get('/','Home\HomeController@index');
// 前台分类跳转列表页
Route::get('/home/list/{id}','Home\HomeController@list');
// 前台文章跳转详情页
Route::get('/home/detail/{id}','Home\HomeController@detail');
// 前台文章详情点赞
Route::get('/home/like/{id}','Home\HomeController@like');
// 前台关于我
Route::get('/home/aboutme','Home\HomeController@aboutme');


