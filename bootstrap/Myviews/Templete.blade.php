<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <script href="/vendor/components/jquery/jquery.js"></script>
      <link rel="stylesheet" href="public/css/app.css" >
      @yield('js')
      <title>Test</title>
  </head>
  <body>
     <div class="">
       @yield('content')
     </div>
       @yield('footer')
  </body>
</html>
