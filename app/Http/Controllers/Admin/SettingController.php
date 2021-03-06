<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::all();
        return view('admin.setting.index',['title'=>'网站配置', 'setting'=>$setting]);

    }

   

    /**
     * 修改网站配置
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $setting = Setting::find($id);
        return view('admin.setting.edit',['title'=>'修改配置', 'setting'=>$setting]);
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

        if($request -> hasFile('logo')){
            $logo = $request -> file('logo');
            $ext = $logo ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $logo -> move($dir_name,$file_name);
            $logo_path = ltrim($dir_name.'/'.$file_name,'.');
        }else {
           $a = Setting::find($id);
           $logo_path = $a->logo;
        }


        $setting = Setting::findOrFail($id);
        $setting->title = $request->title;
        $setting->logo = $logo_path;
        $setting->banquan = $request->banquan;
        $setting->kg = $request->kg;

        $res = $setting->save();
        if ($res) {
            return redirect('admin/setting')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    
}
