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
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
            'aboutme' => 'required',
        ],[
            'name.required' => '难道你没有名字吗w(ﾟДﾟ)w~',
            'profession.required' => '没有职业不知道填站长啊╰（‵□′）╯~',
            'aboutme.required' => '字体是隐形的吗,我怎么看不见啊ㄟ( ▔, ▔ )ㄏ~',
        ]);
        //处理表单提交信息
        if($request -> hasFile('portrait')){
            $portrait = $request -> file('portrait');
            $ext = $portrait ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $portrait -> move($dir_name,$file_name);
            $portrait_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            $portrait_path = '/uploads/20181105/Tx2xIC7znYWXIL3KqZQY1541389322.jpg';
        }

        // 获取表单提交来的数据
        $name = $request->input('name');
        $profession = $request->input('profession');
        $qq = $request->input('qq');
        $email = $request->input('email');
        $aboutme = $request->input('aboutme');
        
        $res = About::where('id','=',$id)->update(['name'=>$name,'portrait'=>$portrait_path,'profession'=>$profession,'qq'=>$qq,'email'=>$email,'aboutme'=>$aboutme]);
        if ($res) {
            return redirect('admin/about')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }


    }

    
}
