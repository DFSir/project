@extends('admin.layout.layout')
<!-- 文章类别列表页面 -->
@section('container')

	<div class="page-container">
		<p class="f-20 text-success">服务器基本信息<span class="f-14"></span></p>
		<table class="table table-border table-bordered table-bg mt-20">
			<thead>
				<tr>
					<th colspan="2" scope="col">服务器信息</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th width="30%">服务器IP地址 </th>
					<td>{{ $ip }}</td>
				</tr>
				<tr>
					<td>服务器解译引擎 </td>
					<td>{{ $exp }}</td>
				</tr>
				<tr>
					<td>服务器域名 </td>
					<td>{{ $domain }}</td>
				</tr>
				<tr>
					<td>服务器端口 </td>
					<td>{{ $port }}</td>
				</tr>
				<tr>
					<td>服务器的语言种类 </td>
					<td>{{ $lang }}</td>
				</tr>
				<tr>
					<td>服务器系统目录 </td>
					<td>{{ $cata }}</td>
				</tr>
				<tr>
					<td>服务器版本 </td>
					<td>{{ $phpname }}</td>
				</tr>
				<tr>
					<td>服务器操作系统 </td>
					<td>{{ $phpuname }}</td>
				</tr>
				<tr>
					<td>PHP版本 </td>
					<td>{{ $php }}</td>
				</tr>
				<tr>
					<td>PHP安装路径 </td>
					<td>{{ $phpinc }}</td>
				</tr>
				<tr>
					<td>PHP运行方式 </td>
					<td>{{ $phpsapi }}</td>
				</tr>
				<tr>
					<td>服务器当前时间</td>
					<td>{{ $time }}</td>
				</tr>
				<tr>
					<td>最大上传限制</td>
					<td>{{ $cfg }}</td>
				</tr>
				<tr>
					<td>最大上传时间</td>
					<td>{{ $max }}</td>
				</tr>
				<tr>
					<td>脚本运行占用最大内存</td>
					<td>{{ $limit }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<footer class="footer mt-20">
		<div class="container">
			<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
				Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
				本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
				<p>More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
	</footer>

@endsection