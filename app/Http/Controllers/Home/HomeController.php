<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Articles;
use App\Models\Slides;
use App\Models\Tag;
use App\Models\Blogroll;

class HomeController extends Controller
{
    /**
     * 博客首页跳转
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 跳转到首页
        return view('home.layout.layout');
    }


    /**
     * 文章列表页
     * 
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        // 从数据库获取文章数据
        $artle = Articles::where('astate','=','11')->where('cid','=',$id)->get();
        // 从数据库获取文章分类名称
        $cname = Cates::find($id);
        $kname = Cates::find($cname->cpid);
        // 跳转到文章列表页
        return view('home.article.list',['artle'=>$artle,'kname'=>$kname,'cname'=>$cname]);
    }


    /**
     * 文章详情页
     * 
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        // 从数据库获取文章详情数据
        $artle = Articles::find($id);
        // 从数据库获取文章分类名称
        $cname = Cates::find($artle->cid);
        $kname = Cates::find($cname->cpid);
        // 增加点击次数
        $click = $artle->click+1;
        Articles::where('aid','=',$id)->update(['click'=>$click]);
        return view('home.article.detail',['artle'=>$artle,'kname'=>$kname,'cname'=>$cname]);
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


}
