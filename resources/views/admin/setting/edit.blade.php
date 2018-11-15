@extends('admin.layout.layout')
@section('container')

<article class="page-container">
	<h1>{{ $title or '' }}</h1>
	<form action="/admin/setting/{{$setting->id}}" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $setting->title }}" placeholder="" id="dtitle" name="title">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>LOGO:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<img src="{{ $setting->logo }}" width='80px' height='80px'>
				<input class="common-text" name="logo" size="50" type="file">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>版权:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{ $setting->banquan }}" placeholder="" id="banquan" name="banquan">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态:</label>
			<div class="formControls col-xs-8 col-sm-9">
				<ul class="mws-form-list inline">
                        <li><input type="radio" name="kg" value="1" id="s1" @if($setting->kg == 1) checked @endif > <label for="s1">开启网站</label></li>
                        <li><input type="radio" name="kg" value="0" id="s2" @if($setting->kg == 0) checked @endif > <label for="s2">关闭网站</label></li>
                    </ul>
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

@endsection