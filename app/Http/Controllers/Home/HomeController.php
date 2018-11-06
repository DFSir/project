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
        // 跳转到文章列表页
        return view('home.article.list',['artle'=>$artle]);
    }
}
