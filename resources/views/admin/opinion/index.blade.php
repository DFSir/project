@extends('admin.layout.layout')
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<div class="mt-20">

		<form action="/admin/opinion" method="get">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
				<div class="dataTables_length" id="DataTables_Table_0_length">
					<label>显示 
						<select name="showCount" aria-controls="DataTables_Table_0" class="select">
						<option value="5" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 5) selected @endif >5</option>
						<option value="10" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 10) selected @endif >10</option>
						<option value="20" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 20) selected @endif >20</option>
						<option value="30" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 30) selected @endif >30</option>
						</select> 条
					</label>
				</div>
				<div class="text-c" style="float:right;">
					<input type="text" class="input-text" style="width:250px" placeholder="关键字" id="" name="search" value="{{ $req['search'] or '' }}">
					<input type="submit" class="btn btn-success radius" value="搜索">
				</div>
			</div>
		</form>
		<div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
		<table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row">
					<th width="80">ID</th>
					<th width="100">意见标题</th>
					<th width="90">意见内容</th>
					<th width="90">发信人</th>
					<th width="90">状态</th>
					<th width="90">回复内容</th>
					<th width="130">添加时间</th>
					<th width="60">操作</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-c odd" role="row">
					@foreach($feedback as $k=>$v)
					<tr class="text-c">
						<td>{{$v->fid}}</td>
						<td>{{$v->ftitle}}</td>
						<td>{{$v->fcontent}}</td>
						<td>{{$v->huserfeedbacks->uname}}</td>
						@if ($v->state == 0)
						<td><a href="/admin/opinion/hf/{{ $v->fid }}"><button class="btn btn-danger radius">未回复</button></a></td>
						@else
						<td><button class="btn btn-success radius">已回复</button></td>
						@endif		
						<td>{{ $v->huifu }}</td>	
						<td>{{$v->created_at}}</td>
						<td class="f-14">
							<form action="/admin/opinion/{{ $v->fid }}" method="post" style="display: inline-block;">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" value="删除" class="btn btn-danger radius">
							</form>
						</td>
					</tr>
					@endforeach
				</tr>
			</tbody>
		</table>
		<div class="page_page">
			{!! $feedback->appends($req)->render() !!}
		</div>
	</div>
</div>


@endsection