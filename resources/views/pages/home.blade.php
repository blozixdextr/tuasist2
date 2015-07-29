@extends('layouts.index')

@section('header')
    @include('includes.sliders.home')
@endsection


@section('content')

    <div class="loading-container">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <div class="content-wrapper hide-until-loading">
        <div class="section-content top-body">
            <div class="container">
                <div class="row">
                    <div class="content-wrapper hide-until-loading"><div class="body-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 animated" data-animtype="fadeInUp"
                                         data-animrepeat="0"
                                         data-speed="1s"
                                         data-delay="0.4s">
                                        <h2 class="h2-section-title">Our Beliefs</h2>
                                        <div class="i-section-title">
                                            <i class="icon-heart ">

                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-sep20"></div>

                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="title-block clearfix">
                                            <h3 class="h3-body-title">Better Fitness Better Life</h3>
                                            <div class="title-seperator"></div>
                                        </div>
                                        <p>
                                            Here at Better Fitness Better Life, we believe that each person has the ability to live a quality way of life by maintaining a healthier lifestyle. Every meal, every snack and every drink that we consume has one of two consequences, it’s either working with our body supporting all our vital organs so that we can function at an optimal level, or it is working fighting against our body trying to destroy it. It’s that simple!<br><br>
                                            At BFBL, we will teach you the right foods to eat that will not only help to support your body, but also to help melt away that unnecessary fat that most of us have. We will also teach you our 3 day a week work-out plan that is guaranteed to build muscle tone while building a stronger all around you. By making this lifestyle change you will not only look better on outside, but you will feel better on the inside, and that is the key to feeling younger and living a long and healthy life. <br><br>
                                            <a href="/about-us" class="btn btn-primary" role="button">Read more</a>
                                        </p>
                                    </div>

                                    <div class="col-md-8 col-sm-8">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/bJJHkJjPXWU?autoplay=0&amp;rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                        </div>

                                    </div>

                                </div>

                                <div class="space-sep40"></div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 animated" data-animtype="flipInY"
                     data-animrepeat="0"
                     data-speed="1s"
                     data-delay="0.5s">
                    <h2 class="h2-section-title">Delicious Recipes</h2>

                    <div class="i-section-title">
                        <i class="icon-files">

                        </i>
                    </div>

                    <div class="space-sep20"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portfolio-items">

                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated seo"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="0.6s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="/images/placeholders/portfolio1.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="/images/placeholders/portfolio1.html"
                                       data-rel="prettyPhoto[portfolio]" title="The Ultimate Breakfast"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#">The Ultimate Breakfast</a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated seo"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="0.8s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio2.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio2.html"
                                       data-rel="prettyPhoto[portfolio]" title="Sweet Potato Zuppa"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#"> Sweet Potato Zuppa </a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated seo"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="1s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio3.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio3.html"
                                       data-rel="prettyPhoto[portfolio]" title="Tuna Trifecta"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#"> Tuna Trifecta </a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated branding"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="1.2s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio4.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio4.html"
                                       data-rel="prettyPhoto[portfolio]" title="Squash and Chicken Casserole"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#"> Squash and Chicken Casserole</a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated branding"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="1.4s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio5.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio5.html"
                                       data-rel="prettyPhoto[portfolio]" title="Mean Lean Protein Smoothie"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#">Mean Lean Protein Smoothie</a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated branding"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="1.6s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio6.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio6.html"
                                       data-rel="prettyPhoto[portfolio]" title="Monster Fajita Wraps"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#">Monster Fajita Wraps</a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated branding"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="1.8s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio7.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio7.html"
                                       data-rel="prettyPhoto[portfolio]" title="Sinless Blueberry Cheesecake"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#">Sinless Blueberry Cheesecake</a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->
                        <!-- Portfolio Item -->
                        <div class="thumb-label-item animated web-design"
                             data-animtype="fadeInUp"
                             data-animrepeat="0"
                             data-speed="1s"
                             data-delay="2s">
                            <div class="img-overlay thumb-label-item-img">
                                <img
                                        src="images/placeholders/portfolio8.html"
                                        alt=""/>

                                <div class="item-img-overlay">
                                    <a class="portfolio-zoom fa fa-plus"
                                       href="images/placeholders/portfolio8.html"
                                       data-rel="prettyPhoto[portfolio]" title="Meatloaf with Asparagus"></a>

                                    <div class="item_img_overlay_content">
                                        <h3 class="thumb-label-item-title">
                                            <a href="#">Meatloaf with Asparagus</a>
                                        </h3>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <!-- //Portfolio Item// -->


                    </div>
                </div>
            </div>

        </div>
        <div class="space-sep40"></div>
        @if (Session::get('subscribe.skip'))
            @if (Session::has('subscribe.success'))
                <h2 class="h2-section-title animated" data-animtype="flipInY"
                    data-animrepeat="0"
                    data-speed="1s"
                    data-delay="0.2s" style="background-color:green; padding: 15px 0; color: white;" id="tabc3">
                    {{ Session::get('subscribe.success') }}
                </h2>
            @endif
        @else
            <div class="section-content section-tabs section-px stones-bg white-text">
                <div class="tab-container">
                    <div class="section-tab-arrow"></div>
                    <div class="section-etabs-container">
                        <ul class="section-etabs">
                            <li class="tab">
                                <a href="#tabc3">Don't let your excuses catch up!</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="tab-content">
                            <div id="tabc3">
                                @if (Session::has('subscribe.error'))
                                    <h2 class="h2-section-title animated" data-animtype="flipInY"
                                        data-animrepeat="0"
                                        data-speed="1s"
                                        data-delay="0.2s" style="background-color:red; padding: 15px 0">
                                        {{ Session::get('subscribe.error') }}
                                    </h2>
                                @else
                                <h2 class="h2-section-title animated" data-animtype="flipInY"
                                    data-animrepeat="0"
                                    data-speed="1s"
                                    data-delay="0.2s">
                                    Subscribe To Our Newsletter Today.
                                </h2>
                                @endif
                                <div class="section-subscribe animated" data-animtype="flipInX"
                                     data-animrepeat="0"
                                     data-speed="1s"
                                     data-delay="0.5s">

                                    <!-- Begin MailChimp Signup Form -->

                                    <div id="mc_embed_signup">
                                        <form action="/subscribe" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
                                            <div id="mc_embed_signup_scroll">
                                                {{ csrf_field() }}
                                                <input type="email" value="" name="email" class="email text-input" id="mce-EMAIL" placeholder="Email Address"style="color:black">
                                                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="margin-top:15px"></div>
                                            </div>
                                        </form>
                                    </div>

                                    <!--End mc_embed_signup-->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="section-content no-padding">


            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-sm-12 animated" data-animtype="fadeInUp"
                         data-animrepeat="0"
                         data-speed="1s"
                         data-delay="0.4s">
                        <h2 class="h2-section-title">Better Fitness Better Life is your key to success!</h2>

                        <div class="i-section-title">
                            <i class="icon-barbell ">

                            </i>
                        </div>

                        <h3 class="h3-section-info">
                            The only thing more painful than learning from experience is not learning from it. Take these lessons to heart and save valuable time, money, and reps!
                        </h3>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 no-bottom-margin animated" data-animtype="fadeInUp"
                         data-animrepeat="0"
                         data-animspeed="1s"
                         data-animdelay="0.7s">
                        <img src="/assets/images/BetterFitnessBetterLifeBook.png" alt="Better Fitness Better Life Book" class="img-responsive" />
                    </div>
                </div>
            </div>
        </div>
        <div class="space-sep40"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 animated" data-animtype="fadeInUp"
                     data-animrepeat="0"
                     data-speed="1s"
                     data-delay="0.4s">
                    <h2 class="h2-section-title">Index</h2>

                    <div class="i-section-title">
                        <i class="icon-drive">
                        </i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="title-block clearfix">
                        <h3 class="h3-body-title">Lifestyle</h3>
                        <div class="title-seperator"></div>
                    </div>
                    <div class="accordion" data-toggle="on" data-active-index="">
                        <div class="accordion-row">
                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>Lifestyle Eating Habits</h4>
                            </div>
                            <div class="desc">Here at Better Fitness Better Life, we don’t like to use the term diet, because when people think of diet, they think of short term, and we all know that once the diet is over, so is the weight control. Better Fitness Better Life is a lifestyle change. It is a long term investment that will benefit you both today and when you reach old age. We will teach you a simple step-by-step program that lays out all the things that you can eat, and all the things not to eat. By eating the right foods your body will begin to melt away the fat while helping you build muscle tone. You will not only look better on the outside, but you will feel better physically and mentally. When you start eating all the right foods, your body starts to receive all the vitamins and nutrients that your body needs to function at an optimum level. Stop spending your money on pills trying to get the vitamins and nutrients your body needs when you can get them just by picking the right foods at the grocery store, and we all know those are the best kind. </div>
                        </div>
                        <div class="accordion-row">
                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>Healthy Recipes</h4>
                            </div>
                            <div class="desc">We’ll provide you with dozens of healthy recipes that are packed with the vitamins and nutrients that your body needs to function at optimum level, and they taste amazing! Our list of recipes will cover a wide variety of breakfast, lunch, dinner and deserts. With our list of recipes you’ll be able to prepare three meals a day without taking any cooking classes or spending hours preparing for a meal. Along with all this we’ll include a couple of smoothies recipes that are packed with the right protein and nutrients that your body needs to help build muscle tone. We’ll also include a list spices that you should include every day in your new life style. The benefits that these spices offer will help you maintain a healthy lifestyle.</div>
                        </div>
                        <div class="accordion-row">

                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>Membership</h4>
                            </div>
                            <div class="desc">As a member you’ll have access with your own user name and password 24/7 to all articles and videos related to health and fitness. Along with your membership you’ll receive monthly newsletters to help you reach your full potential, learn little habits that are easy to implement into your daily routine that will improve your overall health.</div>
                        </div>


                    </div>            </div>
                <div class="col-md-6 col-sm-6">
                    <div class="title-block clearfix">
                        <h3 class="h3-body-title">Fitness</h3>
                        <div class="title-seperator"></div>
                    </div><div class="accordion" data-toggle="on" data-active-index="">


                        <div class="accordion-row">

                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>Workout Plan</h4>
                            </div>
                            <div class="desc">A step-by-step 3 day a week workout plan that guarantees to build muscle, improve endurance and tone the body. By following this simple workout plan (certified by a Navy Seal) you will see improvements in all areas week after week after week. The improves will be so apparent that you'll look forward to your next workout. </div>
                        </div>


                        <div class="accordion-row">

                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>Articles and Videos</h4>
                            </div>
                            <div class="desc">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</div>
                        </div>


                        <div class="accordion-row">

                            <div class="title">
                                <div class="open-icon"></div>
                                <h4>Dashboard and Trackers</h4>
                            </div>
                            <div class="desc">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.</div>
                        </div>


                    </div>            </div>


            </div>
        </div>
    </div>

    <div class="testimonial-big">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-10">
                    <div class="testimonial-big-text animated" data-animtype="fadeInRight"
                         data-animrepeat="1"
                         data-speed="1s"
                         data-delay="0s">
                        To keep the body in good health is a duty... otherwise we shall not be able to keep our mind strong and clear, which is perhaps the most important ingredient to living a happy, healthy and rewarding life.


                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <div class="testimonial-big-img animated" data-animtype="fadeInLeft"
                         data-animrepeat="1"
                         data-speed="1s"
                         data-delay="0s">
                        <img src="images/side_chest.png" alt=""/>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection