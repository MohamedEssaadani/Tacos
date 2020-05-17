<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Tacos</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css" />

    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('extra-css')
</head>

<body>
    @include('partials.client-side.header')

    @yield('content')

    @include('partials.client-side.footer')
    <!-- SCIPTS -->
    <script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
    <script src="plugin-frameworks/bootstrap.min.js"></script>
    <script src="plugin-frameworks/swiper.js"></script>
    <script src="common/scripts.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>