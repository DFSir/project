@extends('admin.layout.layout')
<!-- 关于我页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col"><h4>基本信息</h4></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="15%" style="text-align: center; font-size: 20px;">头像</td>
				<td style="text-align: center; font-size: 20px;">
					<img src="{{ $about->portrait }}" alt="" style="width: 200px;height: 200px;">
				</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 20px;">姓名</td>
				<td style="text-align: center; font-size: 20px;">{{ $about->name }}</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 20px;">职业</td>
				<td style="text-align: center; font-size: 20px;">{{ $about->profession }}</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 20px;">QQ</td>
				<td style="text-align: center; font-size: 20px;">{{ $about->qq }}</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 20px;">邮箱</td>
				<td style="text-align: center; font-size: 20px;">{{ $about->email }}</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 20px;">关于我</td>
				<td style="font-size: 20px;">{!! $about->aboutme !!}</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<a href="/admin/about/{{ $about->id }}/edit"><button class="btn btn-success radius">修改信息</button></a>
				</td>
			</tr>
		</tbody>
	</table>

</div>

@endsection