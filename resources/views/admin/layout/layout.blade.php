<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="Bookmark" href="/admin//favicon.ico" >
	<link rel="Shortcut Icon" href="/admin//favicon.ico" />
	<!--[if lt IE 9]>
	<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
	<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
	<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
	<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
	<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/app.css">
    <script src="https://cdn.bootcss.com/holder/2.9.4/holder.min.js"></script>
	<!--[if IE 6]>
	<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
	<script>DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<title>H-ui.admin v3.1</title>
	<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
	<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
	<header class="navbar-wrapper">
		<div class="navbar navbar-fixed-top">
			<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admin//aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/admin//aboutHui.shtml">H-ui</a> 
				<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.1</span> 
				<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="/admin/javascript:;">&#xe667;</a>
				
				<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
					<ul class="cl">
						<li>超级管理员</li>
						<li class="dropDown dropDown_hover">
							<a href="/admin/#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
							<ul class="dropDown-menu menu radius box-shadow">
								<li><a href="/admin/javascript:;" onClick="myselfinfo()">个人信息</a></li>
								<li><a href="/admin/#">切换账户</a></li>
								<li><a href="/admin/#">退出</a></li>
							</ul>
						</li>
						<li id="Hui-msg"> 
							<a href="/admin/#" title="消息">
								<span class="badge badge-danger">1</span>
								<i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i>
							</a> 
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<aside class="Hui-aside">
		<div class="menu_dropdown bk_2">
			<!-- 左侧栏begin -->
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe62d;</i> 管理员管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/auser" data-title="管理员列表" href="/admin/auser">管理员列表</a></li>
						<li><a data-href="/admin/auser/create" data-title="添加管理员" href="/admin/auser/create">添加管理员</a></li>
					</ul>
				</dd>
			</dl>
			<!-- 左侧栏end -->

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe611;</i> 用户管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/huser" data-title="用户列表" href="/admin/huser">用户列表</a></li>
						<li><a data-href="/admin/huser/create" data-title="添加用户" href="/admin/huser/create">添加用户</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe61a;</i> 类别管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">类别列表</a></li>
						<li><a href="#">添加类别</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe616;</i> 文章管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">文章列表</a></li>
						<li><a href="#">添加文章</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe610;</i> 日记管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">日记列表</a></li>
						<li><a href="#">添加日记</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe613;</i> 相册管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">相册列表</a></li>
						<li><a href="#">添加相册</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe63a;</i> 友情链接管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">友情链接列表</a></li>
						<li><a href="#">添加友情链接</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe622;</i> 评论管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">文章评论列表</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe63b;</i> 
					<a data-title="收信箱" href="#">收信箱</a>
				</dt>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe62e;</i> 系统管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="#">待定</a></li>
						<li><a href="#">待定</a></li>
						<li><a href="#">待定</a></li>
					</ul>
				</dd>
			</dl>

		</div>
	</aside>

	<!-- 内容区begin -->
	<section class="Hui-article-box"  style=" overflow-y:auto; overflow-x:auto;">

		<!-- 显示提示消息 -->
		@if(session('success'))
		<div class="hint" style="width: 80%;height: 50px;margin: 10px auto;background: #dff0d8;line-height: 50px;border-radius: 30px;">
			<p style="margin-left: 50px;font-size: 20px;color: #555;"><i class="Hui-iconfont">&#xe615;</i>&nbsp&nbsp&nbsp{{session('success')}}</p>
		</div>
		@endif
		<!-- 显示提示消息 -->
		@if(session('error'))
		<div class="hint" style="width: 80%;height: 50px;margin: 10px auto;background: #f2dede;line-height: 50px;border-radius: 30px;">
			<p style="margin-left: 50px;font-size: 20px;color: #555;"><i class="Hui-iconfont">&#xe631;</i>&nbsp&nbsp&nbsp{{session('error')}}</p>
		</div>
		@endif
		
		@section('container')
			
		<div class="page-container">
			<p class="f-20 text-success">欢迎使用H-ui.admin <span class="f-14">v3.1</span>后台模版！</p>
			<table class="table table-border table-bordered table-bg mt-20">
				<thead>
					<tr>
						<th colspan="2" scope="col">服务器信息</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th width="30%">服务器计算机名</th>
						<td><span id="lbServerName">http://127.0.0.1/</span></td>
					</tr>
					<tr>
						<td>服务器IP地址</td>
						<td>192.168.1.1</td>
					</tr>
					<tr>
						<td>服务器域名</td>
						<td>www.h-ui.net</td>
					</tr>
					<tr>
						<td>服务器端口 </td>
						<td>80</td>
					</tr>
					<tr>
						<td>服务器IIS版本 </td>
						<td>Microsoft-IIS/6.0</td>
					</tr>
					<tr>
						<td>本文件所在文件夹 </td>
						<td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
					</tr>
					<tr>
						<td>服务器操作系统 </td>
						<td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
					</tr>
					<tr>
						<td>系统所在文件夹 </td>
						<td>C:\WINDOWS\system32</td>
					</tr>
					<tr>
						<td>服务器脚本超时时间 </td>
						<td>30000秒</td>
					</tr>
					<tr>
						<td>服务器的语言种类 </td>
						<td>Chinese (People's Republic of China)</td>
					</tr>
					<tr>
						<td>.NET Framework 版本 </td>
						<td>2.050727.3655</td>
					</tr>
					<tr>
						<td>服务器当前时间 </td>
						<td>2014-6-14 12:06:23</td>
					</tr>
					<tr>
						<td>服务器IE版本 </td>
						<td>6.0000</td>
					</tr>
					<tr>
						<td>服务器上次启动到现在已运行 </td>
						<td>7210分钟</td>
					</tr>
					<tr>
						<td>逻辑驱动器 </td>
						<td>C:\D:\</td>
					</tr>
					<tr>
						<td>CPU 总数 </td>
						<td>4</td>
					</tr>
					<tr>
						<td>CPU 类型 </td>
						<td>x86 Family 6 Model 42 Stepping 1, GenuineIntel</td>
					</tr>
					<tr>
						<td>虚拟内存 </td>
						<td>52480M</td>
					</tr>
					<tr>
						<td>当前程序占用内存 </td>
						<td>3.29M</td>
					</tr>
					<tr>
						<td>Asp.net所占内存 </td>
						<td>51.46M</td>
					</tr>
					<tr>
						<td>当前Session数量 </td>
						<td>8</td>
					</tr>
					<tr>
						<td>当前SessionID </td>
						<td>gznhpwmp34004345jz2q3l45</td>
					</tr>
					<tr>
						<td>当前系统用户名 </td>
						<td>NETWORK SERVICE</td>
					</tr>
				</tbody>
			</table>
		</div>
		<footer class="footer mt-20">
			<div class="container">
				<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
					Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
					本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
					<p>More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
			</div>
		</footer>

        @show
	</section>
	<!-- 内容区end -->

	<div class="contextMenu" id="Huiadminmenu">
		<ul>
			<li id="closethis">关闭当前 </li>
			<li id="closeall">关闭全部 </li>
		</ul>
	</div>
	<!--_footer 作为公共模版分离出去-->
	<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
	<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
	<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>
	<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
	<!--/_footer 作为公共模版分离出去-->

	<!--请在下方写此页面业务相关的脚本-->
	<script type="text/javascript" src="/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
	<script type="text/javascript">
		
		$('.hint').click(function(){
			$('.hint').hide();
		});
	</script> 


</body>
</html>