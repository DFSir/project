<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Huser;
use App\Models\Detail;

class DetailController extends Controller
{
    

    /**
     * 显示个人中心页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Huser::find($id);
        
        return view('home.geren.index',['user'=>$user]);
    }

    /**
     * 显示修改个人中心页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $huser = Huser::find($id);
        return view('home.geren.edit',['huser'=>$huser]);
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
        // 给提交过来的数据做判断
        $this->validate($request, [
            'uname' => 'required',
            'phone' => 'regex:/^1[34578]\d{9}$/',
            'email' => 'regex:/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/'
        ],[
            'uname.required' => '用户名不能为空哦~',
            'phone.regex' => '手机号格式错误',
            'email.regex' => '邮箱格式错误'
        ]);
        // 
        if($request -> hasFile('photo')){
            $photo = $request -> file('photo');
            $ext = $photo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $photo -> move($dir_name,$file_name);
            $photo_path = ltrim($dir_name.'/'.$file_name,'.');
        }else {
           $a = Detail::where('uid','=',$id)->first();
           $photo_path = $a->photo;
        }

        //获取数据
        $uname = $request->input('uname');
        $sex = $request->input('sex');
        $phone = $request->input('phone');
        $email = $request->input('email');

        // 把提交过来的数据放进指定数据表
        $res1 = Huser::where('uid','=',$id)->update(['uname'=>$uname]);
        $res2 = Detail::where('uid','=',$id)->update(['sex'=>$sex,'phone'=>$phone,'email'=>$email,'photo'=>$photo_path]);

        if ($res1 && $res2) {
            return $this->show($id)->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

   
}
