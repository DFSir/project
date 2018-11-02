@extends('admin.layout.layout')
<!-- 文章列表页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>

	<div class="mt-20">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

			<form action="/admin/articles" method="get">
				<div class="dataTables_length" id="DataTables_Table_0_length">
					<label>显示 <select name="showCount" aria-controls="DataTables_Table_0" class="select">
						<option value="10" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 10) selected @endif >10</option>
						<option value="20" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 20) selected @endif >20</option>
						<option value="50" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 50) selected @endif >50</option>
						<option value="100" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 100) selected @endif >100</option>
						</select> 条</label>
					<button type="submit" class="btn btn-success radius" id="" name="">分页</button>
				</div>
				<div class="text-c" style="float:right;">
					<input type="text" class="input-text" style="width:250px" placeholder="输入作者搜索" id="" name="author" value="{{ $req['author'] or '' }}">
					<input type="text" class="input-text" style="width:250px" placeholder="输入文章关键字" id="" name="search" value="{{ $req['search'] or '' }}">
					<input type="radio" name="astate" value="10" @if((isset($req['astate']) && !empty($req['astate'])) && $req['astate'] == 10) checked="checked" @endif >未审核
					<input type="radio" name="astate" value="11" @if((isset($req['astate']) && !empty($req['astate'])) && $req['astate'] == 11) checked="checked" @endif >已审核
					<input type="radio" name="astate" value="1">未/已审核
					<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont"></i> 搜文章</button>
				</div>
			</form>


			<table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<thead>
					<tr class="text-c" role="row">
						<th>ID</th>
						<th>文章类别</th>
						<th>文章名称</th>
						<th>发布人</th>
						<th>作者</th>
						<th>上传时间</th>
						<th>点赞次数</th>
						<th>审核状态</th>
						<th>推荐位状态</th>
						<th class="sorting_disabled" rowspan="1" colspan="1" aria-label="操作" style="width: 175px;">操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($articles as $k=>$v)
					<tr class="text-c odd" role="row">
						<td>{{ $v->aid }}</td>
						<td>{{ $v->catesinfo->cname }}</td>
						<td>{{ $v->title}}</td>
						@if ($v->uid == 0)
						<td>管理员</td>
						@else
						<td>{{ $v->userinfo->uname }}</td>
						@endif
						<td>{{ $v->author}}</td>
						<td>{{ $v->created_at}}</td>
						<td>{{ $v->like}}次</td>

						@if ($v->astate == 10)
						<td>未审核<a href="/admin/articles/astate/{{ $v->aid }}"><button class="btn btn-success radius">审核</button></a></td>
						@else
						<td>已审核</td>
						@endif
						
						@if ($v->state == 0)
						<td>未推荐<a href="/admin/articles/switchup/{{ $v->aid }}"><button class="btn btn-success radius">推荐</button></a></td>
						@else
						<td>已推荐<a href="/admin/articles/switchdown/{{ $v->aid }}"><button class="btn btn-danger radius">下架</button></a></td>
						@endif
						<td>
							<a href="/admin/articles/{{ $v->aid }}" style="float: left;margin-right: 20px;"><button class="btn btn-success radius">文章详情</button></a>
							<form action="/admin/articles/{{ $v->aid }}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')" style="float: left;">删除</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div>
				{!! $articles->appends($req)->render() !!}
			</div>
		</div>
	</div>
</div>

@endsection