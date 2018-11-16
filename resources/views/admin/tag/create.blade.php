@extends('admin.layout.layout')
@section('container')

@if(count($errors) > 0)
	<div class="hint" style="width: 80%;height: 50px;margin: 10px auto;background: #f2dede;line-height: 50px;border-radius: 30px;">	
		<p style="margin-left: 50px;font-size: 20px;color: #555;">
			@foreach ($errors->all() as $error)
			<i class="Hui-iconfont">&#xe631;</i>&nbsp&nbsp&nbsp{{ $error }}
			@endforeach
		</p>
	</div>
@endif

	<h1>{{ $title }}</h1>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		 	<a href="/admin/tag" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
			        标签列表</a>
		    <a href="/admin/tag/create" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
        		添加标签</a>
		</span>
	</div>
	<article class="page-container">
	<form action="/admin/tag" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标签：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

@endsection