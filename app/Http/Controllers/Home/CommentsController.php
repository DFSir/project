<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Comments;

class CommentsController extends Controller
{
    

    /**
     * 用户评论
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $comment = new Comments;
        $comment->uid = $request->input('uid');
        $comment->aid = $request->input('aid');
        $comment->comment = $request->input('comment');
        // 判断数据是否存储成功
        if($comment->save()){
            return back();
        }else{
            return back();
        }
    }

    
}
