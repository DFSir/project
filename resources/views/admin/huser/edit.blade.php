@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')


	<article class="page-container">
		<h1>{{ $title or '' }}</h1>
		<form action="/admin/huser/{{$id}}" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="{{ $a->uname }}" placeholder="" id="uname" name="uname"><span></span>
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账号：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="{{ $a->uaccnum }}" placeholder="" id="uaccnum" name="uaccnum">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<img src="{{ $a->upic }}" width="80px" height="80px">
						<input type="file"  value="" placeholder="" id="upic" name="upic" value="">
					</div>
					
				</div>
				
				<div class="row cl">
					<div class="col-xs-4 col-sm-4 col-xs-offset-4 col-sm-offset-3">
						<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
					</div>
				</div>
			
		</form>
	</article>



@endsection