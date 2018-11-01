<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Diary;
use DB;

class DiaryController extends Controller
{
    /**
     * 后台日记浏览页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $showCount = $request->input('showCount',3);
        $search = $request->input('search','');
        // dump($search);
        // dd();

        $diary = Diary::where('dtitle','like','%'.$search.'%')->paginate($showCount);

        // $diary = Diary::paginate(3);


        return view('admin.diary.index',['diary'=>$diary, 'title'=>'日记浏览','request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.diary.create');
    }

    /**
     * 添加日记
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $diary = new Diary;
        $diary->dtitle = $request->dtitle;
        $diary->dcontent = $request->dcontent;

        if($diary -> save()){
            return redirect('/admin/diary')->with('success','添加成功');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $diary = Diary::where('did',$id)->firstOrFail();
        return view('admin.diary.edit',['diary'=>$diary,'id'=>$id]);
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
        $diary = Diary::where('did','=',$id)->firstOrFail();
        $diary->dtitle = $request->dtitle;
        $diary->dcontent = $request->dcontent;
        if($diary -> save()){
            return redirect('/admin/diary')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        $data = Diary::where('did',$id)->delete();

        if($data){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','添加失败');
        }

    }
}
