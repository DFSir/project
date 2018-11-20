<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>首页_个人博客</title>
  <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <script src="/home/layui/layui.all.js"></script>
  <link rel="stylesheet" href="/home/layui/css/layui.css" media="all">
  <script src="/home/layui/layui.all.js"></script>
  

</head>
<body style="background: url('/home/images/bj.jpg') no-repeat;background-size: 100% ;">
  </script>
     <!-- 读取提示信息开始 -->
    @if (session('success'))
        <script type="text/javascript">
            var layer = layui.layer
                 ,form = layui.form;


            layer.alert("{{ session('success') }}");           
        </script>;
    @endif
    @if (session('error'))
      <script type="text/javascript">
      var layer = layui.layer
         ,form = layui.form;
            layer.alert("{{ session('error') }}");         
        </script>;
    @endif
    <!-- 读取提示信息结束 -->


    <!-- 显示验证错误信息 开始 -->
    @if (count($errors) > 0)
    <div class="">
        <ul> 
        @foreach ($errors->all() as $k=>$v)
            <script type="text/javascript">
            var layer = layui.layer
                ,form = layui.form;
                if('{{ $k }}' == 0){
                    layer.alert('{{ $v }}')
                }                   
            </script>;
        @endforeach
       </ul>
    </div>
    @endif
    <!-- 显示验证错误信息 结束 -->
  
  <div class="container" style="width: 400px;height: 500px;" >
    <h1 class="f1" style="width: 341px;height: 124px;text-indent: -9999px;"></h1>
    <h1 class="text-white" style="color: #fff">欢迎您登录</h1>
    <form action="/home/dologin" method="post" >
      {{ csrf_field() }}
          
          <div class="form-group">
            <input type="text" placeholder="账号" class="form-control rounded input-lg text-center no-border" name="uaccnum" value="">
          </div>
          <div class="form-group">
             <input type="password" placeholder="登录密码" class="form-control rounded input-lg text-center no-border" name="upasswd" value="">
          </div>
           
         <button type="submit" class="btn btn-lg lt b-white b-2x btn-block btn-rounded">
            <i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">开始登录</span>
          </button>
           <div class="text-center" style="color:red;"><small></small></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small class="c-white">还没有账号？</small>
          <small class="c-white"><a href="/home/newpass">忘记密码？</a></small></p>
          <a href="/home/zhuce" class="btn btn-lg btn-info btn-block rounded">创建一个新账号</a>
        </form>
  </div>
</body>

</html>