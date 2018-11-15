@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

<div class="page-container">
  <h1>{{ $title or '' }}</h1>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
          <a href="/admin/auser" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
            网站配置</a>
        </span>
    </div>
  <div class="mt-20">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
      <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
      <table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
        <thead>
          <tr class="text-c" role="row">
           
            <th width="80" class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="ID: 升序排列" style="width: 80px;">ID</th>
            <th width="100" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="用户名: 升序排列" style="width: 100px;">网站标题</th>
            <th width="40" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": 升序排列" style="width: 40px;">LOGO</th>
            <th width="130" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="加入时间: 升序排列" style="width: 130px;">版权</th>
            <th width="130" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="加入时间: 升序排列" style="width: 130px;">状态</th>
            <th width="100" class="sorting_disabled" rowspan="1" colspan="1" aria-label="操作" style="width: 100px;">操作</th></tr>
        </thead>
        <tbody>
          <tr class="text-c odd" role="row">
            @foreach($setting as $k=>$v)            
            <td>{{$v->id}}</td>
            <td>{{$v->title}}</td>
            <td>
              <img src="{{$v->logo}}" width='50px' height='50px'>
            </td>
            <td>{{$v->banquan}}</td>
            <td>
              @if ($v->kg==1)
              开启
              @else
              关闭
              @endif
            </td>
            <td><a href="/admin/setting/{{$v->id}}/edit" class="btn btn-warning btn btn-default btn-sm radius">修改</a></td>
            @endforeach
          </tr>
        </tbody>
      </table>
      
      <div class="page_page">
      </div>
    </div>
  </div>
</div>
@endsection