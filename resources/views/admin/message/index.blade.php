@extends('admin.layout.layout')
<!-- 留言显示页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<div class="mt-20">
		<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

			<table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
				<thead>
					<tr class="text-c" role="row">
						<th width="60px">楼层</th>
						<th width="60px">用户</th>
						<th width="1350px">留言内容</th>
						<th width="100px">操作</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($message as $k=>$v)
					<tr class="text-c odd" role="row">
						<td class="sorting_1">{{ $v->mid }}层</td>
						<td>
							<a href="javascript:;">
								<i class="avatar size-L radius">
									<img alt="" src="{{ $v->husersinfo->photo or '/admin/static/h-ui/images/ucnter/avatar-default-S.gif' }}">
								</i>
							</a>
						</td>
						<td class="text-l">
							<div class="c-999 f-12">
								<span class="text-primary">{{ $v->usersinfo->uname }}</span> 
								<time>{{ $v->created_at }}</time> 
								<span class="ml-20">13000000000</span>
								<span class="ml-20">admin@mail.com</span>
							</div>
							<div class="f-12 c-999">
								<a href="http://www.h-ui.net/Hui-4.22-comment.shtml" target="_blank">http://www.h-ui.net/Hui-4.22-comment.shtml</a>
							</div>
							<div>{{ $v->mcontent }}</div>
						</td>
						<td class="td-manage">
							<form action="/admin/message/{{ $v->mid }}" method="post">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')">删除</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div>
				{!! $message->appends($req)->render() !!}
			</div>

		</div>
	</div>
</div>

@endsection