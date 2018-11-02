@extends('admin.layout.layout')
<!-- 文章列表页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<div class="text-c">
		<input type="text" class="input-text" style="width:250px" placeholder="输入文章关键字" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont"></i> 搜文章</button>
	</div>


	<div class="mt-20">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
			<div class="dataTables_length" id="DataTables_Table_0_length">
				<label>显示 
					<select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="select">
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select> 条
				</label>
			</div>
			<table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<thead>
					<tr class="text-c" role="row">
						<th>选择</th>
						<th>ID</th>
						<th>文章类别</th>
						<th>文章名称</th>
						<th>发布人</th>
						<th>作者</th>
						<th>上传时间</th>
						<th>审核状态</th>
						<th>点赞次数</th>
						<th>推荐位状态</th>
						<th width="100" class="sorting_disabled" rowspan="1" colspan="1" aria-label="操作" style="width: 100px;">操作</th>
					</tr>
				</thead>
			<tbody>
				@foreach($articles as $k=>$v)
					<tr class="text-c odd" role="row">
					<td><input type="checkbox" value="1" name=""></td>
					<td>{{ $v->aid }}</td>
					<td>{{ $v->catesinfo->cname }}</td>	
					<td>{{ $v->title}}</td>
					<td>{{ $v->uid }}</td>
					<td>{{ $v->author}}</td>
					<td>{{ $v->created_at}}</td>
					@if ($v->astate == 0)
					<td>未审核<button>审核</button></td>
					@else
					<td>已审核</td>
					@endif
					<td>{{ $v->like}}次</td>
					@if ($v->state == 0)
					<td>未推荐<button>推荐</button></td>
					@else
					<td>已推荐<button>下架</button></td>
					@endif
					<td>
						<button>修改</button>
						<button>删除</button>
					</td>					
					</tr>
				@endforeach

			</tbody>
		</table>
		<div>
			{!! $articles->render() !!}
		</div>
		</div>
	</div>
</div>

@endsection