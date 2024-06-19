<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
    <!--------------- header-------------- -->
    <header id="header">
        @include('parts.header')
    </header>
    @yield('content')
    @include('parts/hotproduct')
    @include('parts/populer_products')
    <!-- Footer -->
    @include('parts/footer')
    <script src="{{ asset('frontend/asset/js/scrip.js') }}"></script>
</body>
</html>