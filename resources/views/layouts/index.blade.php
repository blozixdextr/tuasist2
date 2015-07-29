<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'tuasist')</title>
        @include('includes.head.meta')
        @include('includes.head.styles')
        @include('includes.head.scripts')
        @include('includes.head.ga')
        @yield('head-style')
        @yield('head-js')
    </head>
    <body>
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
        @include('includes.bodyend')
        @yield('body-js')
    </body>
</html>