<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
    /**
     * 显示文章类别页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        return view('admin.create.index',['cates'=>$cates]);
    }

    /**
     * 显示文章类别添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        // 跳转到文章类别添加页面
        return view('admin.create.create',['cates'=>$cates]);
    }

    /**
     * 添加-接收数据提交
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        $cpid = $request->input('cpid','');
        if($cpid == 0){
            $cpath = 0;
        }else{
            $parent_dara = Cates::find($cpid);
            $cpath = $parent_dara->cpath.','.$parent_dara->cid;
        }
        // 往数据库里面存储数据
        $cates = new Cates;
        $cates->cname = $request->input('cname','');
        $cates->cpid = $request->input('cpid','');
        $cates->cpath = $cpath;
        // 判断是否成功返回值
        if($cates->save()){
            return back()->with('success','添加类别成功');
        }else{
            return back()->with('error','添加类别失败');
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
     * 显示指定id的类别
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取指定id的类别数据
        $cate = Cates::where('cid','=',$id)->first();
        return view('admin.create.edit',['cate'=>$cate]);
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
        $cname = $request->input('cname');
        $res = Cates::where('cid','=',$id)->update(['cname'=>$cname]);
        if($res){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除指定id的类别
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
        $res = Cates::where('cid','=',$id)->delete();
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
