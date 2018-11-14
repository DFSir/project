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
   <form action="" method="post">
    <br>
        <span style="font-size: 20px;margin-left: 30px;">头像：</span><img src="{{ $about->portrait }}" style="width: 80px;height: 80px;margin-left: 30px;"><br><input type="file" name="" value="" style="margin-left: 30px;"><br><br>
        <span style="font-size: 20px;margin-left: 30px;">用户名：</span><input type="text" name="" value="{{ $about->name }}" style="width: 300px;height: 30px;"><br><br>
        <span style="font-size: 20px;margin-left: 30px;">手机号：</span><input type="text" name="" value="" style="width: 300px;height: 30px;"><br><br>
        <span style="font-size: 20px;margin-left: 30px;">邮 &nbsp; 箱：</span><input type="text" name="" value="" style="width: 300px;height: 30px;"><br><br>
        <span style="font-size: 20px;margin-left: 30px;">性 &nbsp; 别： </span> <input type="radio" name="" value="1" >女 <input type="radio" name="" value="2">男 <input type="radio" name="" value="0" >保密<br><br>
        <input type="submit" name="" value="编辑" style="width:60px;height: 30px;background: #ccc;margin-left: 200px;font-size: 16px;border: 0px;border-radius: 6px;margin-bottom: 20px;">



   </form>
</div>
@endsection


@section('right')

<div class="sidebar">
    <div class="about">
        <p class="avatar"> <img src="{{ $about->portrait }}" alt=""> </p>
        <p class="abname">{{ $about->name }}</p>
        <p class="abposition">{{ $about->profession }}</p>
        <p class="abposition">QQ：{{ $about->qq }}</p>
        <p class="abposition">邮箱：{{ $about->name }}</p>
    </div>
    <div class="weixin">
        <h2 class="hometitle">微信关注</h2>
        <ul>
            <img src="/home/images/wx.jpg">
        </ul>
    </div>
</div>

@endsection