@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

	

	<article class="page-container">
		<h1>{{ $title or '' }}</h1>
		<div class="cl pd-5 bg-1 bk-gray mt-20">
		    <span class="l">
		    	<a href="/admin/blogroll" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
		        友情链接列表</a>
		        <a href="/admin/blogroll/create" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
        		添加友情链接</a>
		    </span>
		</div>
		<form action="/admin/blogroll" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate">
			{{ csrf_field() }}
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>链接名称：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" id="name" name="name">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>链接URL：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="" id="url" name="url">
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