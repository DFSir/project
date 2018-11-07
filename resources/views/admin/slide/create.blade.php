@extends('admin.layout.layout')
<!-- 轮播图添加页面 -->
@section('container')

<article class="page-container" style="">
	<h1>{{ $title or '' }}</h1>
	<a href="/admin/slide" style="margin-left: 20px;"><button class="btn btn-success radius" style="width: 120px;">轮播图列表</button></a>
	<form class="form form-horizontal" id="form-article-add" novalidate="novalidate" action="/admin/slide" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>轮播图文章：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="aid" id="" class="select">

		                @foreach ($articles as $k=>$v)
						<option value="{{ $v->aid }}" @foreach ($aid as $ka=>$va) @if ($va->aid == $v->aid) disabled @endif @endforeach>{{ $v->title }}</option>
		                @endforeach

		            </select>
				</span>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>轮播图图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="file" name="slide">建议图片大小为750*450
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图片描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="describe" name="describe">
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"></label>
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-secondary radius" type="submit" value="添加轮播图"></input>
			</div>
		</div>
		
	</form>
</article>

@endsection