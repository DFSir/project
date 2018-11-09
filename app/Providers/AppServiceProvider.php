<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cates;
use App\Models\Articles;
use App\Models\Slides;
use App\Models\Tag;
use App\Models\Blogroll;
use App\Models\Advert;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
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
        // 从数据库获取广告数据
        $advert = Advert::all();
        view()->share([
            'cates'=>$cates,
            'articles'=>$articles,
            'recommend'=>$recommend,
            'like'=>$like,
            'slides'=>$slides,
            'tag'=>$tag,
            'blog'=>$blog,
            'advert'=>$advert
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
