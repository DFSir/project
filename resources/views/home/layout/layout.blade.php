<!doctype html>
<html>
<head>
<meta charset="gbk">
<link rel="icon" type="/home/image/x-icon"/>
    <title>{{ $setting->title }}</title>
    <meta name="keywords" content="个人博客,杨青个人博客,个人博客模板,杨青" />
    <meta name="description" content="杨青个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/home/css/base.css" rel="stylesheet">
    <link href="/home/css/index.css" rel="stylesheet">
    <link href="/home/css/m.css" rel="stylesheet">
    <script src="/home/js/jquery.min.js" type="text/javascript"></script>
    <script src="/home/js/jquery.easyfader.min.js"></script>
    <script src="/home/js/scrollReveal.js"></script>
    <script src="/home/js/common.js"></script>

</head>
<body>
    <header> 
        <!--menu begin-->
        <div class="menu">
            <nav class="nav" id="topnav">

                <h1 class="logo" style="margin: 10px auto;"><img src="{{ $setting->logo }}" width="150px" height="60px"></h1>

                <li><a href="/">网站首页</a> </li>
                <li><a href="/home/aboutme">关于我</a> </li>
                @foreach ($cates as $k=>$v)
                <li>@if ($v->cpid == 0)<a href="#">{{ $v->cname }}</a>@endif
                    <ul class="sub-nav">
                        @foreach ($cates as $ke=>$ve)
                        @if ($v->cid == $ve->cpid)
                        <li><a href="/home/list/{{ $ve->cid }}">{{ $ve->cname }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
                <li><a href="/home/diary">日记</a> </li>
                <li><a href="/home/album">相册</a> </li>
                <li><a href="/home/message">留言</a> </li>
                <!--search begin-->
                <div id="search_bar" class="search_bar">
                    <form  id="searchform" action="/home/seek" method="get">
                        <input class="input" placeholder="想搜点什么呢..." type="text" name="title" id="keyboard">
                        <input type="hidden" name="Submit" value="搜索" />
                        <span class="search_ico"></span>
                    </form>
                </div>
                <!--search end--> 
                <li>
                    <div class="menu-hd">
                        @if(empty(session('Huser')))
                            <a href="{{ url('/home/login') }}" target="_top" >登录/注册</a>
                        @else
                            <a href="/home/geren/{{ session('Huser')->uid }}" style="color: #fff;">{{ session('Huser')->uname }}</a>
                            <a href="{{ url('/home/logout') }}">退出</a>
                        @endif
                    </div>           
                </li>
            </nav>
            
        </div>
        <!--menu end--> 
        
    </header>
    
    @section('head')

    @show

    <article>
        @section('picsbox')
        <!--banner begin-->
        <div class="picsbox"> 
            <div class="banner">
                <div id="banner" class="fader">
                    @foreach ($slides as $k=>$v)
                    <li class="slide" >
                        <a href="/home/detail/{{ $v->aid }}" target="_blank">
                            <img src="{{ $v->slide }}">
                            <span class="imginfo">{{ $v->describe }}</span>
                        </a>
                    </li>
                    @endforeach
                    <div class="fader_controls">
                        <div class="page prev" data-target="prev">&lsaquo;</div>
                        <div class="page next" data-target="next">&rsaquo;</div>
                        <ul class="pager_list">
                        </ul>
                    </div>
                </div>
            </div>

            <div class="toppic">
                <li> <a href="/home/detail/{{ $recommend[0]->aid }}" target="_blank"> <i><img src="{{ $recommend[0]->photo }}"></i>
                    <h2>{{ $recommend[0]->title }}</h2>
                    <span>学无止境</span> </a> </li>
                <li> <a href="/home/detail/{{ $like[0]->aid }}" target="_blank"> <i><img src="{{ $like[0]->photo }}"></i>
                    <h2>{{ $like[0]->title }}</h2>
                    <span>学无止境</span> </a> </li>
            </div>
        </div>
        <!--banner end-->
        @show

        
        <div class="blank"></div>

        @section('container')
        <!--blogsbox begin-->
        <div class="blogsbox">
            @foreach ($articles as $k=>$v)
            <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
                <h3 class="blogtitle"><a href="/home/detail/{{ $v->aid }}" target="_blank">{{ $v->title }}</a></h3>
                <span class="blogpic"><a href="/home/detail/{{ $v->aid }}" title=""><img src="{{ $v->photo }}" alt="" style="width: 214px;height: 125px;"></a></span>
                <div style="width: 460px;height: 110px;margin-left: 240px;overflow: hidden;">{!! $v->acontent !!}</div>
                <div class="bloginfo">
                    <ul>
                        <li class="author"><a href="/home/detail/{{ $v->aid }}">{{ $v->author }}</a></li>
                        <li class="lmname"><a href="/home/list/{{ $v->cid }}">{{ $v->catesinfo->cname }}</a></li>
                        <li class="timer">{{ $v->created_at }}</li>
                        <li class="view"><span>{{ $v->click }}</span>已阅读</li>
                        <li class="like">{{ $v->like }}</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <!--blogsbox end-->
        @show
        
        @section('right')
        <div class="sidebar">

            <div class="tuijian">
                <h2 class="hometitle">推荐文章</h2>
                <ul class="tjpic">
                    <i><a href="/home/detail/{{ $recommend[0]->aid }}"><img src="{{ $recommend[0]->photo }}" style="width: 305px;height: 178px;"></a></i>
                    <p><a href="/home/detail/{{ $recommend[0]->aid }}">{{ $recommend[0]->title }}</a></p>
                </ul>
                <ul class="sidenews">
                    @foreach ($recommend as $k=>$v)
                    @if ($k > 0)
                    <li> <i><a href="/home/detail/{{ $v->aid }}" style="width: 130px;"><img src="{{ $v->photo }}" style="width: 130px;height: 75px;"></a></i>
                        <p><a href="/home/detail/{{ $v->aid }}">{{ $v->title }}</a></p>
                        <span>{{ $v->created_at }}</span> </li>
                    @endif
                    @endforeach
                </ul>
            </div>


            <div class="tuijian">
                <h2 class="hometitle">点赞排行</h2>
                <ul class="tjpic">
                    <i><a href="/home/detail/{{ $like[0]->aid }}"><img src="{{ $like[0]->photo }}" style="width: 305px;height: 178px;"></a></i>
                    <p><a href="/home/detail/{{ $like[0]->aid }}">{{ $like[0]->title }}</a></p>
                </ul>
                <ul class="sidenews">
                    @foreach ($like as $k=>$v)
                    @if ($k > 0)
                    <li> <i><a href="/home/detail/{{ $v->aid }}" style="width: 130px;"><img src="{{ $v->photo }}" style="width: 130px;height: 75px;"></a></i>
                        <p><a href="/home/detail/{{ $v->aid }}">{{ $v->title }}</a></p>
                        <span>{{ $v->created_at }}</span> </li>
                    @endif
                    @endforeach
                </ul>
            </div>


            <div class="cloud">
                <h2 class="hometitle">标签云</h2>
                <ul>
                    @foreach ($tag as $k=>$v)
                    <a href="/home/tags/{{ $v->id }}">{{ $v->name }}</a> 
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
                <h2 class="hometitle"> 广告赞助！</h2>
                
                @foreach ($advert as $k=>$v)
                <a href="https://{{ $v->url }}"><img src="{{ $v->apic }}" width="305px" height="80px" style="margin-bottom: 5px;" title="{{ $v->name }}"></a>
                @endforeach
                
            </div>
        </div>
        @show
    </article>
    <footer>
      <p>Design by {{ $setting->banquan }}</p>
      <p><a href="/home/yijian/create">我有意见</a></p>
    </footer>
    <a href="" class="cd-top">Top</a>
</body>
</html>
