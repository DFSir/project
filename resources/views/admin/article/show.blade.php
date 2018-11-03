@extends('admin.layout.layout')
<!-- 文章审核页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col"><h4>文章信息</h4></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="15%" style="text-align: center; font-size: 20px;">文章标题</th>
				<td style="text-align: center; font-size: 20px;">{{ $article->title}}</td>
			</tr>
			<tr>
				<td>上传时间</td>
				<td>{{ $article->created_at}}</td>
			</tr>
			<tr>
				<td>文章类别</td>
				<td>{{ $article->catesinfo->cname}}</td>
			</tr>
			<tr>
				<td>文章标签</td>
				<td>
					@foreach($article->tags as $k => $v)
					<label style="font-size: 14px;font-weight: normal;margin-right: 10px;">{{$v->name}}</label>
					@endforeach
				</td>
			</tr>
			<tr>
				<td>发布人</td>
				@if ($article->uid == 0)
				<td>管理员</td>
				@else
				<td>{{ $article->userinfo->uname }}</td>
				@endif
			</tr>
			<tr>
				<td>作者</td>
				<td>{{ $article->author }}</td>
			</tr>
			<tr>
				<td>文章内容</td>
				<td>{!! $article->acontent !!}</td>
			</tr>
			<tr>
				<td>点赞次数</td>
				<td>{{ $article->like }}次</td>
			</tr>
			<tr>
				<td>用户评论</td>
				<td>
					<table>
						<thead>
							<tr>
								<th style="width: 150px;">用户名</th>
								<th style="width: 150px;">评论时间</th>
								<th>评论内容</th>
								<th style="width: 50px;">操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($article->commentinfo as $k=>$v)
							<tr>
								<td>{{ $v->ucominfo->uname }}</td>
								<td>{{ $v->created_at }}</td>
								<td>{!! $v->comment !!}</td>
								<td><a href="/admin/articles/comment/{{ $v->id }}"><button class="btn btn-danger radius">删除</button></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td>审核状态</td>
				@if ($article->astate == 10)
				<td>未审核</td>
				@else
				<td>已审核</td>
				@endif
			</tr>
			<tr>
				<td></td>
				<td>
					@if ($article->uid == 0)
					<a href="/admin/articles/{{ $article->aid }}/edit"><button class="btn btn-success radius">修改文章</button></a>
					@endif
					<a href="/admin/articles"><button class="btn btn-success radius">返回列表页</button></a>
				</td>
			</tr>
		</tbody>
	</table>

</div>

@endsection