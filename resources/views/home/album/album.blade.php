@extends('home.layout.layout')
<!-- 关于我页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">相册</a></h1>
@endsection


@section('container')

<div class="share">
  <ul>
   @foreach($album as $k=>$v)
    <li> 
      <div class="shareli">
            <a href="/home/album/{{$v->alid}}" target="_blank"> <i><img src="images/text01.jpg"></i>
              <h2><b>{{ $v->alname }}</b></h2>
            </a> 
         </div> 
    </li>
    @endforeach
  </ul>
</div>

@endsection



