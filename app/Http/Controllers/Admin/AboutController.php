<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 从数据库取值
        $about = About::find(1);
        return view('admin.about.index',['title'=>'关于我','about'=>$about]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 从数据库取值
        $about = About::find($id);
        return view('admin.about.edit',['title'=>'修改关于我','about'=>$about]);
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
        //处理表单提交信息
        if($request -> hasFile('portrait')){
            $portrait = $request -> file('portrait');
            $ext = $portrait ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $portrait -> move($dir_name,$file_name);
            $portrait_path = ltrim($dir_name.'/'.$file_name,'.');
        }

        // 获取表单提交来的数据
        $name = $request->input('name');
        $profession = $request->input('profession');
        $qq = $request->input('qq');
        $email = $request->input('email');
        $about = $request->input('aboutme');

        $res = About::where('id','=',$id)->update(['name'=>$name,'portrait'=>$portrait_path,'profession'=>$profession,'qq'=>$qq,'email'=>$email,'aboutme'=>$about]);
        if ($res) {
            return redirect('admin/about')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
    }
}
