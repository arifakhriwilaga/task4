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
  
      // $(window).on('hashchange', function() {
      //     if (window.location.hash) {
      //         var page = window.location.hash.replace('#', '');
      //         if (page == Number.NaN || page <= 0) {
      //             return false;
      //         }else{
      //             getData(page);
      //         }
      //     }
      // });

            // var myurl = $(this).attr('href');
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
          $('li').removeClass('active');
          $(this).parent('li').addClass('active');
          event.preventDefault();
          var page= $(this).attr('href').split('page=')[1];
          getData(page);
        });

        $.material.init();
    });
    function getData(page){
            $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html",
                
            })
            .done(function(data)
            {
                console.log(data);
                
                $("#image_container").empty().html(data);
                location.hash = page;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  alert('No response from server');
            });
    }

    function search_data(search_value) {
      $.ajax({
          url: '/search-data/' + 'title_image',
          method: 'GET'
      }).done(function(response){
          $('#image_container').html(response);
      });
    }
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
