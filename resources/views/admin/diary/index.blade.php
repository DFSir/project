@extends('admin.layout.layout')
@section('container')

<div class="page-container">
	<h1>{{ $title }}</h1>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont"></i> 批量删除</a></span></div>
	<div class="mt-20">

	<form action="/admin/diary" method="get">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="DataTables_Table_0_length">
			<label>显示 
				<select name="showCount" aria-controls="DataTables_Table_0" class="select">
				<option value="5" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 5) selected @endif >5</option>
				<option value="10" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 10) selected @endif >10</option>
				<option value="20" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 20) selected @endif >20</option>
				<option value="30" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 30) selected @endif >30</option>
				</select> 条</label>
		</div>
		<div class="text-c" style="float:right;">
				<input type="text" class="input-text" style="width:250px" placeholder="关键字" id="" name="search">
				<!-- <button type="submit" class="btn btn-success radius" value="" id="" name="search"><i class="Hui-iconfont"></i> 搜索</button> -->
				<input type="submit" class="btn btn-success radius" value="搜索" value="{{ $request['search'] or '' }}">
		</div>
	</form>
	<div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
	<table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
		<thead>
			<tr class="text-c" role="row">
				<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th width="100">日记标题</th>
					<th width="90">日记内容</th>
					<th width="130">添加时间</th>
					<th width="60">操作</th>
			</tr>
		</thead>
		<tbody>
			
		<tr class="text-c odd" role="row">
				@foreach($diary as $k=>$v)
				<tr class="text-c">
					<td><input type="checkbox" value="1" name=""></td>
					<td>{{ $v->did }}</td>
					<td>{{ $v->dtitle }}</td>
					<td>{{ $v->dcontent }}</td>
					<td>{{ $v->created_at }}</td>
					<td class="f-14">
					<a href="/admin/diary/{{$v->did}}/edit" class="btn btn-warning btn btn-default btn-sm radius">修改</a>

						<form action="/admin/diary/{{ $v->did }}" method="post" style="display: inline-block;">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<input type="submit" value="删除" class="btn btn-danger radius">
						</form>
					</td>
				</tr>
				@endforeach
			</tr></tbody>
	</table>
	<div class="page_page">
		{!! $diary->render() !!}
	</div>
	</div>
	</div>
</div>

@endsection