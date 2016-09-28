<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
              <!--Import jQuery before materialize.js-->
        <title>Laravel</title>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

        <!--Link Material Design Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="/assets/css/bootstrap.css">
          <!-- Bootstrap Material Design -->
        <link type="text/css" rel="stylesheet" href="/assets/libraries/bootstrap_material/css/bootstrap-material-design.css">
        <link type="text/css" rel="stylesheet" href="/assets/libraries/bootstrap_material/css/ripples.css">
       <!-- Styles -->
        <style>   
          .grid-item { width: 200px; }
          .grid-item--width2 { width: 400px; }
        </style>
    </head>
    <body>
    <script type="text/javascript" src="/assets/libraries/jquery/jquery-3.1.0.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="/assets/libraries/masonry/masonry.js"></script>
    <script type="text/javascript" src="/assets/libraries/bootstrap_material/js/material.js"></script>
    <script type="text/javascript" src="/assets/libraries/bootstrap_material/js/ripples.js"></script>
    <script>   

      $(document).ready(function() {

        $(document).on('click', '.pagination a', function(e) {
          get_page($(this).attr('href').split('page=')[1]);
          e.preventDefault();
        });

        $.material.init();
 
        function get_page(page) {
          $.ajax({
            url : '/home?page=' + page,
            type : ‘GET’,
            dataType : 'json',
            success : function(data) {
              $('#list').html(data['page']);
            },
            error : function(xhr, status, error) {
              console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
            },
            complete : function() {
              alreadyloading = false;
            }
          });
        }   

        $('#search').on('click', function(){
          $.ajax({
            url : '/home',
            type : 'GET',
            dataType : 'json',
            data : {
              'keywords' : $('#keywords').val()
            },
            success : function(data) {
              $('#list').html(data);
            },
            error : function(xhr, status) {
              console.log(xhr.error + " ERROR STATUS : " + status);
            },
            complete : function() {
              alreadyloading = false;
            }
          });
        });
      
      });

  </script>

    <!-- Navbar -->
    <div class="navbar navbar-info">
    <div class="container-fluid">
     @include('shared.header')
     </div>
     </div>
     <!-- Content -->
     <div class="row">
      @yield('content')
    </div>
    </body>
</html>
