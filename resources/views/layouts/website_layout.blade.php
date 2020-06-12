<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Clicka" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />

    <!-- Radio Checkbox Plugin -->
    <link rel="stylesheet" href="{{ asset('css/components/radio-checkbox.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Clicka Estudio | @yield('title')</title>
    <meta name="description" content="@yield('description')" >
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon-32.png') }}" >

</head>

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header ============================================= -->
        @include('partial.header_website')
        <!-- #header end -->


        @yield('content')


        <!-- Footer ============================================= -->
        @include('partial.footer_website')
        <!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>


    <!-- External JavaScripts
    ============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="{{ asset('js/functions.js') }}"></script>

    @yield('extra-script')


</body>

</html>
