{{$file=preg_replace('#testMail#','doConfirm',$_SERVER['PHP_SELF'])}}
{{$content=$_SERVER['HTTP_HOST'].$file."/".base64_encode('action=doLogin&userName=lixuke')}}
<html>
{{--  <h4>你好!,{{$name}}},只是测试邮件</h4>--}}
{{--  @if(isset())--}}
  地址是{{$content}}
   <h4>请点击验证 <a href="http://localhost/doConfirm"></a></h4>
</html>
