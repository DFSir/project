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
        // 广告图片上传
        if($request -> hasFile('apic')){
            $apic = $request -> file('apic');
            $ext = $apic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $apic -> move($dir_name,$file_name);
            $apic_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            // 默认图片
            $apic_path = '/uploads/20181105/RMfi5nYG6RVUeqW4RyUf1541398259.jpg';
        }
        $advert = new Advert;
       
        // 获取数据
        $advert->name = $request->name;
        $advert->url = $request->url;
        $advert->apic = $apic_path;
        $advert->state = $request->state;
        

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
        
        return view('admin.advert.edit',['title'=>'广告修改','a'=>$a,'id'=>$id]);
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

         if($request -> hasFile('apic')){
            $apic = $request -> file('apic');
            $ext = $apic ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $apic -> move($dir_name,$file_name);
            $apic_path = ltrim($dir_name.'/'.$file_name,'.');
        }else {
           $a = Advert::find($id);
           $apic_path = $a->apic;
        }

        $advert = Advert::findOrFail($id);
        $advert->name = $request->name;
        $advert->url = $request->url;
        $advert->apic = $apic_path;
        $advert->state = $request->state;

        $res = $advert->save();
        if ($res) {
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
        $advert = Advert::find($id);
        if ($advert->delete()) {
        return redirect('admin/advert')->with('auccess','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
