@extends('home.layout.layout')
<!-- 文章列表页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>我喜欢网络，畅所欲言。我喜欢这里，无人束缚。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">留言区</a></h1>
@endsection


@section('container')

<div class="news_infos"> 

    <div class="fb">
        <ul>
            <p class="fbtime"><span>2018-10-23</span>爱的</p>
            <p class="fbinfo">阿萨大大</p>
        </ul>
    </div>

    <div class="gbox" style="width: 90%;height: 400px;margin:auto;background: #ddd;">
        
    </div>
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