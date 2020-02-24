<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>CRUD FILE LARAVEL 6</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  
  <body>
    <section class="section-padding">
      <div class="container">
        <div class="section-header text-center">
          
        </div>
                  
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12 shadow p-3 mb-5 bg-white rounded">
          <h3 class="text-center">@yield('nama_fitur')</h3>
              @yield('fitur')
        </div>
      </div>
    </section>

    <script src="{{asset('js/jquery-min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>
