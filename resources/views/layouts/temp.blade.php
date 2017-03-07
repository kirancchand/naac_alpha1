<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>NAAC - @yield('title')</title>
  		<link rel="stylesheet" href="/css/bootstrap.min.css" />
      <!-- 1. Load libraries -->
      <!-- Polyfill(s) for older browsers -->
      {{ Html::script('core-js/client/shim.min.js') }}
      {{ Html::script('zone.js/dist/zone.js') }}
      {{ Html::script('reflect-metadata/Reflect.js') }}
      {{ Html::script('systemjs/dist/system.src.js') }}
      {{ Html::script('systemjs.config.js') }}
      <script>
         System.import('app').catch(function(err){ console.error(err); });
      </script>

    </head>
    <body>
	  @section('navbar')
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">National Assessment and Accreditation Centre</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          @show
        </ul>
    </nav>
    <br/><br/>
  <div class="container">
    @yield('content')
  </div>
  <script src="/js/jquery-3.1.1.min.js"></script>
  <script src="/js/bootstrap.js"></script>
  <script>
  $(function() {
    $('#message').hide().fadeIn().delay(3000).fadeOut('slow');
  });
  </script>
  @stack('page-scripts')
  </body>
</html>
