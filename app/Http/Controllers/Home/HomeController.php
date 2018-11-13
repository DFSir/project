<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Articles;
use App\Models\Slides;
use App\Models\About;
use App\Models\Setting;
use App\Models\Diary;

class HomeController extends Controller
{
    /**
     * 博客首页跳转
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取网站配置表
        $setting = Setting::find(1);

        // 跳转到首页
        return view('home.layout.layout',['setting'=>$setting]);
    }


    /**
     * 文章列表页
     * 
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        $setting = Setting::find(1);
        // 从数据库获取文章数据
        $artle = Articles::where('astate','=','11')->where('cid','=',$id)->get();
        // 从数据库获取文章分类名称
        $cname = Cates::find($id);
        $kname = Cates::find($cname->cpid);
        // 跳转到文章列表页
        return view('home.article.list',['artle'=>$artle,'kname'=>$kname,'cname'=>$cname,'setting'=>$setting]);
    }


    /**
     * 文章详情页
     * 
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $setting = Setting::find(1);
        // 从数据库获取文章详情数据
        $artle = Articles::find($id);
        // 从数据库获取文章分类名称
        $cname = Cates::find($artle->cid);
        $kname = Cates::find($cname->cpid);
        // 增加点击次数
        $click = $artle->click+1;
        Articles::where('aid','=',$id)->update(['click'=>$click]);
        return view('home.article.detail',['artle'=>$artle,'kname'=>$kname,'cname'=>$cname,'setting'=>$setting]);
    }

    /**
     * 文章详情点赞
     * 
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        // 从数据库获取文章详情数据
        $artle = Articles::find($id);
        // 增加点击次数
        $like = $artle->like+1;
        Articles::where('aid','=',$id)->update(['like'=>$like]);

        return back();
    }

    /**
     * 关于我页面跳转
     */
    public function aboutme()
    {
        $about = About::find(1);
        $setting = Setting::find(1);    
        return view('home.about.aboutme',['about'=>$about,'setting'=>$setting]);
    }


    public function diary()
    {
        $diary = Diary::all();
        $setting = Setting::find(1);
        
        return view('home.diary.index',['diary'=>$diary, 'setting'=>$setting]);
    }

}
