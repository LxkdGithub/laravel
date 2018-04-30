<html>
<head>
<title>主页</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="{{asset("css/index.css")}}">
</head>
<body>
<div class="top">
@if(session()->has('userName'))
  <span>你好</span>{{Session::get('userName')}}
        <span><a href="/MyLogout">退出</a></span>
    <span><a href="/Myregister">点击注册</a></span>
@elseif(Cookie::has('userName'))
    <span>你好</span>{{Cookie::get('userName')}}
    <span><a href="/MyLogout">退出</a></span>
    <span><a href="/Myregister">点击注册</a></span>
@else
    <span>欢迎!<a href="/MyLogin">快登录吧</a></span>
    <span><a href="/Myregister">点击注册</a></span>
  @endif
  <ul>
  <li><a href="/privateCenter">个人中心</a></li>
    <li><a href="/priBLogs">博客管理</a></li>
  </ul>
</div>
<div class="left">
  @if(isset($blogs))
   <ul>
     @foreach($blogs as $blog)
     <li>{{$blog->blogTitle}}</li>
     @endforeach
   </ul>
    @endif
</div>
<div class="content">

</div>
<div class="footer">

</div>
</body>
</html>