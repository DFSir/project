<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Messages;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 把分页和搜索条件存储起来提交回去
        $req = $request->all();
        $message = Messages::orderBy('mid', 'desc')->paginate(100);
        // 跳转到留言列表页
        return view('admin.message.index',['title'=>'留言游览','message'=>$message,'req'=>$req]);
    }

    

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 删除指定的留言
        $res = Messages::where('mid','=',$id)->delete();
        if($res){
            return back()->with('success','删除留言成功');
        }else{
            return back()->with('error','删除留言失败');
        }
    }
}
