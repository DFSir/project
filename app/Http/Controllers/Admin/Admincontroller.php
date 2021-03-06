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
        
        if(!$user){
            return back()->with('error','登录失败!');
        }

        //验证密码
        if(Hash::check($request->passwd,$user->passwd)){
            //写入session
            session(['name'=>$user->name, 'id'=>$user->id]);
            return $this->admins();
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

    /**
     * 后台首页
     */
    public function admins()
    {
        // 获取服务器ip地址
        $ip = GetHostByName($_SERVER['SERVER_NAME']);
        // 获取服务器解译引擎
        $exp = $_SERVER['SERVER_SOFTWARE'];
        // 获取服务器域名
        $domain = $_SERVER["HTTP_HOST"];
        // 获取服务器语言
        $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        // 获取服务器Web端口
        $port = $_SERVER['SERVER_PORT'];
        // 获取服务器系统目录
        $cata = $_SERVER['SystemRoot'];
        // 获取服务器版本
        $phpname = php_uname('s').php_uname('r');
        // 获取服务器操作系统
        $phpuname = php_uname();
        // 获取php版本
        $php = PHP_VERSION;
        // 获取php安装路径
        $phpinc = DEFAULT_INCLUDE_PATH;
        // 获取php运行方式
        $phpsapi = php_sapi_name();
        // 获取服务器当前时间
        $time = date("Y-m-d H:i:s");
        // 获取最大上传限制
        $cfg = get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许";
        // 获取最大上传时间
        $max = get_cfg_var("max_execution_time")."秒 ";
        // 脚本运行占用最大内存
        $limit = get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无";

        return view('admin.layout.index',[
            'ip'=>$ip,
            'exp'=>$exp,
            'domain'=>$domain,
            'lang'=>$lang,
            'port'=>$port,
            'cata'=>$cata,
            'php'=>$php,
            'phpname'=>$phpname,
            'phpuname'=>$phpuname,
            'phpinc'=>$phpinc,
            'phpsapi'=>$phpsapi,
            'time'=>$time,
            'cfg'=>$cfg,
            'max'=>$max,
            'limit'=>$limit
        ]);
    }

}
