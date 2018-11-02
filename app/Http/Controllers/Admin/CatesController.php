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
    public function index(Request $request)
    {
        // 根据条件搜索及获取分页
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        // 把分页和搜索条件存储起来提交回去
        $req = $request->all();
        // 根据paths排序返回数据,并且分页每页10条
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->where('cname','like','%'.$search.'%')->paginate($showCount);;
        return view('admin.create.index',['cates'=>$cates,'req'=>$req,'title'=>'文章类别']);
    }

    /**
     * 显示文章类别添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 根据paths排序返回数据
        $cates = Cates::select('*',DB::raw("concat(cpath,',',cid) as paths"))->orderBy('paths','asc')->get();
        // 跳转到文章类别添加页面
        return view('admin.create.create',['cates'=>$cates,'title'=>'文章类别添加']);
    }

    /**
     * 添加-接收数据提交
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取类别的所有名称
        $cate = Cates::all();
        $cname = $request->input('cname');
        // 判断提交过来的类别名称是否和已有类别名称重复
        foreach($cate as $k=>$v){
            if($v->cname == $cname){
                return back()->with('error','添加类别失败,类别名称重复');
            }
        }
        // 获取父级的路径,顶级为0
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
        return view('admin.create.edit',['cate'=>$cate,'title'=>'文章类别名称修改']);
    }

    /**
     * 根据指定的id更新数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 获取提交过来的类别名称
        $cname = $request->input('cname');
        $cate = Cates::all();
        // 判断提交过来的类别名称是否和已有类别名称重复
        foreach($cate as $k=>$v){
            if($v->cname == $cname){
                return back()->with('error','添加类别失败,类别名称重复');
            }
        }
        // 把提交过来的数据放进指定数据表
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
        // 判断指定的类别下是否有子类,有就不能删除
        $cates = Cates::all();
        foreach ($cates as $k => $v) {
            if($v->cpid == $id){
                return back()->with('error','该类下面有子分类不能删除');
            }
        }
        // 删除指定的类别
        $res = Cates::where('cid','=',$id)->delete();
        if($res){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
