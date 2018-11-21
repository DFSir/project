@extends('home.layout.layout')
<!-- 文章详情页面 -->
@section('head')
<div class="pagebg timer" style="margin-bottom: -60px;"> </div>
@endsection


@section('picsbox')
    <h1 class="t_nav"><span>您现在的位置是：个人中心 > 未过审文章</span><a href="/" class="n1">个人中心</a><a href="/" class="n2">我的文章</a></h1>
@endsection


@section('container')

    <div class="infosbox" style="padding-bottom: 30px;">
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
    		        <li class="view">未过审</li>
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
                <a href="/home/articles/{{ $artle->aid }}/edit"> 修改文章 </a>
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

</div>
@endsection