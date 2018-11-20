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
    	    <div class="tags">
    	    	@foreach($artle->tags as $k=>$v)
    	    		<a href="/" target="_blank">{{ $v->name }}</a>
    	    	@endforeach
    	    </div>
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
            @if (session('Huser'))
            @if (session('Huser')->uid == $artle->uid)
            <p class="dasbox">
                <a href="/home/articles/{{ $artle->aid }}/edit"> 修改文章 </a>
            </p>
            @endif
            @endif
        	<div class="hide_box"></div>
    		<div class="shang_box"> 
    			<a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭">关闭</a>
            	<div class="shang_tit">
            		<p>感谢您的支持，我会继续努力的!</p>
            	</div>
            	<div class="shang_payimg"> <img src="/home/images/alipayimg.png" alt="扫码支持" title="扫一扫"> </div>
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
    			    		$(".shang_payimg img").attr("src","/home/images/"+dataid+"img.png");
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
    			@foreach ($comment as $k=>$v)
    	        <div style="width: 100%;clear: both;">
    		        <div style="width: 10%;height: 80px;margin:3%;display:inline-block;float: left;border-radius: 50%;">
    		            <img src="{{ $v->hucominfo->photo }}" alt="" style="width: 100%;border-radius: 50%;">
    		        </div>
    		        <div style="width: 80%;margin:3% 1%;display:inline-block;float: left;">
    		            <span>{{ $v->ucominfo->uname }}</span>
    		            <span style="float: right;">{{ $v->created_at }}</span>
    		            <hr>
    		            <div style="margin-top: 10px;">{{ $v->comment }}</div>
    		        </div>
    		    </div>
    		    @endforeach
    	    </ul>
        </div>
    </div>

@endsection



@section('right')
    <div class="sidebar">

        <div class="tuijian">
            <h2 class="hometitle">推荐文章</h2>
            <ul class="tjpic">
                <i><a href="/home/detail/{{ $recommend[0]->aid }}"><img src="{{ $recommend[0]->photo }}"></a></i>
                <p><a href="/home/detail/{{ $recommend[0]->aid }}">{{ $recommend[0]->title }}</a></p>
            </ul>
            <ul class="sidenews">
                @foreach ($recommend as $k=>$v)
                @if ($k > 0)
                <li> <i><a href="/home/detail/{{ $v->aid }}"><img src="{{ $v->photo }}"></a></i>
                    <p><a href="/home/detail/{{ $v->aid }}">{{ $v->title }}</a></p>
                    <span>{{ $v->created_at }}</span> </li>
                @endif
                @endforeach
            </ul>
        </div>


        <div class="weixin">
            <h2 class="hometitle">评 论</h2>
            @if(empty(session('Huser')))
            <textarea name="comment" placeholder="说点什么..." style="width: 100%;height: 60px;resize:none;" maxlength="50" ></textarea>
            <a href="{{ url('home/login') }}"><button type="submit" style="width: 40%;height: 30px;float: right;margin-bottom: 20px;">登录后评论</button></a>
            @else
            <form action="/home/comment" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="uid" value="{{ session('Huser')->uid }}">
                <input type="hidden" name="aid" value="{{ $artle->aid }}">
                <textarea name="comment" placeholder="说点什么..." style="width: 100%;height: 60px;resize:none;" maxlength="50" ></textarea>
                <button type="submit" style="width: 25%;height: 30px;float: right;margin-bottom: 20px;">评 论</button>
            </form>
            @endif
        </div>



        <div class="cloud">
            <h2 class="hometitle">标签云</h2>
            <ul>
                @foreach ($tag as $k=>$v)
                <a href="">{{ $v->name }}</a> 
                @endforeach
            </ul>
        </div>


        <div class="links">
            <h2 class="hometitle">友情链接</h2>
            <ul>
                @foreach ($blog as $k=>$v)
                <li><a href="https://{{ $v->url }}" target="_blank">{{ $v->name }}</a></li>
                @endforeach
            </ul>
        </div>


        <div class="guanzhu" id="follow-us">
            <h2 class="hometitle"> 么么哒！</h2>
            
            @foreach ($advert as $k=>$v)
            <a href="https://{{ $v->url }}"><img src="{{ $v->apic }}" width="305px" height="80px" style="margin-bottom: 5px;" title="{{ $v->name }}"></a>
            @endforeach
            <ul>
                <li class="wx"><img src="/home/images/weixin.jpg" title="想联系我们可以添加微信哦!!!" style="margin-top: 10px;"></li>

            </ul>
        </div>
    </div>
@endsection