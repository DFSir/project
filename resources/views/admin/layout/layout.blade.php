<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

	<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/page_page.css" />

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
			<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admins">后台管理</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/admins">H-ui</a> 
				<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.1</span> 
				<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="/admin/javascript:;">&#xe667;</a>
				
				<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
					<ul class="cl">
						<li>管理员</li>
						<li class="dropDown dropDown_hover">
							<a href="" class="dropDown_A">{{ session('name') }}<i class="Hui-iconfont">&#xe6d5;</i></a>
							<ul class="dropDown-menu menu radius box-shadow">
								<li><a href="/admin/logout">退出</a></li>
							</ul>
						</li>
						<li id="Hui-msg" class="dropDown right dropDown_hover"> 
							<a href="/admin/message" class="dropDown_A" title="留言"><i class="Hui-iconfont" style="font-size:18px">&#xe62f;</i></a>
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
						<li><a data-href="/admin/cates" data-title="类别列表" href="/admin/cates">类别列表</a></li>
						<li><a data-href="/admin/cates/create" data-title="添加类别" href="/admin/cates/create">添加类别</a></li>
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
						<li><a data-href="/admin/articles" data-title="类别列表" href="/admin/articles">文章列表</a></li>
						<li><a data-href="/admin/articles/create" data-title="添加类别" href="/admin/articles/create">添加文章</a></li>
					</ul>
				</dd>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe64b;</i> 标签管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/tag" data-title="标签列表" href="/admin/tag">标签列表</a></li>
						<li><a data-href="/admin/tag/create" data-title="添加标签" href="/admin/tag/create">添加标签</a></li>
					</ul>
				</dd>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe623;</i> 日记管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/diary/" data-title="日记列表" href="/admin/diary/">日记列表</a></li>
						<li><a data-href="/admin/diary/create" data-title="添加日记" href="/admin/diary/create">添加日记</a></li>
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
						<li><a data-href="/admin/album" data-title="相册列表" href="/admin/album">相册列表</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe666;</i> 友情链接管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/blogroll" data-title="友情列表" href="/admin/blogroll">友情链接列表</a></li>
						<li><a data-href="/admin/blogroll/create" data-title="友情链接" href="/admin/blogroll/create">添加友情链接</a></li>
					</ul>
				</dd>
			</dl>
			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe6ab;</i> 广告管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/advert" data-title="广告列表" href="/admin/advert">广告列表</a></li>
						<li><a data-href="/admin/advert/create" data-title="广告链接" href="/admin/advert/create">广告添加</a></li>
					</ul>
				</dd>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe612;</i> 轮播图管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a data-href="/admin/slide" data-title="轮播图列表" href="/admin/slide">轮播图列表</a></li>
					</ul>
				</dd>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe63b;</i> 
					<a data-href="/admin/opinion" data-title="收信箱" href="/admin/opinion" style="text-decoration:none;">收信箱</a>
				</dt>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe633;</i> 
					<a data-href="/admin/about" data-title="关于我" href="/admin/about" style="text-decoration:none;">关于我</a>
				</dt>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe62f;</i> 
					<a data-href="/admin/message" data-title="留言区" href="/admin/message" style="text-decoration:none;">留言区管理</a>
				</dt>
			</dl>

			<dl id="menu-admin">
				<dt>
					<i class="Hui-iconfont">&#xe62e;</i> 系统管理
					<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
				</dt>
				<dd>
					<ul>
						<li><a href="/admin/setting" data-title="配置" data-href="/admin/setting">配置</a></li>
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