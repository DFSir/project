@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

<div class="page-container">
    <h1>{{ $title or '' }}</h1>

    <div class="mt-20">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <form action="/admin/album" method="get">
                <div class="dataTables_length" id="DataTables_Table_0_length">
                    <label>显示
                        <select name="showCount" aria-controls="DataTables_Table_0" class="select">
                            <option value="10" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 10) selected @endif>10</option>
                            <option value="20" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 20) selected @endif>20</option>
                            <option value="30" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 30) selected @endif>30</option>
                            <option value="50" @if((isset($req['showCount']) && !empty($req['showCount'])) && $req['showCount'] == 50) selected @endif>50</option>
                        </select>条
                    </label>
                    <input type="submit" class="btn btn-success radius" value="搜索">
                </div>
            </form>
            <div class="text-c" style="float: right;">
                <form action="/admin/album" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="input-text" style="width:250px" placeholder="相册名称" id="" name="alname">
                    <input type="submit" class="btn btn-success radius" value="添加相册">
                </form>
            </div>

            <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
            <table class="table table-border table-bordered table-hover table-bg table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead>
                    <tr class="text-c" role="row">
                        <th>ID</th>
                        <th>相册名称</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($album as $k=>$v)
                    <tr>
                        <td>{{ $v->alid }}</td>
                        <td>{{ $v->alname }}</td>
                        <td>
                            <a href="/admin/photo/{{ $v->alid }}" style="float: left;margin-right: 20px;"><button class="btn btn-success radius">相册详情</button></a>
                            <form action="/admin/album/{{ $v->alid }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')" style="float: left;">删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
      
            <div class="page_page">
                {!! $album->appends($req)->render() !!}
            </div>
        </div>
    </div>
</div>

@endsection