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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 从数据库获取类别数据
        $cates = Cates::all();
        // 从数据库获取文章数据
        $articles = Articles::where('astate','=','11')->orderBy('created_at','desc')->take(12)->get();
        // 从数据库获取推荐文章数据
        $recommend = Articles::where('astate','=','11')->where('state','=','1')->get();
        // 从数据库获取点赞排行文章数据
        $like = Articles::where('astate','=','11')->orderBy('like','desc')->take(5)->get();
        // 从数据库获取轮播图数据
        $slides = Slides::all();
        // 从数据库获取标签数据
        $tag = Tag::all();
        // 从数据库获取友情链接数据
        $blog = Blogroll::all();
        // 跳转到首页
        return view('home.layout.layout',[
            'cates'=>$cates,
            'articles'=>$articles,
            'recommend'=>$recommend,
            'like'=>$like,
            'slides'=>$slides,
            'tag'=>$tag,
            'blog'=>$blog
        ]);
    }

}
