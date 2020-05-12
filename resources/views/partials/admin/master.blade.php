<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $page_title }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset("assets/plugins/bootstrap/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/icon-kit/dist/css/iconkit.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/ionicons/dist/css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/jvectormap/jquery-jvectormap.css")}}">
    <link rel="stylesheet"
        href="{{asset("assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/weather-icons/css/weather-icons.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/c3/c3.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/dist/css/theme.min.css")}}">
    @yield('extra-css')
    <script src="{{asset("assets/src/js/vendor/modernizr-2.8.3.min.js")}}"></script>
</head>

<body>

    <div class="wrapper" id="app">
        <!--header here-->
        @include('partials.admin.header')
        <!--header here-->

        <div class="page-wrap">
            <!--sidebar here-->
            @include('partials.admin.side-bar')
            <!--sidebar here-->

            <div class="main-content">
                <div class="container-fluid">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>

            <!--footer here-->
            @include('partials.admin.footer')
            <!--footer here-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{-- <script>
        window.jQuery || document.write('<script src="{{asset("assets/src/js/vendor/jquery-3.3.1.min.js")}}"></script>
    ')
    </script> --}}
    <script src="{{asset("assets/plugins/popper.js/dist/umd/popper.min.js")}}"></script>
    <script src="{{asset("assets/plugins/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js")}}"></script>
    <script src="{{asset("assets/plugins/screenfull/dist/screenfull.js")}}"></script>
    <script src="{{asset("assets/plugins/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset("assets/plugins/jvectormap/jquery-jvectormap.min.js")}}"></script>
    <script src="{{asset("assets/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js")}}"></script>
    <script src="{{asset("assets/plugins/moment/moment.js")}}"></script>
    <script src="{{asset("assets/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js")}}">
    </script>
    <script src="{{asset("assets/plugins/d3/dist/d3.min.js")}}"></script>
    <script src="{{asset("assets/plugins/c3/c3.min.js")}}"></script>
    <script src="{{asset("assets/js/tables.js")}}"></script>
    <script src="{{asset("assets/js/widgets.js")}}"></script>
    <script src="{{asset("assets/js/charts.js")}}"></script>
    <script src="{{asset("assets/dist/js/theme.min.js")}}"></script>
    <script src="/js/app.js"></script>

    @yield('extra-js')
</body>

</html>