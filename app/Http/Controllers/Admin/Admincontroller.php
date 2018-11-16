<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Auser;
use Hash;
use App\Http\Requests\AdminStoreRequest;

class Admincontroller extends Controller
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
        $auser = Auser::where('name','like','%'.$search.'%')->paginate($showCount);

        // 加载列表
        return view('admin.auser.index',['title'=>'管理员列表','auser'=>$auser,'req'=>$req]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //管理员添加界面
        return view('admin.auser.create',['title'=>'管理员添加']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request)
    {
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

        $auser = new Auser;
        $auser->name = $request->input('name');
        $auser->portrait = $portrait_path;
        $auser->passwd = Hash::make($request->input('passwd'));
        $res = $auser->save();
        if ($res) {
            return redirect('admin/auser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }


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
        //
        $a = Auser::firstOrFail();
        return view('admin.auser.edit',['a'=>$a,'id'=>$id]);
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
        //
        if($request -> hasFile('portrait')){
            $portrait = $request -> file('portrait');
            $ext = $portrait ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $portrait -> move($dir_name,$file_name);
            $portrait_path = ltrim($dir_name.'/'.$file_name,'.');
        }else {
           $a = Auser::find($id);
           $portrait_path = $a->portrait;
        }

        $auser = Auser::findOrFail($id);
        $auser->name = $request->input('name');
        $auser->portrait = $portrait_path;

        $res = $auser->save();
        if ($res) {
            return redirect('admin/auser')->with('success','修改成功');
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
        //
        Auser::destroy($id);
        return redirect('admin/auser');
    }

    /**
     * 登录页面
     */
    public function login()
    {
        return view('admin.login.index');
    }

    /**
     * 登录操作
     */
    public function dologin(Request $request)
    {
        //获取用户数据
        $user = Auser::where('name', $request->name)->first();
       

        //验证密码
        if(Hash::check($request->passwd,$user->passwd)){
            //写入session
            session(['name'=>$user->name, 'id'=>$user->id]);
            return redirect('/admin/layout/layout')->with('success','登录成功');
        }else{
            return back()->with('error','登录失败!');
        }

    }

    /**
     * 后台管理员退出
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin/login')->with('success','退出成功');
    }

}
