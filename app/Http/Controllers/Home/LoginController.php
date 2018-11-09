<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Huser;
use Hash;
class LoginController extends Controller
{
    /**
     *
     *注册用户
     */
    public function zhuce(Request $request)
    {
        return view('home.login.zhuce'); 
    }
    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $this->validate($request, [
            'uname' => 'required|unique:homeusers|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'uaccnum' => 'required|regex:/^[\d]{6,18}$/',
            'upasswd' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:upasswd',

        ],[
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户名已存在',
            'uaccnum.regex' => '账号格式错误',
            'upasswd.required' => '密码必填',
            'upasswd.regex' => '密码格式错误',
            'repassword.required' => '确认密码必填',
            'repassword.same' => '两次密码不一致',
           

        ]);

            $huser = new Huser;
            $huser->uname = $request->input('uname','');
            $huser->uaccnum = $request->input('uaccnum','');
            $huser->upic = '/uploads/20181109/2HLKtCBIMPtqheycLdr31541748617.jpg';
            $huser->upasswd = Hash::make($request->upasswd);
  
             if($huser ->save()){
                    return redirect('/home/login')->with('success','添加成功');
                }else{
                    return back()->with('error','添加失败');
                }
           

    }

    /**
     *
     *登录用户
     */
    public function login()
    {
        return view('home.login.login');
    }

}
