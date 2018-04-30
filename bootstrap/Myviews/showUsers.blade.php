@extends('Templete');
@section('content')
@if(isset($currentUser))
  {{'你的注册信息如下'.$currentUser}}
@endif

@stop