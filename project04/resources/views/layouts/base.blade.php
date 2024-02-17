<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('icons-1.11.0\font\bootstrap-icons.min.css')}}">
    <title>
        @yield('title')
    </title>
</head>
<body>
    <!-- Header - Giong nhau -->
    <div class="container">
        @include('layouts.header')
    </div>
    <!-- Main Content - Khac nhau -->
    <div class="container g-0">
        @yield('main')
    </div>
    <!-- Footer - Giong nhau -->
    <div class="container">
        @include('layouts.footer')
    </div>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
</body>
</html>