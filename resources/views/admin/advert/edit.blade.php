@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')


	<article class="page-container">
		<h1>{{ $title or '' }}</h1>
		<form action="/admin/advert/{{$id}}" method="post" class="form form-horizontal" id="form-member-add" novalidate="novalidate" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告名称：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="{{ $a->name }}" placeholder="" id="name" name="name"><span></span>
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告URL：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<input type="text" class="input-text" value="{{ $a->url }}" placeholder="" id="url" name="url"><span></span>
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>广告图片：</label>
					<div class="formControls col-xs-4 col-sm-4">
						<img src="{{ $a->apic }}" width="80px" height="80px">
						
						<input type="file" name="apic" style="margin-top: 10px;">
					</div>
					<div class="col-xs-4 col-ms-4 spanll">
						
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
					
					<div class="formControls col-xs-4 col-sm-4">
						<ol>
							@if($a -> state == '0')
	                            <li><input type="radio" name="state" value="0" id="s0" checked> <label for="s1">禁用</label></li>
	                            @else
	                            <li><input type="radio" name="state" value="0" id="s0"> <label for="s1">禁用</label></li>
	                            @endif
	                            @if($a -> state == '1')
	                            <li><input type="radio" name="state" value="1" id="s1" checked> <label for="s1">开启</label></li>
	                            @else
	                            <li><input type="radio" name="state" value="1" id="s1"> <label for="s1">开启</label></li>
	                        @endif
                        </ol>
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