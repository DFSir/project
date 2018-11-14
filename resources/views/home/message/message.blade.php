@extends('home.layout.layout')
<!-- 留言页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>我喜欢网络，畅所欲言。我喜欢这里，无人束缚。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">留言区</a></h1>
@endsection


@section('container')

<div class="news_infos">
    @foreach ($message as $k=>$v)
    <div style="width: 100%;clear: both;">
        <div style="width: 10%;height: 80px;margin:3%;display:inline-block;float: left;border-radius: 50%;">
            <img src="{{ $v->usersinfo->upic }}" alt="" style="width: 100%;border-radius: 50%;">
        </div>
        <div style="width: 80%;margin:3% 1%;display:inline-block;float: left;">
            <span>{{ $v->usersinfo->uname }}</span>
            <span style="float: right;">{{ $v->created_at }}</span>
            <hr>
            <div style="margin-top: 10px;">{{ $v->mcontent }}</div>
        </div>
    </div>
    @endforeach
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
        <h2 class="hometitle">留 言</h2>
        @if(empty(session('Huser')))
        <textarea name="mcontent" placeholder="说点什么..." style="width: 100%;height: 60px;resize:none;" maxlength="50" ></textarea>
        <a href="{{ url('home/login') }}"><button type="submit" style="width: 100%;height: 40px;"><h2>登录后留言</h2></button></a>
        @else
        <form action="/home/message" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="uid" value="{{ session('Huser')->uid }}">
            <textarea name="mcontent" placeholder="说点什么..." style="width: 100%;height: 60px;resize:none;" maxlength="50" ></textarea>
            <button type="submit" style="width: 100%;height: 40px;"><h2>留 言</h2></button>
        </form>
        @endif
    </div>
</div>

@endsection