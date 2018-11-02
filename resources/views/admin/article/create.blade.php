@extends('admin.layout.layout')
<!-- 文章详情添加页面 -->
@section('container')

<article class="page-container" style="">
	<h1>{{ $title or '' }}</h1>
	<form class="form form-horizontal" id="form-article-add" novalidate="novalidate" action="/admin/articles" method="post">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章类型：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="cid" id="" class="select">
		                @foreach ($cates as $k=>$v)
						<?php
		                    $n = substr_count($v->cpath,',')-1;
		                    if ($n<0){
		                		$n = 0;
		                    }
		                ?>
						<option value="{{ $v->cid }}" @if ($v->cpid == 0) disabled @endif> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @if ($v->cpid != 0) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @endif|------- {{ $v->cname }}</option>
		                @endforeach
		            </select>
				</span>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标签：</label>
			<div class="formControls col-xs-8 col-sm-9">
				@foreach($tags as $k => $v)
				<label style="font-size: 14px;font-weight: normal;margin-right: 10px;"><input type="checkbox" name="tag_id[]" value="{{$v->id}}">{{$v->name}}</label>
				@endforeach
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="articletitle" name="title">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="hidden" value="0" name="uid">
				<input type="text" class="input-text" value="" placeholder="" id="author" name="author">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<!-- 加载编辑器的容器 -->
		    <script id="container" name="acontent" type="text/plain" class="formControls col-xs-8 col-sm-9" style="height: 380px;">
		        
		    </script>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"></label>
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-secondary radius" type="submit" value="添加文章"></input>
			</div>
		</div>
		
	</form>
</article>

<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{toolbars:[
    		['fullscreen', 'source', 'undo', 'redo','bold','italic','underline','strikethrough','indent','subscript','fontborder','superscript','horizontal','time','date','cleardoc','inserttable'],
    		['simpleupload','insertimage','link','emotion','spechars','justifyleft','justifyright','justifycenter','justifyjustify','forecolor','backcolor','imagenone','imageleft','imageright','imagecenter','autotypeset']
    	]});
</script>

@endsection