<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'LSAPP')}}</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        @yield('css')
    </head>
    <body style="background-color: #f4f4f4;">
      @include('include.navbar')
      
      <div class="container">
        @include('include.messages')
        @yield('content')
      </div>
    </body>
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script> 
    <script src="{{asset('js/NEW.js')}}"></script>
    <script src="{{asset('js/clock.js')}}"></script>
    
</html>
