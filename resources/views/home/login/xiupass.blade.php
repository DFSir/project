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
  
  <div class="container" style="width: 400px;height: 500px;" >
    <h1 class="f1" style="width: 341px;height: 124px;text-indent: -9999px;"></h1>
    <h1 class="text-white" style="color: #fff">修改密码</h1>
    <form action="/home/gaipass" method="get" >
      {{ csrf_field() }}
          
          <div class="form-group">
            @foreach($mima as $k=>$v) 
            <input type="hidden" class="form-control rounded input-lg text-center no-border" name="uaccnum" value='{{$v->uaccnum}}'>
            @endforeach
            <input type="password" placeholder="新密码" class="form-control rounded input-lg text-center no-border" name="passwd" value="">
           
          </div>
          <div class="form-group">
            <input type="password" placeholder="确认新密码" class="form-control rounded input-lg text-center no-border" name="repassword" value="">
          </div>
          
          <input type="submit" name="" class="btn btn-lg lt b-white b-2x btn-block btn-rounded" value="确认修改">
           
    </form>
  </div>
</body>

</html>