@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

    <!doctype html>
@php
    $configData = Helper::applClasses();
@endphp
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Global Sentinel Traftoll Platform</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset(mix('vendors/css/marketing/css/bootstrap.min.css'))}}" rel="stylesheet">
    <link href="{{ asset(mix('vendors/css/marketing/css/style.css'))}}" rel="stylesheet">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


    {{--     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}


</head>


<body>


<header class="main_header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="{{ asset(mix('images/marketing/images/logo.svg'))
            }}"></a>
            <div class="navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    @if(Route::current()->getName() !== 'homepage')
                        <li>
                            <a class="return_btn" href="{{route('homepage')}}"><img src="{{ asset(mix
                        ('images/marketing/images/arrow-left.svg'))}}"> Return Home</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="gs_btn" href="/login">Login to Dashboard</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>


@yield('content')


<footer class="footer_main" id="contact">
    <div class="container">
        <div class="footer_top">
            <div class="footer_logo">
                <a href="{{route('homepage')}}"><img src="{{ asset(mix('images/marketing/images/footer-logo.svg'))
                }}"></a>
            </div>
            <div class="footer_cont">
                <p style="color:#fff;">Suite 13A, City Plaza, Plot 596, Ahmadu Bello Way, Area 11, Garki, Abuja.</p>
                <a href="tel:08032898122">08032898122</a>
                <a href="mailto:info@globalsentinel.co">info@globalsentinel.co</a>
            </div>
        </div>
        <div class="footer_bottom">
            <p>&copy; 2023 Global Sentinel, All Rights Reserved.</p>
            <div class="footer_icon">
                <a href="#"><img src="{{ asset(mix('images/marketing/images/twitter.svg'))}}"></a>
                <a href="#"><img src="{{ asset(mix('images/marketing/images/linkdin.svg'))}}"></a>
            </div>
        </div>
    </div>
    <img src="{{ asset(mix('images/marketing/images/footer-bg.png'))}}" class="footer-bg">
</footer>


</body>
</html>

{{-- include default scripts --}}
@include('panels/scripts')


<!-- vendor files -->
<script src="{{ asset(mix('vendors/js/marketing/js/bootstrap.bundle.min.js'))}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



