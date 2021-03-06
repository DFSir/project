<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Huser;
use App\Models\Detail;
use Hash;
use Mail;
use DB;
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
     * 执行注册
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证信息
        $this->validate($request, [
            'uname' => 'required|regex:/^.{2,20}$/',
            'uaccnum' => 'required|unique:homeusers|regex:/^[0-9]{6,18}$/',
            'upasswd' => 'required|regex:/^[A-Za-z0-9]{6,18}$/',
            'repassword' => 'required|same:upasswd',
        ],[
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uaccnum.regex' => '账号格式错误',
            'uaccnum.unique' => '账号已存在',
            'upasswd.required' => '密码必填',
            'upasswd.regex' => '密码格式错误',
            'repassword.required' => '确认密码必填',
            'repassword.same' => '两次密码不一致',
        ]);

        $huser = new Huser;
        $huser->uname = $request->input('uname','');
        $huser->uaccnum = $request->input('uaccnum','');
        $huser->upasswd = Hash::make($request->upasswd);
        $res1 = $huser->save();
        $id = $huser->uid;
        $detail = new Detail;
        $detail->uid = $id;
        $detail->photo = '/admin/static/h-ui/images/ucnter/avatar-default-S.gif';
        $res2 = $detail->save();
        if($res1 && $res2){

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

    /**
     *
     *执行登录用户
     */
    public function dologin(Request $request)
    {

        //获取数据
        $huser = Huser::where('uaccnum',$request->uaccnum)->first(); 

        if(!$huser){
            return back()->with('error','账号不存在');
        }

        //验证密码
        if (Hash::check($request->upasswd,$huser->upasswd)) {
            //存到session
            session(['Huser' => $huser]);
 
            session(['uaccnum'=>$huser->uaccnum]);

            return redirect('/')->with('success','登陆成功');
        }else{
            return back()->with('error','账号密码错误');
        }       
    }

     /**
     *
     *退出登录
     */
    public function logout(Request $request)
    {
        //删除session的值
        $request->session()->flush();
        return back();
    }

     /**
     *
     *忘记密码
     */
    public function newpass(Request $request)
    {
        return view('home.login.newpass');
    }

    //修改忘记的密码
    public function xiupass(Request $request)
    {
        $aa = $request->uaccnum;
        $mima = Huser::where('uaccnum','=',$aa)->get();       
        return view('home.login.xiupass',['mima'=>$mima]);
    }

    //执行修改密码
    public function gaipass(Request $request)
    {
        $data = $request -> except('_token');
        $aa = $request->uaccnum;
        $data = Huser::where('uaccnum','=',$aa)->first();
        $data->upasswd = Hash::make($request->input('passwd',''));

        if($data->save()){
            return redirect('/home/login')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }


}
