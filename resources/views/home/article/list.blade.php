@extends('home.layout.layout')
<!-- 关于我修改页面 -->
@section('picsbox')

@endsection


@section('container')

<div class="blogsbox">
    @foreach ($artle as $k=>$v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
        <h3 class="blogtitle"><a href="" target="_blank">{{ $v->title }}</a></h3>
        <span class="blogpic"><a href="" title=""><img src="/home/images/toppic01.jpg" alt=""></a></span>
        <div style="width: 460px;height: 110px;margin-left: 240px;overflow: hidden;">{!! $v->acontent !!}</div>
        <div class="bloginfo">
            <ul>
                <li class="author"><a href="">{{ $v->author }}</a></li>
                <li class="lmname"><a href="">{{ $v->catesinfo->cname }}</a></li>
                <li class="timer">{{ $v->updated_at }}</li>
                <li class="view"><span>34567</span>已阅读</li>
                <li class="like">{{ $v->like }}</li>
            </ul>
        </div>
    </div>
    @endforeach
</div>

@endsection