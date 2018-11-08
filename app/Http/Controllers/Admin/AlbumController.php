<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Photo;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $showCount = $request->input('showCount',10);
        $req = $request->all();
        $album = Album::paginate($showCount);

        // 加载列表
        return view('admin.photo.index',['title'=>'相册列表','album'=>$album,'req'=>$req]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $album = new Album;
        $album->alname = $request->input('alname');
        // 判断数据是否成功存入数据库
        if($album->save()){
            return back()->with('success','添加相册成功');
        }else{
            return back()->with('error','添加相册失败');
        }
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
        $red = Photo::where('alid','=',$id)->delete();
        $res = Album::where('alid','=',$id)->delete();
        if($res && $red){
            return back()->with('success','删除相册成功');
        }else{
            return back()->with('error','删除相册失败');
        }
    }
}
