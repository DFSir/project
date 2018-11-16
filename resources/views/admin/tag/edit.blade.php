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
	
	<article class="page-container">
	<form action="/admin/tag/{{$id}}" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标签：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$tags->name}}" placeholder="" id="name" name="name">
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