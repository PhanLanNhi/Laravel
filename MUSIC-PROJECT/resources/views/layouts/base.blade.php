<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>
        <!-- Khac nhau giua cac Trang -->
        @yield('title')
    </title>
</head>
<body>
    <!-- Header - Giong nhau -->
    @include('layouts.header')
    <!-- Main Content - Khac nhau -->
    <div class="container-fluid">
        @yield('main')
    </div>
    <!-- Footer - Giong nhau -->
    @include('layouts.footer')
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
</body>
</html>