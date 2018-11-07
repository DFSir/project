@extends('home.layout.layout')
<!-- 文章详情页面 -->
@section('head')
<div class="pagebg timer" style="margin-bottom: -60px;"> </div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>您现在的位置是：首页 > {{ $kname->cname }} > {{ $cname->cname }} > 文章详情</span><a href="/" class="n1">{{ $kname->cname }}</a><a href="/" class="n2">{{ $cname->cname }}</a></h1>
@endsection


@section('container')

<div class="infosbox">
    <div class="newsview">
		<h3 class="news_title">{{ $artle->title }}</h3>
	    <div class="bloginfo">
	        <ul>
				@if ($artle->uid == 0)
					<li>发布人:<span style="color: red;">管理员</span></li>
				@else
					<li>发布人:{{ $artle->userinfo->uname }}</li>
				@endif
		        <li class="author"><a href="/">{{ $artle->author }}</a></li>
		        <li class="lmname"><a href="/">{{ $artle->catesinfo->cname }}</a></li>
		        <li class="timer">{{ $artle->created_at }}</li>
		        <li class="view">{{ $artle->click }}已阅读</li>
		        <li class="like">{{ $artle->like }}</li>
	        </ul>
	    </div>
	    <div class="tags"><a href="/" target="_blank">个人博客</a> &nbsp; <a href="/" target="_blank">小世界</a></div>
	    <div class="news_con">
	      	{!! $artle->acontent !!}
	    </div>
    </div>


    <div class="share">
	    <p class="diggit">
	      	<a href="/home/like/{{ $artle->aid }}"> 很赞哦！ </a>(<b id="diggnum"><script type="text/javascript" src="/e/public/ViewClick/?classid=2&amp;id=20&amp;down=5"></script>{{ $artle->like }}</b>)
	    </p>
      	<p class="dasbox">
      		<a href="javascript:void(0)" onclick="dashangToggle()" class="dashang" title="打赏，支持一下">打赏本站</a>
      	</p>
    	<div class="hide_box"></div>
		<div class="shang_box"> 
			<a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭">关闭</a>
        	<div class="shang_tit">
        		<p>感谢您的支持，我会继续努力的!</p>
        	</div>
        	<div class="shang_payimg"> <img src="/home/images/alipayimg.jpg" alt="扫码支持" title="扫一扫"> </div>
        	<div class="pay_explain">扫码打赏，你说多少就多少</div>
        	<div class="shang_payselect">
          		<div class="pay_item checked" data-id="alipay"> 
          			<span class="radiobox"></span> <span class="pay_logo"><img src="/home/images/alipay.jpg" alt="支付宝"></span> 
          		</div>
          		<div class="pay_item" data-id="weipay"> 
          			<span class="radiobox"></span> <span class="pay_logo"><img src="/home/images/wechat.jpg" alt="微信"></span> 
          		</div>
        	</div>
	        <script type="text/javascript">
			    $(function(){
			    	$(".pay_item").click(function(){
			    		$(this).addClass('checked').siblings('.pay_item').removeClass('checked');
			    		var dataid=$(this).attr('data-id');
			    		$(".shang_payimg img").attr("src","/home/images/"+dataid+"img.jpg");
			    		$("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
			    	});
			    });
			    function dashangToggle(){
			    	$(".hide_box").fadeToggle();
			    	$(".shang_box").fadeToggle();
			    }
	    	</script> 
		</div>
    </div>
    <div class="nextinfo">
	    <p>列表页：<a href="/home/list/{{ $cname->cid }}">返回列表</a></p>
    </div>

    <div class="news_pl">
	    <h2>文章评论</h2>
	    <ul>
	        <div class="gbko">
				评论还没开始做呢
	        </div>
	    </ul>
    </div>
  </div>

@endsection