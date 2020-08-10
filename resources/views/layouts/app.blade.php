<!doctype html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stack('custom-css')

<title>@yield('title')</title>
</head>

<body>
    @include('includes.navbar')
    @include('includes.alert')

    @yield('content')

    @include('includes.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('custom-script')
</body>

</html>