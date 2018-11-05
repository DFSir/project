<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Articles;

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
        $articles = Articles::where('astate','=','11')->get();
        // 跳转到首页
        return view('home.layout.layout',['cates'=>$cates,'articles'=>$articles]);
    }

}
