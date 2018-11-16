@extends('admin.layout.layout')
<!-- 文章类别修改页面 -->
@section('container')

<!-- 显示提示消息 -->
@if(count($errors) > 0)
	<div class="hint" style="width: 80%;height: 50px;margin: 10px auto;background: #f2dede;line-height: 50px;border-radius: 30px;">
		@foreach ($errors->all() as $error)
		<p style="margin-left: 50px;font-size: 20px;color: #555;"><i class="Hui-iconfont">&#xe631;</i>&nbsp&nbsp&nbsp{{ $error }}</p>
		@endforeach
	</div>
@endif

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<form class="form form-horizontal" id="form-article-add" action="/admin/cates/{{ $cate->cid }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>类别名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $cate->cname }}" placeholder="" id="" name="cname">
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-secondary radius" type="submit" value="修改名称"></input>
				
			</div>
		</div>
	</form>
	<br>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<a href="/admin/cates"><button class="btn btn-default radius" type="button" >返回</button></a>
		</div>
	</div>
</div>

@endsection