<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Articles;
use App\Models\Diary;
use App\Models\Album;
use App\Models\Comments;
use App\Models\About;
use App\Models\Tag;



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
     * 文章搜索页
     * 
     * @return \Illuminate\Http\Response
     */
    public function seek(Request $request)
    {
        // 文章标题搜索条件
        $title = $request->input('title','');
        // 从数据库获取文章数据
        $artle = Articles::where('astate','=','11')->where('title','like','%'.$title.'%')->get();

        return view('home.article.seek',['artle'=>$artle]);
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
        // 获取文章评论
        $comment = Comments::where('aid','=',$id)->orderBy('id', 'desc')->get();
        return view('home.article.detail',['artle'=>$artle,'kname'=>$kname,'cname'=>$cname,'comment'=>$comment]);
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
        return view('home.about.aboutme',['about'=>$about]);
    }

    public function diary()
    {
        $diary = Diary::all();       
        return view('home.diary.index',['diary'=>$diary]);
    }

    public function modify()
    {
        return view('home.modify');
    }

    public function tags(Request $request, $id)
    {
         //判读标签ID是否传递
        if(!empty($request->id)){
            $tag = Tag::findOrFail($request->id);
            $articles = $tag->articles()->paginate(10);
        }

        $tags = Tag::find($id);

        return view('home.article.tags',['articles'=>$articles,'tags'=>$tags]);


    }

}
