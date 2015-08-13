<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
    @yield('pre-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('pre-footer')
    @include('includes.footer')
    @include('includes.bodyend')
    @yield('body-js')
</body>
</html>