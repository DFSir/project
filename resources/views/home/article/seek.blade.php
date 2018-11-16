@extends('home.layout.layout')
<!-- 文章搜索列表页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection

@section('picsbox')
<h1 class="t_nav"><span>您现在的位置是：首页 > 文章列表</span><a href="/" class="n1">首页</a><a href="/" class="n2">搜索结果</a></h1>
@endsection


@section('container')

<div class="blogsbox">
    @foreach ($artle as $k=>$v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
        <h3 class="blogtitle"><a href="/home/detail/{{ $v->aid }}" target="_blank">{{ $v->title }}</a></h3>
        <span class="blogpic"><a href="/home/detail/{{ $v->aid }}" title=""><img src="/home/images/toppic01.jpg" alt=""></a></span>
        <div style="width: 460px;height: 110px;margin-left: 240px;overflow: hidden;">{!! $v->acontent !!}</div>
        <div class="bloginfo">
            <ul>
                <li class="author"><a href="/home/detail/{{ $v->aid }}">{{ $v->author }}</a></li>
                <li class="lmname"><a href="/home/list/{{ $v->aid }}">{{ $v->catesinfo->cname }}</a></li>
                <li class="timer">{{ $v->created_at }}</li>
                <li class="view"><span>{{ $v->click }}</span>已阅读</li>
                <li class="like">{{ $v->like }}</li>
            </ul>
        </div>
    </div>
    @endforeach
</div>

@endsection
