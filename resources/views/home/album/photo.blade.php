@extends('home.layout.layout')
<!-- 关于我页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">相册详情</a></h1>
@endsection


@section('container')

<div class="share">
  <ul>
  @foreach($photo as $k=>$v)
    <li> 
      <div class="shareli">
           <img src="{{ $v->picture }}" width="150px" height="150px"> 
      </div> 
    </li>
  @endforeach
  </ul>
</div>

@endsection

@section('right')
@endsection

