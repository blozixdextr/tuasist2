@extends('layouts.index')

@section('header')
    <div class="top-title-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="page-info">
                        <h1 class="h1-page-title">Mission</h1>

                        <h2 class="h2-page-desc">
                            Empowering Individuals Seeking a Healthier and Better Lifestyle
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="loading-container">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <div class="content-wrapper hide-until-loading"><div class="body-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 animated" data-animtype="fadeInUp"
                         data-animrepeat="0"
                         data-speed="1s"
                         data-delay="0.4s">
                        <h2 class="h2-section-title">Our Mission</h2>
                        <div class="i-section-title">
                            <i class="icon-feather">

                            </i>
                        </div>
                    </div>
                </div>

                <div class="space-sep20"></div>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="title-block clearfix">
                            <h3 class="h3-body-title">Better Fitness Better Life</h3>
                            <div class="title-seperator"></div>
                        </div>
                        <p>
                            Here at Better Fitness Better Life, we believe that each person has the ability to live a quality way of life by maintaining a healthier lifestyle. Every meal, every snack and every drink that we consume has one of two consequences, it’s either working with our body supporting all our vital organs so that we can function at an optimal level, or it is working fighting against our body trying to destroy it. It’s that simple!<br><br>
                            At BFBL, we will teach you the right foods to eat that will not only help to support your body, but also to help melt away that unnecessary fat that most of us have. We will also teach you our 3 day a week work-out plan that is guaranteed to build muscle tone while building a stronger all around you. By making this lifestyle change you will not only look better on outside, but you will feel better on the inside, and that is the key to feeling younger and living a long and healthy life. <br><br>
                            By following our program you will also notice significant improvements on your endurance, your core strength, coordination, heart health, immune system, increasing libido, uplifting moods and so much more. By having a strong and healthy inside, your body has the ability to fight off illnesses and diseases that so many people are prone to. Have you noticed how so few people today die of old age? <br><br>
                            You have the power to improve your health which results into a better life; this is the Better Fitness Better Life way!<br><br>
                        </p>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/MneDpPcxphY?autoplay=1&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

                <div class="space-sep40"></div>


            </div>






        </div>


    </div>
@endsection


@section('after-wrapper')
    @include('includes.clients')
@endsection