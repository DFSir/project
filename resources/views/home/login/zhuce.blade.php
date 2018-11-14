<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>首页_个人博客</title>
  <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body style="background: url('/home/images/bj.jpg') no-repeat;background-size: 100% ;">
  <!-- 显示验证错误信息 start -->
  @if (count($errors) > 0)
    <hr>
      <div class="hint " style="width: 80%;height: 50px;margin: 10px auto;background: #f2dede;line-height: 50px;border-radius: 30px;">
      
          <p style="margin-left: 50px;font-size: 20px;color: #555;">
              @foreach ($errors->all() as $error)
                  <i class="Hui-iconfont">&#xe631;</i>{{ $error }}
              @endforeach
          </p>
      </div>
  @endif

  <!-- 显示验证错误信息 end -->
  
  <div class="container" style="width: 500px;height: 500px;" >
    <h1 class="f1" style="width: 341px;height: 124px;text-indent: -9999px;"></h1>
    <h1 class="text-white" style="color: #fff">欢迎您注册</h1>
    <form action="/home/store" method="post">
      {{ csrf_field() }}
          <div class="form-group">
            <input placeholder="用户名(中文、英文、数字包括下划线2-20位)" class="form-control rounded input-lg text-center no-border" name="uname" value="">
          </div>
          <div class="form-group">
            <input type="text" placeholder="账号(6-18位数字、字母)" class="form-control rounded input-lg text-center no-border" name="uaccnum" value="">
          </div>
          
          <div class="form-group">
             <input type="password" placeholder="登录密码(6-18位数字、字母)" class="form-control rounded input-lg text-center no-border" name="upasswd" value="">
          </div>
           <div class="form-group">
             <input type="password" placeholder="确认登录密码" class="form-control rounded input-lg text-center no-border" name="repassword" value="">
          </div>
          <button type="submit" class="btn btn-lg lt b-white b-2x btn-block btn-rounded">
            <i class="icon-arrow-right pull-right"></i>
            <span class="m-r-n-lg">开始注册</span>
          </button>
          <div class="text-center" style="color:red;"><small></small></div>
          <div class="line line-dashed"></div>

          <p class="text-muted text-center"><a class="c-white">已经有账户？</a></p>
          <a href="/home/login" class="btn btn-lg btn-info btn-block btn-rounded">直接去登录</a>
        </form>
  </div>
</body>

</html>