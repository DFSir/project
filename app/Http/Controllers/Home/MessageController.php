<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\About;

class MessageController extends Controller
{
    /**
     * 跳转到留言页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取关于我的数据
        $about = About::find(1);
        // 获取留言数据
        $message = Messages::orderBy('mid', 'desc')->paginate(100);
        return view('home.message.message',['about'=>$about,'message'=>$message]);
    }

    /**
     * 前台用户添加留言
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 添加用户留言
        $message = new Messages;
        $message->uid = $request->input('uid');
        $message->mcontent = $request->input('mcontent');
        // 判断数据是否存储成功
        if($message->save()){
            return back();
        }else{
            return back();
        }
    }

}
