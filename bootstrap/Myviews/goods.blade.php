@extends('Templete')
@section('content')
     <h1>Goods</h1>
     @if(isset($all))
       @foreach($all as $al)
           <h2><a href="{{url('test',$al->id)}}">{{$al->name}}</a></h2>
           <h2> <a href="{{action('lixukeController@singleShow',[$al->id])}}">{{$al->name}}</a> </h2>
           <h2> <a href="{}">{{$al->name}}</a> </h2>
           <goods>
             <h3>{{$al->goodsid}}</h3>
              <h3>{{$al->price}}</h3>
           </goods>
       @endforeach
     @endif
     {{$al or 'al not founded'}}
     {{ $single or 'Default' }}



@show
<div class="">
  <h1>我是child</h1>
</div>
