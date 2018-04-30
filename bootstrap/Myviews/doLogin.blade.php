@extends('Templete')
@section('content')
    <h2>用户列表</h2>
    @if(isset($userName))
        <h3>恭喜注册成功</h3>
        {{--<h4><a href="{{action('MyUsersController@showMyUsers')}}">点击查看注册详情</a></h4>--}}
        <h4><a href="{{url('showUser',$userName)}}">点击查看注册详情</a></h4>
    @endif
    {{$userName or 'not found user'}}
@stop
