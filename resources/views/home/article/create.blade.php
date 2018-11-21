@extends('home.layout.layout')
<!-- 用户添加文章页面 -->
@section('head')
<div class="pagebg sh" style="margin-bottom: -60px;"></div>
@endsection


@section('picsbox')
<h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="#" class="n1">个人中心</a><a href="#" class="n2">添加文章</a></h1>
@endsection


@section('container')
<div class="infosbox">
    <div class="newsview">
        <h3 class="news_title">添加文章</h3>

        <div class="news_con">
            <!-- 显示提示消息 -->
            @if(count($errors) > 0)
                <div class="hint" style="width: 80%;margin: 10px auto;background: #f2dede;line-height: 30px;border-radius: 30px;">
                    @foreach ($errors->all() as $error)
                    <p style="margin-left: 20px;font-size: 15px;color: #555;">
                        &nbsp&nbsp&nbsp{{ $error }}
                    </p>
                    @endforeach
                </div>
            @endif
            <form action="/home/articles" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div style="margin-top: 10px;">
                    <span>文章类型：</span>
                    <span>
                        <select name="cid" id="" style="height: 30px;">
                            @foreach ($cates as $k=>$v)
                            <?php
                                $n = substr_count($v->cpath,',')-1;
                                if ($n<0){
                                    $n = 0;
                                }
                            ?>
                            <option value="{{ $v->cid }}" @if ($v->cpid == 0) disabled @endif>@if ($v->cpid != 0) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @endif|------- {{ $v->cname }}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
                
                <div style="margin-top: 10px;">
                    <span>文章标题：</span>
                    <span>
                        <input type="text" value="" name="title" style="height: 30px;">
                    </span>
                </div>
                <div style="margin-top: 10px;">
                    <span>文章标签：</span>
                    <span>
                        @foreach($tags as $k => $v)
                        <label style="font-size: 14px;font-weight: normal;margin-right: 10px;"><input type="checkbox" name="tag_id[]" value="{{$v->id}}">{{$v->name}}</label>
                        @endforeach
                    </span>
                </div>
                <div style="margin-top: 10px;">
                    <span>文章作者：</span>
                    <span>
                        <input type="text" value="" name="author" style="height: 30px;">
                    </span>
                </div>
                <div style="margin-top: 10px;">
                    <span>文章图片：</span>
                    <span>
                        <input type="file" value="" name="photo" style="height: 30px;">
                    </span>
                </div>
                <div style="margin-top: 10px;">
                    <span>文章内容：</span>
                    <span>
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="acontent" type="text/plain" class="formControls col-xs-8 col-sm-9" style="height: 500px;">
                            
                        </script>
                    </span>
                </div>
                <div style="margin-top: 10px;margin-bottom: 30px;">
                    <span>
                        <input type="submit" value="上传文章" style="height: 50px;width: 100%;font-size: 25px;">
                    </span>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{toolbars:[
            ['fullscreen', 'source', 'undo', 'redo','bold','italic','underline','strikethrough','indent','subscript','fontborder','superscript','horizontal','time','date','cleardoc','inserttable'],
            ['simpleupload','insertimage','link','emotion','spechars','justifyleft','justifyright','justifycenter','justifyjustify','forecolor','backcolor','imagenone','imageleft','imageright','imagecenter','autotypeset']
        ]});
</script>
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
        <a href="/home/articles/crea"><button type="submit" style="width: 48%;height: 40px;"><h2>上传文章</h2></button></a>
    </div>

</div>

@endsection