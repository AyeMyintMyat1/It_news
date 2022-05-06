<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',"Admin Dashboard")</title>
    <link rel="stylesheet" href="{{ asset('dashboard/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/CSS/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/feather-icons-web/feather.css') }}">
    <link rel="icon" href="{{ asset('images/logos/fav.png') }}">
    @yield('head')
</head>

<body>
<section class="main container-fluid">
    @guest
        <div class="row">
            @yield('content')
        </div>
    @else
        <div class="row">
            <!-- SideBar start -->
        @include('layouts.sidebar')
        <!-- SideBar end -->
            <div class="col-12  col-lg-9 col-xl-10 vh-100 px-2 content">
                <!-- Header start  -->
            @include('layouts.header')
            <!-- Header end -->
                <!-- Content Area start -->
            @yield('content')
            <!-- Content Area end -->
            </div>
        </div>
    @endguest
</section>
<script src="{{ asset('dashboard/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/JS/app.js') }}"></script>
@yield('foot')
</body>

</html>
