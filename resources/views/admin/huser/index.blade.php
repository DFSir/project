@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

<div class="page-container">
  <h1>{{ $title or '' }}</h1>
  <div class="cl pd-5 bg-1 bk-gray mt-20">
      <span class="l">
        <a href="/admin/huser" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-success radius">
              用户列表</a>
          <a href="/admin/huser/create" onclick="member_add('添加用户','member-add.html','','510')" class="btn btn-primary radius">
            添加用户</a>
      </span>
    </div>
  <div class="mt-20">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

      <form action="/admin/huser" method="get">

        <div class="dataTables_length" id="DataTables_Table_0_length">
          <label>显示
            <select name="showCount" aria-controls="DataTables_Table_0" class="select">
              <option value="5" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 5) selected @endif>5</option>
              <option value="10" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 10) selected @endif>10</option>
              <option value="20" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 20) selected @endif>20</option>
              <option value="30" @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 30) selected @endif>30</option></select>条</label>

        </div>
        <div class="text-c" style="float: right;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入用户名" id="" name="search">
            <!-- <button type="submit" class="btn btn-success radius" id="" name="">
                <i class="Hui-iconfont"></i>搜索</button> -->
            <input type="submit" class="btn btn-success radius" value="搜索" value="{{ $request['search'] or '' }}">
        </div>
      </form>
      <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
      <table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
        <thead>
          <tr class="text-c" role="row">
            
            <th width="80" class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="descending" aria-label="ID: 升序排列" style="width: 80px;">ID</th>
            <th width="100" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="用户名: 升序排列" style="width: 100px;">用户名</th>
            <th width="40" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": 升序排列" style="width: 40px;">账号</th>
            <th width="40" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=": 升序排列" style="width: 40px;">头像</th>
            <th width="130" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="加入时间: 升序排列" style="width: 130px;">加入时间</th>
            <th width="100" class="sorting_disabled" rowspan="1" colspan="1" aria-label="操作" style="width: 100px;">操作</th></tr>
        </thead>
        <tbody>
        @foreach($huser as $k=>$v)
          <tr class="text-c odd" role="row">
            
            <td class="sorting_1">{{ $v->uid }}</td>
            <td>
              <u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">{{ $v->uname }}</u></td>
            <td>{{ $v->uaccnum }}</td>
            <td><img src="{{ $v->upic }}" width="80px" height="80px"></td>
            <td>{{ $v->created_at }}</td>
            <td class="td-manage">
              <a href="/admin/huser/{{ $v->uid }}/edit" class="btn btn-warning btn btn-default btn-sm radius">修改</a>
              <form action="/admin/huser/{{ $v->uid }}" method="post" style="display: inline-block;">{{ csrf_field() }} {{ method_field('DELETE') }}
                <input type="submit" value="删除" class="btn btn-danger radius"></form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      <div class="page_page">
        {!! $huser->appends($req)->render() !!}
      </div>
    </div>
  </div>
</div>
@endsection