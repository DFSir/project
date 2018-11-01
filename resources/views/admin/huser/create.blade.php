@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

	<!-- 显示验证错误信息 start -->
	@if (count($errors) > 0)
		<hr>
	    <div class="hint " style="width: 50%;height: 20%;margin: 0px auto;background: #f2dede;border-radius: 30px;">
			
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<!-- 显示验证错误信息 end -->

	<article class="page-container">
		<h1>{{ $title or '' }}</h1>
		<form action="/admin/huser" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate">
			{{ csrf_field() }}
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>用户名：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" id="uname" name="uname">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>账号：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" id="uaccnum" name="uaccnum">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>密码：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="password" class="input-text" value="" id="upasswd" name="upasswd">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				
				
				
				<div class="row cl">
					<div class="col-xs-4 col-sm-2  col-sm-offset-1">
						<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;添加&nbsp;&nbsp;">
					</div>
				</div>
			
		</form>
	</article>
	
	<script type="text/javascript">
		var isUser = false;
		$('#uname').focus(function(){
			$('.spanll').eq(0).html('<font color="#ccc">请输入4-12位数字字母下划线组合,字母开头</font>');
		}).blur(function(){
			var user_preg = /^[a-zA-Z]{1}[\w]{7,16}$/;
            var user_vals = $('#uname').val();
            if(user_preg.test(user_vals)){
                isUser = true;
                $('.spanll').eq(0).html('<font color="#0f0">用户名格式正确</font>');
            }else{
                isUser = false;
                $('.spanll').eq(0).html('<font color="#f00">用户名格式错误</font>');
            }
		});


		$('form').submit(function(){
            if(isUser){
                return true;
            }
            return false;
        });
	</script>


@endsection