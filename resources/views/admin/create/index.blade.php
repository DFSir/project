@extends('admin.layout.layout')
<!-- 文章类别列表页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			
			<tr class="text-c">
				<th width="200px">ID</th>
				<th width="400px">类别名称</th>
				<th>父及类别id</th>
				<th>类别路径</th>
				<th width="200px;">操作</th>
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

					<button title="编辑" style="text-decoration:none"><a href="/admin/cates/{{ $v->cid }}/edit"><i class="Hui-iconfont"></i></a></button>
					<form action="/admin/cates/{{ $v->cid }}" method="post">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" title="删除" style="text-decoration:none;" onclick="return confirm('确定要删除吗?')"><i class="Hui-iconfont"></i></button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		{!! $cates->render() !!}
	</div>
</div>

@endsection