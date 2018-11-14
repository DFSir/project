@extends('home.layout.layout')
<!-- 关于我页面 -->
@section('head')
<div class="pagebg timer"> </div>
@endsection

@section('picsbox')
 <h1 class="t_nav"><span>时光飞逝，机会就在我们眼前，何时找到了灵感，就要把握机遇，我们需要智慧和勇气去把握机会。</span><a href="/" class="n1">首页</a><a href="/" class="n2">日记</a></h1>
@endsection

@section('container')

  <div  class="container">
    <div class="timebox">
      <ul>
        @foreach($diary as $k=>$v)
          <li><span>{{substr($v->created_at,0,10)}}</span><a href="/">{{ $v->dcontent }}</a></li>
        @endforeach
      </ul>
      <ul id="list2">
  </ul>
     <script src="js/page2.js"></script> 
    </div>
  </div>

@endsection

@section('right')

@endsection



