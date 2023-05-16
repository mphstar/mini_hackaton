<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/shared/iconly.css') }}">

</head>

<body>
    <div id="app">
        {{-- sidebar --}}
        @include('admin.sidebar')

        @yield('main')

    </div>
    <script src="{{ asset('admin/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    {{-- <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ asset('sweetalert2.min.js') }}"></script>
    @yield('otherjs')

</body>

</html>
