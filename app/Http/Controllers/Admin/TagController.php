<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //加载标签浏览
        $showCount = $request->input('showCount',10);
        $search = $request->input('search','');
        $req = $request->all();

        $tags = Tag::where('name','like','%'.$search.'%')->paginate($showCount);



        return view('admin.tag.index',['tags'=>$tags, 'title'=>'标签浏览','req'=>$req]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载标签添加界面
        return view('admin.tag.create',['title'=>'添加标签']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required|unique:tags'
        ],[
            'name.required' => '标签不能为空',
            'name.unique' => '标签已存在'
        ]);
        //
        $tags = new Tag;
        $tags->name = $request->name;

        if($tags -> save()){
            return redirect('/admin/tag')->with('success','添加成功');
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
        //标签修改
        $tags = Tag::firstOrFail();
        return view('admin.tag.edit',['tags'=>$tags,'id'=>$id,'title'=>'标签修改']);
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
        $this->validate($request, [
            'name' => 'required|unique:tags'
        ],[
            'name.required' => '标签不能为空',
            'name.unique' => '标签已存在'
        ]);
        //
        $tags = Tag::firstOrFail();
        $tags->name = $request->name;
        if($tags -> save()){
            return redirect('/admin/tag')->with('success','修改成功');
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
        //标题删除
        $tags = Tag::destroy($id);

        if($tags){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
