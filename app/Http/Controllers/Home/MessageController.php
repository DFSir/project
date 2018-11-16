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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::find(1);
        $message = Messages::orderBy('mid', 'desc')->paginate(100);
        return view('home.message.message',['about'=>$about,'message'=>$message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
