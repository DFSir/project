<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Slides;
use App\Models\Articles;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取轮播图表的数据
        $slide = Slides::all();
        // 把获取到的数据提交到页面
        return view('admin.slide.index',['title'=>'前台轮播图','slide'=>$slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aid = Slides::select('aid')->get();
        // 获取文章详情的标题数据
        $articles = Articles::where('astate','=','11')->select('aid','title')->get();

        return view('admin.slide.create',['title'=>'添加轮播图','articles'=>$articles,'aid'=>$aid]);
    }

    /**
     * 获取提交过来的数据添加到数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'slide' => 'required',
            'describe' => 'required'
        ],[
            'slide.required' => '轮播图是必须要有图片呀!(╯▔皿▔)╯',
            'describe.required' => '轮播图怎么能没有标题呢╰（‵□′）╯~'
        ]);
        //处理表单提交信息
        if($request -> hasFile('slide')){
            $slide = $request -> file('slide');
            $ext = $slide ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/slide/'.date('Ymd',time());
            $res = $slide -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        // 获取数据保存到数据库
        $slides = new Slides;
        $slides->aid = $request->input('aid');
        $slides->slide = $slide_path;
        $slides->describe = $request->input('describe');
        // 判断数据是否存储成功
        if($slides->save()){
            return back()->with('success','添加轮播图成功');
        }else{
            return back()->with('error','添加轮播图失败');
        }
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 从数据库获取指定id的数据
        $slide = Slides::find($id);
        // 跳转到轮播图修改页面
        return view('admin.slide.edit',['title'=>'修改轮播图','slide'=>$slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'describe' => 'required'
        ],[
            'describe.required' => '别以为在这里就可以把标题改没啊(╯‵□′)╯炸弹！•••*～●~'
        ]);
        // 
        $describe = $request->input('describe');
        if ($request->hasFile('slide')){
            $slide = $request -> file('slide');
            $ext = $slide ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/slide/'.date('Ymd',time());
            $res = $slide -> move($dir_name,$file_name);
            $slide_path = ltrim($dir_name.'/'.$file_name,'.');
            // 把数据更新到数据库
            $res = Slides::where('id','=',$id)->update(['slide'=>$slide_path,'describe'=>$describe]);
        }else{
            // 把数据更新到数据库
            $res = Slides::where('id','=',$id)->update(['describe'=>$describe]);
        }
        if($res){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        // 删除指定id的数据
        $res = Slides::where('id','=',$id)->delete();
        if($res){
            return back()->with('success','删除轮播图成功');
        }else{
            return back()->with('error','删除轮播图失败');
        }
    }
}
