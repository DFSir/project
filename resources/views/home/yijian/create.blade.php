@extends('home.layout.layout')
<!-- 关于我页面 -->
@section('head')
<div class="pagebg timer"> </div>
@endsection

@section('picsbox')
@endsection

@section('container')

  <div class="weixin">
            <h2 class="hometitle">意见反馈</h2>
            @if(empty(session('Huser')))
            <textarea name="comment" placeholder="说点什么..." style="width: 100%;height: 100px;resize:none;" maxlength="50" ></textarea>
            <a href="{{ url('home/login') }}"><button type="submit" style="width: 90px;height: 30px;float: right;margin-bottom: 20px;">发送</button></a>
            @else
            <form action="/home/yijian" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="uid" value="{{ session('Huser')->uid }}">
                <textarea name="fcontent" placeholder="说点什么..." style="width: 100%;height: 100px;resize:none;" maxlength="50" ></textarea>
                <button type="submit" style="width: 90px;height: 30px;float: right;margin-bottom: 20px;">发送</button>
            </form>
            @endif
        </div>

@endsection

@section('right')

@endsection



