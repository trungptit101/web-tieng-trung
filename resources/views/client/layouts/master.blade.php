<!DOCTYPE html>
<html lang="vi">

<!-- Mirrored from postmart.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Sep 2022 16:41:08 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <base>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="content-language" content="vi" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name="google" content="notranslate" />
    <link rel="canonical" href="index.html" />
    <meta name="apple-itunes-app" content="app-id=1608999909">
    <meta name="google-play-app" content="app-id=com.postmart">

    <meta property="og:url" content="index.html" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />

    <link rel="icon" type="image/png" href="{{ asset('/theme_client/images/logo.jpg') }}">

    <!-- Website Title -->
    <title>@yield('title')</title>

    <link href="{{ asset('theme_client/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet"
    href="{{ asset('/theme_client/home.css') }}">

    <!-- Favicon  -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    @yield('css')
</head>

<body class="page-template ltr">
    <div class="wrapper home-page" id="app">
        @include('client.layouts.header')
        <div class="page-section">
            @yield('main')
        </div>

        @include('client.layouts.footer')
    </div>
    <script src="{{ asset('theme_client/bootstrap.min.js') }}"></script>
    @yield('script')
</body>

</html>
