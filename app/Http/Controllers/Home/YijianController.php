<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class YijianController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Feedback::where('state','=',1)->get();

        return view('home.yijian.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //意见添加到数据库
        $fedd = new Feedback;
        $fedd->senderid = $request->uid;
        $fedd->fcontent = $request->fcontent;

        if($fedd -> save()){
            return redirect('/')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

}
