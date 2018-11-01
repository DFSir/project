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
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" placeholder="" id="uname" name="uname"><span></span>
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" placeholder="" id="uaccnum" name="uaccnum">
					</div>
				</div>
				
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="password" class="input-text" value="" placeholder="" id="upasswd" name="upasswd">
					</div>
				</div>
				
				
				
				<div class="row cl">
					<div class="col-xs-4 col-sm-4 col-xs-offset-4 col-sm-offset-3">
						<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;添加&nbsp;&nbsp;">
					</div>
				</div>
			
		</form>
	</article>



@endsection