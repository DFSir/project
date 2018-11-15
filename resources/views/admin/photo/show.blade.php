@extends('admin.layout.layout')
<!-- 用户添加页面 -->
@section('container')

<div class="page-container">
    <h1>{{ $album->alname or '' }}相册的相片列表</h1>

    <div class="mt-20">
        <div>
            <div class="dataTables_length" id="DataTables_Table_0_length" style="margin-left: 80px;">
                <form action="/admin/photo" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="alid" value="{{ $album->alid }}">
                    <input type="file" name="picture[]" style="float: left;" multiple="multiple">
                    <input type="submit" class="btn btn-success radius" value="添加图片" style="float: left;">
                </form>
            </div>
            <a href="/admin/album" class="btn btn-primary radius" style="margin-left: 100px;">相册列表</a>
            <br>
            <hr>
            <div id="DataTables_Table_0_filter" class="dataTables_filter"></div>
            <table class="table table-border table-bordered table-hover table-bg table-sort " style="width: 50%;float: left;">
                <thead>
                    <tr class="text-c" role="row">
                        <th style="width: 50px;">ID</th>
                        <th>相片</th>
                        <th style="width: 100px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photo as $k=>$v)
                    @if ($k%2 == 0)
                    <tr>
                        <td style=" text-align:center;">{{ $v->pid }}</td>
                        <td style=" text-align:center;"><img src="{{ $v->picture }}" alt="" style="width: 300px;height: 140px;"></td>
                        <td style=" text-align:center;">
                            <form action="/admin/photo/{{ $v->pid }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')" style="float: left;">删除图片</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            <table class="table table-border table-bordered table-hover table-bg table-sort " style="width: 50%;float: left;">
                <thead>
                    <tr class="text-c" role="row">
                        <th style="width: 50px;">ID</th>
                        <th>相片</th>
                        <th style="width: 100px;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photo as $k=>$v)
                    @if ($k%2 == 1)
                    <tr>
                        <td style=" text-align:center;">{{ $v->pid }}</td>
                        <td style=" text-align:center;"><img src="{{ $v->picture }}" alt="" style="width: 300px;height: 140px;"></td>
                        <td style=" text-align:center;">
                            <form action="/admin/photo/{{ $v->pid }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger radius" onclick="return confirm('确定要删除吗?')" style="float: left;">删除图片</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection