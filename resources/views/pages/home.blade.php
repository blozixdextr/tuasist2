@extends('layouts.index')

@section('head-style')
   <link rel="stylesheet" href="/assets/app/css/views/for-landing.css">
@endsection

@section('body-js')
   <script src="/assets/app/js/slider.js"></script>
@endsection

@section('content')

   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 mySlide">
            <div class="shadowFon">
               <div class="container">
                  <div class="row">
                     <div class="header-empty col-lg-12">
                        <div class="logo-wrapper"><a href="/"><span>Túasist.es</span></a></div>
                        <div class="links">
                           @if (Auth::user())
                              welcome, <a href="/profile">{{ Auth::user()->name }}</a> <a class="loginn hvr-fade" href="/auth/logout">Logout</a>
                           @else
                              <a class="loginn hvr-fade" href="/auth/login">{{ trans('general.login') }}</a>
                              <a class="registerr hvr-fade" href="/register">{{ trans('general.register') }}</a>
                           @endif
                        </div>

                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="titleText">
                           <h1>{!! trans('home.slogan')  !!}.</h1>
                           <h3>{!! trans('home.subslogan')  !!}</h3>
                        </div>
                     </div>
                     <div class="col-md-6 buttons">
                        <div class="calltoaction-wrapper">
                           <h3>{!! trans('home.invite.tasker.title') !!}</h3>
                           <a href="/register/tasker" class="hvr-fade"><i class="fa fa-money"></i> {!! trans('home.invite.tasker.link') !!}</a>
                        </div>
                     </div>
                     <div class="col-md-6 buttons">
                        <div class="calltoaction-wrapper">
                           <h3>{!! trans('home.invite.client.title') !!}</h3>
                           <a href="/register/client" class="hvr-fade"><i class="fa fa-print"></i> {!! trans('home.invite.client.link') !!}</a>
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
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="section needPadding">
            <div class="container">
               <div class="row">
                  <div class="col-md-4 col-sm-6">
                     <div class="service-wrapper">
                        <img src="/assets/app/img/service-icon/1.png" alt="Service 1">
                        <h3>{!! trans('home.feature.fast.title') !!}</h3>
                        <p>{!! trans('home.feature.fast.subtitle') !!}</p>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                     <div class="service-wrapper">
                        <img src="/assets/app/img/service-icon/2.png" alt="Service 2">
                        <h3>{!! trans('home.feature.safe.title') !!}</h3>
                        <p>{!! trans('home.feature.safe.subtitle') !!}</p>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6">
                     <div class="service-wrapper">
                        <img src="/assets/app/img/service-icon/3.png" alt="Service 3">
                        <h3>{!! trans('home.feature.profitably.title') !!}</h3>
                        <p>{!! trans('home.feature.profitably.subtitle') !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="section hoffman">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="calltoaction-wrapper">
                        <h3>{!! trans('home.about.title') !!}</h3>
                        <h3>{!! trans('home.about.limitation') !!}</h3>
                        <a href=/register" class="hvr-fade loginn">{!! trans('home.about.link') !!}</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="section howTuasistWork">
            <div class="container mainBlocks">
               <div class="row">
                  <div class="col-md-12">
                     <center>
                        <h1>{!! trans('home.how_works.title') !!}</h1>
                     </center>
                  </div>
               </div>
               <div class="row mainContent_1">
                  <div class="col-lg-12">
                     <div class="col-lg-6">
                        <div class="service-image-1"></div>
                     </div>
                     <div class="col-lg-6 main_padding">
                        <i class="fa fa-male"></i> <i class="fa fa-commenting-o"></i>
                        <h3>{!! trans('home.how_works.step1.title') !!}</h3>
                        <p>{!! trans('home.how_works.step1.subtitle') !!}</p>
                     </div>
                  </div>
               </div>

               <div class="row mainContent_2">
                  <div class="col-lg-12">
                     <div class="col-lg-6 hidden-xs hidden-md hidden-sm main_padding">
                        <i class="fa fa-male" ></i><i class="fa fa-female"></i>
                        <h3>{!! trans('home.how_works.step2.title') !!}</h3>
                        <p>{!! trans('home.how_works.step2.subtitle') !!}</p>
                     </div>
                     <div class="col-lg-6 hidden-xs hidden-md hidden-sm">
                        <div class="service-image-2"></div>
                     </div>
                     <div class="col-md-12 hidden-lg">
                        <div class="service-image-2">
                        </div>
                     </div>
                     <div class="col-md-12 hidden-lg main_padding">
                        <h3>{!! trans('home.how_works.step2.title') !!}</h3>
                        <p>{!! trans('home.how_works.step2.subtitle') !!}</p>
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
                        <i class="fa fa-users" ></i><i class="fa fa-hand-pointer-o" ></i>
                        <h3>{!! trans('home.how_works.step3.title') !!}</h3>
                        <p>{!! trans('home.how_works.step3.subtitle') !!}</p>
                     </div>
                  </div>
               </div>
               <div class="row mainContent_4">
                  <div class="col-lg-12">
                     <div class="col-lg-6 hidden-xs hidden-md hidden-sm main_padding">
                        <i class="fa fa-wrench" ></i> <i class="fa fa-check-square-o" ></i>
                        <h3>{!! trans('home.how_works.step4.title') !!}</h3>
                        <p>{!! trans('home.how_works.step4.subtitle') !!}</p>
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
                        <h3>{!! trans('home.how_works.step4.title') !!}</h3>
                        <p>{!! trans('home.how_works.step4.subtitle') !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row">
         <div class="footer_new hoffman">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="footer-copyright">&copy; túasist.es 2015 {{ trans('general.rights_reserved') }}.</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection