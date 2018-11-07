@extends('admin.layout.layout')
@section('container')


<article class="page-container">
	<h1>{{ $title or '' }}</h1>
	<form action="/admin/opinion/state/{{ $feedback->fid }}" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>意见标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$feedback->ftitle}}" placeholder="" id="ftitle" name="ftitle">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">意见内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="fcontent" cols="" rows="" class="textarea" placeholder="说点什么..." onkeyup="$.Huitextarealength(this,100)">{{ $feedback->fcontent }}</textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">回复内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="huifu" cols="" rows="" class="textarea" placeholder="说点什么..." onkeyup="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
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