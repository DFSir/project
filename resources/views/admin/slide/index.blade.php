@extends('admin.layout.layout')
<!-- 轮播图列表页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<a href="/admin/slide/create"><button class="btn btn-success radius"><i class="Hui-iconfont">&#xe610;</i> 添加轮播图</button></a>
	<br>
	<br>
	<div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th>链接文章</th>
				<th >图片</th>
				<th>描述</th>
				<th width="240px;">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($slide as $k=>$v)
			<tr class="text-c">
				<td>{{ $v->articleinfo->title }}</td>
				<td>
					<img src="{{ $v->slide }}" alt="{{ $v->describe }}" style="width: 350px;height: 170px;">
				</td>
				<td>{{ $v->describe }}</td>
				<td class="f-14">
					<a href="/admin/slide/{{ $v->id }}/edit" style="float: left;margin-left: 30px;margin-right: 30px;">
						<button class="btn btn-success radius">编辑</button>
					</a>
					<form action="/admin/slide/{{ $v->id }}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')" style="float: left;">删除</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection