<html>
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>注册界面</title>
    <script  src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset("css/register.css")}}">
</head>
<div class="form">
<form action="/doRegister" method="post">
    {{ csrf_field()}}
    <div class="div1">
        <div class="userName">用户名</div>
        <input type="text" name="userName" id="userName" value="用户名" attr="need">
        <div class="errorName"></div>
    </div>
    <div class="div2">
         <div class="pwd">密码</div>
         <input type="password" name="pwd" id="pwd" attr="need">
         <div class="errorPwd"></div>
    </div>
    <div class="div3">
        <div class="pwd-confirm">确认密码</div>
        <input type="password" name="pwd_confirmation" id="pwd_confirmation" attr="need">
        <div class="errorPwd_confirm"></div>
    </div>
    <div class="div4">
        <div class="sex">性别</div>
        <div class="ff">
        <input type="radio" name="sex" id="sex" value="男"  checked="checked">男
        <input type="radio" name="sex" id="sex" value="女">女
        <input type="radio" name="sex" id="sex" value="蒙面侠">蒙面侠
        </div>
    </div>
     <div class="div5">
         <div class="email">邮箱</div>
         <input type="text" name="email" id="email"  value="邮箱">
         <div class="errorEmail"></div>
     </div>
    <div class="div6">
        <input type="submit" name="submit" id="submit" value="提交">
    </div>
    <div  class="errorsDisplay" >
        @if(isset($errors))
            {{$errors}}
        @endif
    </div>
</form>
</div>

</body>
<script>
    $(document).ready(function(){
        $("#userName").bind('focus',function () {
            $(this).val($(this).val()=="用户名"?"":$(this).val());
        });
        // $("#userName").bind('blur',function(){
        //     $(this).val($(this).val()==""?"用户名":$(this).val());
        // })
        $("#userName").bind('blur',function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                type: 'POST',
                url: '/ajaxCheck',
                data: {
                    cType:'userName',
                    cValue:$(this).val(),
                },
                dataType: 'json',
                success: function(data){
                    $(".errorName").text(data.msg);
                    // alert('success');
                },
                error: function(xhr, type,err){
                    // alert('Ajax error!');
                    alert(err);
                }
            });
        });

        //userName
        $("#pwd").bind('blur',function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                type: 'POST',
                url: '/ajaxCheck',
                data: {
                    cType:'pwd',
                    cValue:$(this).val(),
                    another:$("#pwd_confirmation").val(),
                    backPlace:'pwd_confirmation',
                },
                dataType: 'json',
                success: function(data){
                    $(".errorPwd").text(data.msg);
                    // alert('success');
                },
                error: function(xhr, type,err){
                    // alert('Ajax error!');
                    alert(err);
                }
            });
        });

        //pwd_com
        $("#pwd_confirmation").bind('blur',function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                type: 'POST',
                url: '/ajaxCheck',
                data: {
                    cType:'pwd_confirmation',
                    cValue:$(this).val(),
                    another:$("#pwd").val(),
                },
                dataType: 'json',
                success: function(data){
                    $(".errorPwd_confirm").text(data.msg);
                    // alert('success');
                },
                error: function(xhr, type,err){
                    alert('Ajax error!');
                    // alert(err);
                }
            });
        });

         $("Form").submit(function(){
             var $flag=1;
             // alert($("Input[attr=need]").length);
             // var $minput=$("input[attr=need]").toArray();
             $("input[attr=need]").each(function(i,dome){
                 // alert(dome.value);
                 if(dome.value==""){
                     $flag=0;
                     // alert($flag);
                 }
             });
             if($flag==0){
                 // return false;
                 event.preventDefault();
                 // $("div.errorsDisplay").html('请正确输入');
                 alert($("div.errorsDisplay").text());
                 if($("div.errorsDisplay").text()==""){
                     $("div.errorsDisplay").append("<p color='red'>请输入</p>");
                 }
                 $("div.errorsDisplay").slideDown();
                 setTimeout(function(){
                     $("div.errorsDisplay").slideUp(300);
                 },3000);
             }
         });
    })

</script>
<body>
</html>