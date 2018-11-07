@extends('admin.layout.layout')
<!-- 文章类别添加页面 -->
@section('container')
<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		 	<a href="/admin/cates" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
		        文章类别列表</a>
		    <a href="/admin/cates/create" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
        		添加文章类别</a>
		</span>
	</div>
	<form class="form form-horizontal" id="form-article-add" action="/admin/cates" method="post">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>父级类别：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<span class="select-box">
					<select name="cpid" id="" class="select">
		                <option value="0">顶级分类</option>
		                @foreach ($cates as $k=>$v)
						<?php
		                    $n = substr_count($v->cpath,',')-1;
		                    if ($n<0){
		                		$n = 0;
		                    }
		                ?>
						<option value="{{ $v->cid }}" @if ($v->cpid != 0) disabled @endif> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @if ($v->cpid != 0) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @endif|------- {{ $v->cname }}</option>
		                @endforeach
		            </select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>类别名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="" name="cname">
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-secondary radius" type="submit" value="添加"></input>
			</div>
		</div>
	</form>
	<br>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
			<a href="/admin/cates"><button class="btn btn-secondary radius" type="button" >类别列表</button></a>
		</div>
	</div>
</div>
@endsection