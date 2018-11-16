@extends('admin.layout.layout')
<!-- 文章类别列表页面 -->
@section('container')
<!-- 显示提示消息 -->
@if(session('error'))
	<div class="hint" style="width: 80%;height: 50px;margin: 10px auto;background: #f2dede;line-height: 50px;border-radius: 30px;">
		<p style="margin-left: 50px;font-size: 20px;color: #555;"><i class="Hui-iconfont">&#xe631;</i>&nbsp&nbsp&nbsp{{session('error')}}</p>
	</div>
@endif

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
	<form action="/admin/cates" method="get">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
			<div class="dataTables_length" id="DataTables_Table_0_length">
				<label>显示 <select name="showCount" aria-controls="DataTables_Table_0" class="select">
					<option value="5" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 5) selected @endif >5</option>
					<option value="10" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 10) selected @endif >10</option>
					<option value="20" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 20) selected @endif >20</option>
					<option value="30" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 30) selected @endif >30</option>
					</select> 条</label>
				<input type="submit" class="btn btn-success radius" value="分页">

			</div>
			<div class="text-c" style="float:right;">
				<input type="text" class="input-text" style="width:250px" placeholder="关键字" id="" name="search" value="{{ $req['search'] or '' }}">
				<input type="submit" class="btn btn-success radius" value="搜索">
			</div>
		</div>
	</form>	
	<a href="/admin/cates/create" style="margin-left: 20px;"><button class="btn btn-success radius">添加类别</button></a>
	<div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			
			<tr class="text-c">
				<th width="200px">ID</th>
				<th width="400px">类别名称</th>
				<th>父及类别id</th>
				<th>类别路径</th>
				<th width="240px;">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cates as $k=>$v)
			<tr class="text-c">
				<td>{{ $v->cid }}</td>
				<?php
                    $n = substr_count($v->cpath,',')-1;
                    if ($n<0){
                		$n = 0;
                    }
                ?>
				<td class="text-l"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @if ($v->cpid != 0) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp @endif|------- {{ $v->cname }}</td>
				<td>{{ $v->cpid }}</td>
				<td>{{ $v->cpath }}</td>
				<td class="f-14">

					<a href="/admin/cates/{{ $v->cid }}/edit" style="float: left;margin-left: 30px;margin-right: 30px;"><button class="btn btn-success radius">编辑</button></a>
					<form action="/admin/cates/{{ $v->cid }}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')" style="float: left;">删除</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="page_page">
		{!! $cates->appends($req)->render() !!}
	</div>
</div>

@endsection