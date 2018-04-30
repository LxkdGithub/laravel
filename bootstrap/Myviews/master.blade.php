<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script href="{{asset('/js/jquery.js')}}"></script>
        <link rel="stylesheet" href="/css/weui.css">
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        @yield('content')
    </body>
    <script>
        alert('sd');
        $(document).ready(function(){
            alert('jb');
        );
    </script>
    @yield('my_js')
</html>