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
// 后台管理员资源控制器
Route::resource('/admin/auser','Admin\AdminController' );
// 意见反馈
Route::get('/admin/opinion/hf/{id}', 'Admin\FeedbacksController@hf');
Route::post('/admin/opinion/state/{id}', 'Admin\FeedbacksController@state');
// 后台意见反馈资源控制器
Route::resource('/admin/opinion','Admin\FeedbacksController');
// 后台相册名称资源控制器
Route::resource('/admin/album','Admin\AlbumController');
// 后台相片资源控制器
Route::resource('/admin/photo','Admin\PhotoController');
// 后台查看留言
Route::resource('/admin/message','Admin\MessageController');



//后台登录
Route::get('admin/login','Admin\AdminController@login');
//登录操作
Route::post('admin/login','Admin\AdminController@dologin');

//网站配置路由
Route::resource('/admin/setting','Admin\SettingController');








// 前台首页
Route::get('/','Home\HomeController@index');
// 前台分类跳转列表页
Route::get('/home/list/{id}','Home\HomeController@list');
// 前台文章跳转详情页
Route::get('/home/detail/{id}','Home\HomeController@detail');
// 前台文章详情点赞
Route::get('/home/like/{id}','Home\HomeController@like');
// 前台文章评论
Route::resource('/home/comment','Home\CommentsController');
// 前台关于我
Route::get('/home/aboutme','Home\HomeController@aboutme');
// 前台留言
Route::get('/home/message','Home\HomeController@message');
// 前台相册
Route::get('/home/album','Home\HomeController@album');
// 前台注册
Route::get('/home/zhuce','Home\LoginController@zhuce');
// 前台执行注册
Route::post('/home/store','Home\LoginController@store');
// 前台用户激活
Route::get('/home/jihuo','Home\LoginController@jihuo');
// 前台登录
Route::get('/home/login','Home\LoginController@login');
// 前台留言
Route::resource('/home/message','Home\MessageController');
// 前台日记
Route::get('/home/diary','Home\HomeController@diary');
// 前台用户退出
Route::get('/home/logout','Home\LoginController@logout');
// 前台登录
Route::post('/home/login','Home\LoginController@dologin');
