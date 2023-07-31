<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('website/css/index.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


    @livewireStyles

</head>

@include('website.layouts.header')
@yield('style')
</head>

<body>
    @include('website.layouts.navbar')
    @yield('content')
    @include('website.layouts.footer')
    @include('website.layouts.footer-scripts')

    <script src="{{ asset('website/js/index.js') }}"></script>
    <script src="{{ asset('website/js/jquery.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



    @stack('js')
  
    @livewireScripts


</body>

</html>
