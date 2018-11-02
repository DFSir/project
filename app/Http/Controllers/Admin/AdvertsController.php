<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Advert;
class AdvertsController extends Controller
{
    /**
     * 广告列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //分页搜索
        $showCount = $request->input('showCount',5);
        $search = $request->input('search','');
        $req = $request->all();
        $advert = Advert::where('url','like','%'.$search.'%')->paginate($showCount);

        // 加载列表
        return view('admin.advert.index',['title'=>'广告列表','advert'=>$advert,'req'=>$req]);
    }

    /**
     * 广告添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.advert.create',['title'=>'广告添加']);
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd( $request->all());
        $advert = new Advert;
        $advert->url = $request->input('url');
        $advert->state = $request->input('state');
        if($advert -> save()){
            return redirect('/admin/advert')->with('success','添加成功');
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
     * 修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $a = Advert::where('id','=',$id)->firstOrFail();
        
        return view('admin.advert.edit',['a'=>$a,'id'=>$id]);
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
        $advert = Advert::where('id','=',$id)->firstOrFail();
        $advert->url = $request->input('url');
        $advert->state = $request->input('state');
         if ($advert->save()) {
            return redirect('admin/advert')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除广告
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Advert::destroy($id);
        return redirect('admin/advert');
    }
}
