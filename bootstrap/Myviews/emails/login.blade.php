<html>
<head>
    <title>登录</title>
    <meta charset="UTF-8">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="form">
        <form action="/doLogin" method="post">
            {{ csrf_field()}}
            <div class="name">
                <div class="label_userName">用户名</div>
                <input type="text" name="userName" id="userName" value="{{old('userName')}}">
            </div>
            <div class="pwd">
                <div class="label_pwd">&nbsp;密码</div>
                <input type="password" name="pwd" id="pwd">
            </div>
            <div class="auto">
                <input type="checkbox" name="autoLogin" id="autoLogin" value="1">
                <div class="label_autoLogin">10天免登陆</div>
                <span class="forget"><a href="/MyForget">忘记密码?</a></span>
                <div class="doAction">
                    <input type="submit" id="submit" value="登录">
                    <input type="reset" id="reset" value="重置">
                </div>
            </div>
            <div class="errorDisplay">
                @if(isset($errors))
                    {{--{{var_dump($errors)}}--}}
                    @if(is_array($errors))
                        @foreach($errors as $error)
                            @if(is_array($error))
                                @foreach($error as $err)
                                    {{$err}}
                                @endforeach
                            @else
                                {{$error}}
                            @endif
                        @endforeach
                    @else
                        {{$errors}}
                    @endif
                @endif
            </div>
        </form>
</body>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            // $(this).css('display','block');
            if($(".errorDisplay").html()!=null){
                $(".errorDisplay").css('display','block');
                alert($(".errorDisplay").html());
                // $(this).css('display','block');
                // setTimeout(function(){
                //     $(".errorDisplay").slideDown();
                // },3000);
            }
        });
    })

</script>
</html>

