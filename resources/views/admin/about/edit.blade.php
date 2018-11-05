@extends('admin.layout.layout')
<!-- 关于我修改页面 -->
@section('container')

<div class="page-container">
	<h1>{{ $title or '' }}</h1>
	<form action="/admin/about/{{ $about->id }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
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
						<input type="file" name="portrait">
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 20px;">姓名</td>
					<td style="text-align: center; font-size: 20px;">
						<input class="input-text" type="text" name="name" value="{{ $about->name }}">
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 20px;">职业</td>
					<td style="text-align: center; font-size: 20px;">
						<input class="input-text" type="text" name="profession" value="{{ $about->profession }}">
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 20px;">QQ</td>
					<td style="text-align: center; font-size: 20px;">
						<input class="input-text" type="text" name="qq" value="{{ $about->qq }}">
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 20px;">邮箱</td>
					<td style="text-align: center; font-size: 20px;">
						<input class="input-text" type="text" name="email" value="{{ $about->email }}">
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 20px;">关于我</td>
					<td style="font-size: 20px;">
						<script id="container" name="aboutme" type="text/plain" style="width: 100%;height: 400px;">
					        {{ $about->aboutme }}
					    </script>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						<button class="btn btn-success radius" type="submit">确定修改</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>	
</div>

<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{toolbars:[
    		['fullscreen', 'source', 'undo', 'redo','bold','italic','underline','strikethrough','indent','subscript','fontborder','superscript','horizontal','time','date','cleardoc','inserttable'],
    		['simpleupload','insertimage','link','emotion','spechars','justifyleft','justifyright','justifycenter','justifyjustify','forecolor','backcolor','imagenone','imageleft','imageright','imagecenter','autotypeset']
    	]});
</script>

@endsection