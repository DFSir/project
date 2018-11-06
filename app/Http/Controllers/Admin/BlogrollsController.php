<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Blogroll;

class BlogrollsController extends Controller
{
    /**
     * 友情链接列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $showCount = $request->input('showCount',10);
        $search = $request->input('search','');
        $req = $request->all();
        $blogroll = Blogroll::where('name','like','%'.$search.'%')->paginate($showCount);

        // 加载列表
        return view('admin.blogroll.index',['title'=>'友情链接列表','blogroll'=>$blogroll,'req'=>$req]);
       
    }

    /**
     * 友情链接添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blogroll.create',['title'=>'友情链接添加']);
    }

    /**
     * 友情链接执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // 获取数据

       // dd( $request->all());
        $blogroll = new Blogroll;
        $blogroll->name = $request->input('name');
        $blogroll->url = $request->input('url');
        if($blogroll -> save()){
            return redirect('/admin/blogroll')->with('success','添加成功');
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
     * 修改友情链接
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $a = Blogroll::where('id','=',$id)->firstOrFail();
        
        return view('admin.blogroll.edit',['a'=>$a,'id'=>$id]);
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
        $blogroll = Blogroll::where('id','=',$id)->firstOrFail();
        $blogroll->name = $request->input('name');
        $blogroll->url = $request->input('url');
         if ($blogroll->save()) {
            return redirect('admin/blogroll')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除链接
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Blogroll::destroy($id);
        return redirect('admin/blogroll');
    }
}
