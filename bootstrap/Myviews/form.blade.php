@extends('Templete')
@section('js')
    {{--<script ></script>--}}
    <script type="text/javascript" href="jquery.js">
        alert('ready');
        $(document).ready(function(){
            alert('ready!!!!!!!!!!');
            $('#userName').bind('click',function(){
                alert('focus');
            });
        });
    </script>
@stop
@section('content')
    {{ Form::open(['url'=>'/doLogin']) }}
    {{  Form::label('uname', '用户名')}}
    {{  Form::input('text','userName','请输入用户名',['id'=>'userName','class'=>'']) }}
    {{  Form::label('pwd','密码') }}
    {{  Form::input('password','pwd','请输入密码',['id'=>'pwd','class'=>'']) }}
    {{  Form::input('submit','submit','提交',['id'=>'submit','class'=>'']) }}
{{ Form::close() }}
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
@stop
