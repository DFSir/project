@extends('home.layout.layout')
<!-- 关于我页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">个人中心</a></h1>
@endsection


@section('container')
<div class="news_infos">
   <form action="/home/geren/{{ $huser->uid }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <br>
        <span style="font-size: 20px;margin-left: 30px;">头像：</span>
        <img src="{{ $huser->huserinfo->photo }}" style="width: 80px;height: 80px;margin-left: 30px;"><br>
        <input type="file" name="photo" value="{{ $huser->huserinfo->photo }}" style="margin-left: 30px;"><br><br>

        <span style="font-size: 20px;margin-left: 30px;">用户名：</span>
        <input type="text" name="uname" value="{{ $huser->uname }}" style="width: 300px;height: 30px;border: 0px;"><br><br>

         <span style="font-size: 20px;margin-left: 30px;">性 &nbsp; 别： </span> 
         <input type="radio" name="sex" value="w" @if ($huser->huserinfo->sex == 'w') checked @endif>女 
         <input type="radio" name="sex" value="m" @if ($huser->huserinfo->sex == 'm') checked @endif>男 
         <input type="radio" name="sex" value="x" @if ($huser->huserinfo->sex == 'x') checked @endif>保密
         <br><br>

        <span style="font-size: 20px;margin-left: 30px;">手机号：</span>
        <input type="text" name="phone" value="{{ $huser->huserinfo->phone }}" style="width: 300px;height: 30px;"><br><br>

        <span style="font-size: 20px;margin-left: 30px;">邮 &nbsp; 箱：</span>
        <input type="text" name="email" value="{{ $huser->huserinfo->email }}" style="width: 300px;height: 30px;"><br><br>
    
       
        <button></button>
        <input type="submit" name="" value="提交" style="width:60px;height: 30px;background: #ccc;margin-left: 200px;font-size: 16px;border: 0px;border-radius: 6px;margin-bottom: 20px;">



   </form>
</div>
@endsection


@section('right')

<div class="sidebar">
    <div class="about">
        <p class="avatar"> <img src="{{ $huser->huserinfo->photo }}" alt=""> </p>
        <p class="abname">用户名:{{ $huser->uname }}</p>
        <p class="abposition">性别: @if($huser->huserinfo->sex == 'w') 女
                                    @elseif($huser->huserinfo->sex == 'm')男
                                    @else 保密
                                    @endif

        </p>
        <p class="abposition">手机号：{{ $huser->huserinfo->phone }}</p>
        <p class="abposition"> 邮  箱 ：{{ $huser->huserinfo->email }}</p>
    </div>
    <div class="weixin">
        <h2 class="hometitle">微信关注</h2>
        <ul>
            <img src="/home/images/weixin.jpg">
        </ul>
    </div>
</div>

@endsection