@extends('home.layout.layout')
<!-- 关于我页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">关于我</a></h1>
@endsection


@section('container')

<div class="news_infos">
    <ul>
        {!! $about->aboutme !!}
    </ul>
</div>

@endsection


@section('right')

<div class="sidebar">
    <div class="about">
        <p class="avatar"> <img src="{{ $about->portrait }}" alt=""> </p>
        <p class="abname">站长：{{ $about->name }}</p>
        <p class="abposition">{{ $about->profession }}</p>
        <p class="abposition">QQ：{{ $about->qq }}</p>
        <p class="abposition">邮箱：{{ $about->name }}</p>
    </div>
    <div class="weixin">
        <h2 class="hometitle">微信关注</h2>
        <ul>
            <img src="/home/images/weixin.jpg">
        </ul>
    </div>
</div>

@endsection