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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // echo 'aaa';
        $huser = Huser::find($id);
        return view('home.geren.edit',['huser'=>$huser]);
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

        $uname = $request->input('uname');
        $sex = $request->input('sex');
        $phone = $request->input('phone');
        $email = $request->input('email');

        // 把提交过来的数据放进指定数据表
        $res1 = Huser::where('uid','=',$id)->update(['uname'=>$uname]);
        $res2 = Detail::where('uid','=',$id)->update(['sex'=>$sex,'phone'=>$phone,'email'=>$email,'photo'=>$photo_path]);

        if ($res1 && $res2) {
            return $this->show($id);
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
    }
}
