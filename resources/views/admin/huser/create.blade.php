@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

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

	<article class="page-container">
		<h1>{{ $title or '' }}</h1>
		<div class="cl pd-5 bg-1 bk-gray mt-20">
			<span class="l">
			 	<a href="/admin/huser" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
			        用户列表</a>
			    <a href="/admin/huser/create" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
        		添加用户</a>
			</span>
		</div>
		<form action="/admin/huser" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate" enctype="multipart/form-data">
			{{ csrf_field() }}
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>用户名：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" placeholder="请输入8-16位数字字母下划线组合,字母开头" id="uname" name="uname" value="{{ old('uname') }}">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>账号：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" placeholder="请输入6-18位数字" id="uaccnum" name="uaccnum" value="{{ old('uaccnum') }}">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				
				
				
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-1"><span class="c-red">*</span>密码：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="password" class="input-text" value="" placeholder="请输入6-8位密码" id="upasswd" name="upasswd">
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

@endsection