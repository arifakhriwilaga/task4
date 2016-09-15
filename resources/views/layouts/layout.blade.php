<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
              <!--Import jQuery before materialize.js-->
        <title>Laravel</title>
        <!--Link Material Design Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="/assets/libraries/materializecss/css/materialize.css"  media="screen,projection"/>
       <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body>
    <script type="text/javascript" src="/assets/libraries/jquery/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="/assets/js/app.js"></script>
    <script type="text/javascript" src="/assets/libraries/materializecss/js/materialize.js"></script>
    <script>
      $( document ).ready(function(){
       $(".button-collapse").sideNav();
     });
    </script>
    <!-- Navbar -->
     @include('shared.header')

     <!-- Content -->
     <div class="row">
      @yield('content')
    </div>
    </body>
</html>
