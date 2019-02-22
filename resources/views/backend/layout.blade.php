
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Small Admin @yield('title')</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="{{asset('backend/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('backend/plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
    <link href="{{asset('backend/plugins/jquery-datatable/dataTable.bootstrap.min.css')}}" rel="stylesheet" />

    <link href="{{asset('backend/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/theme-blue.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('styles')

</head>
    <body class="theme-blue">

        @include('backend.partials.nav')
        @include('backend.partials.sidebar')


         @yield('content')




    <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backend/plugins/node-waves/waves.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-countto/jquery.countTo.js')}}"></script>
    <script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('backend/plugins/morrisjs/morris.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('backend/js/admin.js')}}"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        <script>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error('{{$error}}'), 'Error',{
                        closeButton: true,
                        progressBar:false
                    }
                @endforeach
            @endif
        </script>

    @stack('script')
    </body>
</html>
