@extends('home.layout.layout')
<!-- 个人中心页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">个人中心</a></h1>
@endsection


@section('container')
<div class="news_infos" style="background: #eee">
   <form action="" method="post">
    {{ csrf_field() }}
    <br>
        <span style="font-size: 20px;margin-left: 60px;">头像：<img src="{{ $user->huserinfo->photo or '/uploads/20181105/Tx2xIC7znYWXIL3KqZQY1541389322.jpg' }}" style="width: 80px;height: 80px;margin-left: 120px;"></span>
        <br>
        

        <span style="font-size: 20px;margin-left: 60px;">用户名：</span>&nbsp;&nbsp;<span>{{ $user->uname }}</span>
        <br><br>

         <span style="font-size: 20px;margin-left: 60px;">性 &nbsp; 别： </span>&nbsp;&nbsp; 
         <span> @if ($user->huserinfo->sex == 'w') 女
                @elseif ($user->huserinfo->sex == 'm') 男
                @else  保密
                @endif  

        </span>
         <br><br>

        <span style="font-size: 20px;margin-left: 60px;">手机号：</span>&nbsp;&nbsp;
        <span>{{ $user->huserinfo->phone }}</span><br><br>

        <span style="font-size: 20px;margin-left: 60px;">邮 &nbsp; 箱：</span> 
       &nbsp;&nbsp;<span>{{ $user->huserinfo->email }}</span><br><br>
    </form>
        <a href="/home/geren/{{$user->uid}}/edit"><button style="width:60px;height: 30px;background: #ccc;margin-left: 150px;font-size: 16px;border: 0px;border-radius: 6px;margin-bottom: 20px;">编辑</button></a>
        


   
</div>
@endsection


@section('right')

<div class="sidebar">
    <div class="about">
        <p class="avatar"> <img src="{{ $user->huserinfo->photo }}" alt=""> </p>
        <p class="abname">用户名:{{ $user->uname }}</p>
        <p class="abposition">性别: @if ($user->huserinfo->sex == 'w') 女
                                    @elseif ($user->huserinfo->sex == 'm') 男
                                    @else  保密
                                    @endif

        </p>
        <p class="abposition">手机号：{{ $user->huserinfo->phone }}</p>
        <p class="abposition"> 邮  箱 ：{{ $user->huserinfo->email }}</p>
    </div>
    <div class="weixin">
        <h2 class="hometitle">发布文章</h2>
        <a href="/home/articles"><button type="submit" style="width: 48%;height: 40px;"><h2>我的文章</h2></button></a>
        <a href="/home/articles/create"><button type="submit" style="width: 48%;height: 40px;"><h2>上传文章</h2></button></a>
    </div>
    <div class="weixin">
        <h2 class="hometitle">微信关注</h2>
        <ul>
            <img src="/home/images/wx.jpg">
        </ul>
    </div>
</div>

@endsection