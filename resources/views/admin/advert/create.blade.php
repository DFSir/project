@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

	

	<article class="page-container">
		<h1>{{ $title or '' }}</h1>
		<div class="cl pd-5 bg-1 bk-gray mt-20">
		    <span class="l">
		    	<a href="/admin/advert" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
		        广告列表</a>
		        <a href="/admin/advert/create" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
        		添加广告</a>
		    </span>
		</div>
		<form action="/admin/advert" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate"  enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告名称：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" id="name" name="name">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告URL：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" id="url" name="url">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告图片：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="file" name="apic">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="radio" checked value="0" id="state0" name="state">禁用&nbsp;&nbsp;
						<input type="radio" value="1" id="stateq" name="state">开启
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				
				<div class="row cl">
					<div class="col-xs-4 col-sm-2  col-sm-offset-3">
						<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;添加&nbsp;&nbsp;">
					</div>
				</div>
			
		</form>
	</article>
	


@endsection