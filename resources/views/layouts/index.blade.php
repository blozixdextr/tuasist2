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
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->


<!-- Navigation & Logo-->
<div class="header-empty col-lg-12">
    <div class="logo-wrapper"><a href="/"><span>Túasist.es</span></a></div>

    <div class="links">
        <a class="loginn hvr-fade" href="/auth/login">{{ trans('general.login') }}</a>
        <a class="registerr hvr-fade" href="/register">{{ trans('general.register') }}</a>
    </div>

</div>


<div class="col-lg-12 mySlide">
    <div class="shadowFon">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titleText">
                        <h1>{{ trans('home.slogan') }}.</h1>
                        <h3>{!! trans('home.subslogan') !!}</h3>

                    </div>
                </div>
                <div class="col-md-6 buttons">
                    <div class="calltoaction-wrapper">
                        <h3 style="line-height: 42px;">Want earn money?</h3> <a href="/register/tasker" class="hvr-fade"><i class="fa fa-money"></i> Become a Tasker - <i>It's free</i></a>

                    </div>
                </div>
                <div class="col-md-6 buttons">
                    <div class="calltoaction-wrapper">
                        <h3 style="line-height: 42px;">Ready to live smarter?</h3> <a href="/register/client" class="hvr-fade"><i class="fa fa-print"></i> Post Your Task - <i>It's free</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="slider" class="slider_wrap">
        <img alt="Image 1" class="active" src="/assets/app/img/1slide.jpg" />
        <img alt="Image 2" src="/assets/app/img/2slide.jpg" />
        <img alt="Image 2" src="/assets/app/img/3slide.jpg" />
    </div>
</div>




<!-- Homepage Slider -->


<!-- Services -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">
                    <img src="/assets/app/img/service-icon/1.png" alt="Service 1">
                    <h3 style="font-size: 180%;">Fast</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">Describe your task and get offers from taskers in 2-3 minutes.</p>

                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">
                    <img src="/assets/app/img/service-icon/2.png" alt="Service 2">
                    <h3 style="font-size: 180%;">Safe</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">We provide Verified taskers. Read real reviews of these taskers.</p>

                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">
                    <img src="/assets/app/img/service-icon/3.png" alt="Service 3">
                    <h3 style="font-size: 180%;">Profitably</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">Save up to 50% on standart services. Don't waste your money.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services -->

<!-- Call to Action Bar -->
<div class="section hoffman">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="calltoaction-wrapper">
                    <h3>We connects you with rated, reviewed and verified local service providers, or Taskers in our lingo. Our Taskers are dedicated to completing your daily errands, allowing you to focus less on your to-do list and more on life.</h3>
                    <h3>Túasist.es is currently active in Malaga province</h3> <a href="/register" class="hvr-fade loginn">Join for
                        <em>free</em></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Call to Action Bar -->
<!--  <div class="section">
     <div class="container">
         <div class="row">
             <div class="col-md-6"></div>
             <div class="col-md-6"></div>
             <div class="col-md-6"></div>
             <div class="col-md-6"></div>
         </div>
     </div>
 </div> -->
<div class="section">
    <div class="container mainBlocks">
        <div class="row">
            <div class="col-md-12">
                <center><h1 style="font: 42px 'Crete Round'; text-shadow: 1px 1px 1px white, -1px 1px 1px white;">How <i>túasist.es</i> works</h1>
                </center>
            </div>
        </div>
        <div class="row mainContent_1">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="service-image-1">
                    </div>
                </div>
                <div class="col-lg-6 main_padding">

                    <i class="fa fa-male" style="font-size:500%"></i> <i class="fa fa-commenting-o" style="font-size:500%"></i>
                    <h3>You tell us about the work you need completed.</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">
                        The more we know about the size and scope of your job, the more accurately we can find the right pros for the work.
                    </p>
                </div>
            </div>
        </div>

        <div class="row mainContent_2">
            <div class="col-lg-12">
                <div class="col-lg-6 hidden-xs hidden-md hidden-sm main_padding">
                    <i class="fa fa-male" style="font-size:500%"></i><i class="fa fa-female" style="font-size:500%"></i>
                    <h3>We match you with the right pros for the job.</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">
                        We match you with background-checked pros whose expertise is just right for your request. Their responses go directly to your inbox.
                    </p>
                </div>
                <div class="col-lg-6 hidden-xs hidden-md hidden-sm">
                    <div class="service-image-2">
                    </div>
                </div>

                <div class="col-md-12 hidden-lg">
                    <div class="service-image-2">
                    </div>
                </div>
                <div class="col-md-12 hidden-lg main_padding">

                    <h3>We match you with the right pros for the job.</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">
                        We match you with background-checked pros whose expertise is just right for your request. Their responses go directly to your inbox.
                    </p>
                </div>


            </div>
        </div>
        <div class="row mainContent_3">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="service-image-3">
                    </div>
                </div>
                <div class="col-lg-6 main_padding">
                    <i class="fa fa-users" style="font-size:500%"></i><i class="fa fa-hand-pointer-o" style="font-size:500%"></i>
                    <h3>You select the tasker that works best for you.</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">
                        Read their reviews. Ask them questions. Decide if the price is within your budget. You own the selection of the right tasker for your home's needs.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mainContent_4">
            <div class="col-lg-12">
                <div class="col-lg-6 hidden-xs hidden-md hidden-sm main_padding">
                    <i class="fa fa-wrench" style="font-size:500%"></i> <i class="fa fa-check-square-o" style="font-size:500%"></i>
                    <h3>Your tasker completes the work.</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">
                        We match you with verified taskers whose expertise is just right for your request. Their responses go directly to your inbox.
                    </p>
                </div>
                <div class="col-lg-6 hidden-xs hidden-md hidden-sm">
                    <div class="service-image-4">
                    </div>
                </div>
                <div class="col-md-12 hidden-lg">
                    <div class="service-image-4">
                    </div>
                </div>
                <div class="col-md-12 hidden-lg main_padding">
                    <h3>Your tasker completes the work.</h3>
                    <p style="font-family: 'Open Sans', sans-serif;">
                        We match you with verified taskers whose expertise is just right for your request. Their responses go directly to your inbox.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Footer -->
<div class="footer_new hoffman">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-copyright">&copy; túasist.es 2015 All rights reserved.</div>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts -->
@include('includes.bodyend')
@yield('body-js')

</body>
</html>