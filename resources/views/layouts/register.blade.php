<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', trans('general.site.title')) - {{ trans('general.site.name') }}</title>
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