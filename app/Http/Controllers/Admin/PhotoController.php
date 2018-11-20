<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Album;

class PhotoController extends Controller
{
   
    /**
     * 给指定的相册添加图片
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = new Photo;
        $alid = $request->input('alid');
        // 多条数据
        $more = [];
        if($request -> hasFile('picture')){
            $picture = $request -> file('picture');
            foreach ($picture as $key => $value) {
                // 图片路径处理
                $one = [];
                // 获取文件后缀
                $ext = $value ->getClientOriginalExtension(); 
                $file_name = str_random('20').'.'.$ext;
                $dir_name = './uploads/photo/'.date('Ymd',time());
                $res = $value -> move($dir_name,$file_name);
                if($res){
                    // 拼接数据库存放路径
                    $picture_path = ltrim($dir_name.'/'.$file_name,'.'); 
                    $one[$key] = ['alid'=>$alid,'picture'=>$picture_path];
                }
                $more[] = $one[$key];
            }
        }
        $res = Photo::insert($more);
        // 判断数据是否存储成功
        if($res){
            return back()->with('success','添加图片成功');
        }else{
            return back()->with('error','添加图片失败');
        }
    }

    /**
     * 跳转相册的图片列表页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $album = Album::find($id);
        $photo = Photo::where('alid','=',$id)->get();
        return view('admin.photo.show',['album'=>$album,'photo'=>$photo]);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 删除指定id的数据
        $res = Photo::where('pid','=',$id)->delete();
        if($res){
            return back()->with('success','删除图片成功');
        }else{
            return back()->with('error','删除图片失败');
        }
    }
}
