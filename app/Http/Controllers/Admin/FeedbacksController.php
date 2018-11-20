<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        $req = $request->all();

        $feedback = Feedback::where('ftitle','like','%'.$search.'%')->paginate($showCount);

        return view('admin.opinion.index',['feedback'=>$feedback, 'title'=>'意见反馈', 'req'=>$req]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Feedback::where('fid',$id)->delete();

        if($data){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    //加载回复界面
    public function hf(Request $request, $id)
    {   

        $feedback = Feedback::findOrFail($id);

        return view('admin.opinion.hf',['title'=>'意见回复','feedback'=>$feedback]);
    }

    //处理回复消息
    public function state(Request $request, $id)
    {

        $huifu = Feedback::where('fid','=',$id)->update(['state'=>'1','huifu'=>$request->huifu]);

        return redirect('/admin/opinion')->with('success','回复成功');


    }

}
