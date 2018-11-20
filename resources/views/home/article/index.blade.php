@extends('home.layout.layout')
<!-- 用户个人文章列表页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>您现在的位置是：首页 > 我的文章</span><a href="/" class="n1">个人中心</a><a href="/" class="n2">我的文章</a></h1>
@endsection


@section('container')

<div class="blogsbox">
    @foreach ($artle as $k=>$v)
    @if ( $v->astate == 11)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
        <h3 class="blogtitle">
            <a href="/home/detail/{{ $v->aid }}" target="_blank">{{ $v->title }}</a>
        </h3>
        <span class="blogpic">
            <a href="/home/detail/{{ $v->aid }}" title="">
                <img src="{{ $v->photo }}" alt="" style="width: 305px;height: 178px;">
            </a>
        </span>
        <div style="width: 460px;height: 110px;margin-left: 240px;overflow: hidden;">{!! $v->acontent !!}</div>
        <div class="bloginfo">
            <ul>
                <li class="author"><a href="/home/detail/{{ $v->aid }}">{{ $v->author }}</a></li>
                <li class="lmname"><a href="/home/list/{{ $v->cid }}">{{ $v->catesinfo->cname }}</a></li>
                <li class="timer">{{ $v->created_at }}</li>
                <li class="view"><span>{{ $v->click }}</span>已阅读</li>
                <li class="like">{{ $v->like }}</li>
                <form action="/home/articles/{{ $v->aid }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('确定要删除吗?')">删除文章</button>
                </form>
            </ul>
        </div>
    </div>
    @else
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
        <h3 class="blogtitle">
            <a href="/home/articles/{{ $v->aid }}" target="_blank">{{ $v->title }}</a>
        </h3>
        <span class="blogpic">
            <a href="/home/articles/{{ $v->aid }}" title="">
                <img src="{{ $v->photo }}" alt="" style="width: 305px;height: 178px;">
            </a>
        </span>
        <div style="width: 460px;height: 110px;margin-left: 240px;overflow: hidden;">{!! $v->acontent !!}</div>
        <div class="bloginfo">
            <ul>
                <li class="author"><a href="/home/articles/{{ $v->aid }}">{{ $v->author }}</a></li>
                <li class="lmname"><a href="/home/list/{{ $v->cid }}">{{ $v->catesinfo->cname }}</a></li>
                <li class="timer">{{ $v->created_at }}</li>
                <li>未过审</li>
                <form action="/home/articles/{{ $v->aid }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('确定要删除吗?')">删除文章</button>
                </form>
            </ul>
        </div>
    </div>
    @endif
    @endforeach
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