<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.headapp')
</head>
    <body>
        @include('includes.navbarapp')
        @yield('content')
        @include('includes.footerapp')
    </body>
</html>
