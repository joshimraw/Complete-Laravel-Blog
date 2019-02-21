<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Smallf @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/swiper.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/ionicons.css')}}">

        @stack('styles')
    </head>
    <body>

        @include('frontend.partials.nav')





        <div class="container-fluid">

            @yield('content')

        </div>






        @include('frontend.partials.footer')

    <script src="{{asset('/frontend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('/frontend/js/tether.min.js')}}"></script>
    <script src="{{asset('/frontend/js/swiper.js')}}"></script>
    <script src="{{asset('/frontend/js/scripts.js')}}"></script>

    @stack('script')
    </body>
</html>
