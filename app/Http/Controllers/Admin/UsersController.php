<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Models\Huser;
use Hash;

class UsersController extends Controller
{
    /**
     * 用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dump($request->all());
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        $req = $request->all();
        $huser = Huser::where('uname','like','%'.$search.'%')->paginate($showCount);

        // 加载列表
        return view('admin.huser.index',['title'=>'用户列表','huser'=>$huser,'req'=>$req]);
    }

    /**
     * 用户添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        return view('admin.huser.create',['title'=>'用户添加']);

    }
 
    /**
     * 用户执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        // 获取数据
        $huser = new Huser;
        $huser->uname = $request->input('uname');
        $huser->uaccnum = $request->input('uaccnum');
        $huser->upasswd = Hash::make($request->input('upasswd'));
        $res = $huser->save();
        if ($res) {
            return redirect('admin/huser')->with('success','添加成功');
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
     * 显示用户修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $a = Huser::where('uid','=',$id)->firstOrFail();
        
        return view('admin.huser.edit',['a'=>$a,'id'=>$id]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         // 获取数据
        $huser = Huser::where('uid','=',$id)->firstOrFail();
        $huser->uname = $request->input('uname');
        $huser->uaccnum = $request->input('uaccnum');
         if ($huser->save()) {
            return redirect('admin/huser')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除用户.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        return redirect('admin/huser');

       
    }
}
