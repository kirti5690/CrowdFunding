<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from qrowd-html.vercel.app/main-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:32:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home One || Qrowd || Qrowd HTML 5 Template </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <!-- <link rel="manifest" href="assets/images/favicons/site.webmanifest" /> -->
    <meta name="description" content="Qrowd HTML 5 Template " />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/qrowd-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/qrowd.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />

    <link rel="stylesheet" href="assets/css/qrowd-responsive.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <!-- <div class="preloader">
        <div class="preloader__image"></div>
    </div>  -->


    <div class="page-wrapper">
        <?php
         include_once 'header.php'
        ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Main Slider Start-->
        <section class="main-slider clearfix">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 3000
                }}'>
                <div class="swiper-wrapper banner">
                </div>

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <i class="icon-right-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <i class="icon-right-arrow"></i>
                    </div>
                </div>

            </div>
        </section>
        <!--Main Slider End-->

        <!--Categories One Start-->
        <section class="categories-one">
            <div class="container">
                <div class="categories-one__top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7">
                            <div class="categories-one__top-left">
                                <div class="section-title text-left">
                                    <span class="section-title__tagline">People around the world are raising money for different social issues.</span>
                                    <h2 class="section-title__title">Browse Campaigns By Category</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="categories-one__backers ">
                        <div class="categories-one__backers-tagline">
                            <p>Charity Platfrom.</p>
                        </div>
                        <div class="categories-one__backers-box">
                            <div class="categories-one__backers-icon">
                                <span class="icon-computer"></span>
                            </div>
                            <div class="categories-one__backers-content">
                                <h3 class="odometer" data-count="37400">00</h3>
                                <p>Donors Rate</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="categories-one__bottom">
                    <div class="categories-one__bottom-inner">
                        <div class="row">
                            <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                                <div class="categories-one__single category-link" data-category="Medical">
                                    <div class="categories-one__icon">
                                    <span ><i class="fa-solid fa-suitcase-medical"></i></span>
                                       
                                    </div>
                                    <h4 class="categories-one__title">Medical</h4>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="200ms">
                                <div class="categories-one__single category-link" data-category="Education">
                                    <div class="categories-one__icon">
                                    <span ><i class="fa-solid fa-book"></i></span>
                                    </div>
                                    <h4 class="categories-one__title">Education</h4>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="300ms">
                                <div class="categories-one__single category-link" data-category="Animal">
                                    <div class="categories-one__icon">
                                        <span ><i class="fa-solid fa-paw"></i></span>
                                    </div>
                                    <h4 class="categories-one__title">Animal</h4>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="400ms">
                                <div class="categories-one__single category-link" data-category="Enviorment">
                                    <div class="categories-one__icon">
                                        <span ><i class="fa-solid fa-leaf"></i></span>
                                    </div>
                                    <h4 class="categories-one__title">Enviorment</h4>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="500ms">
                                <div class="categories-one__single category-link" data-category="Poverty">
                                    <div class="categories-one__icon">
                                        <span ><i class="fa-solid fa-child"></i></span>
                                    </div>
                                    <h4 class="categories-one__title">Poverty</h4>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="600ms">
                                <div class="categories-one__single category-link" data-category="Charity">
                                    <div class="categories-one__icon">
                                        <span ><i class="fa-solid fa-hand-holding-heart"></i></span>
                                    </div>
                                    <h4 class="categories-one__title">Charity</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="categories-one__bottom-text">Discover projects just for you and get great recommendations
                        when you <span>select your interests.</span> </p>
                </div>
            </div>
        </section>
        <!--Categories One End-->

        <!--Project One Start-->
        <section class="project-one">
            <div class="container">
                <div class="project-one__top">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">Take Initiative</span>
                        <h2 class="section-title__title">Check For Campaigns, Donate<br> now </h2>
                    </div>
                </div>
                <div class="project-one__bottom  ">
                <div class="project-one__carousel owl-carousel  owl-theme thm-owl__carousel raise" data-owl-options='{
                        "loop": true,
                        "autoplay": false,
                        "margin": 30,
                        "nav": false,
                        "dots": true,
                        "smartSpeed": 500,
                        "autoplayTimeout": 10000,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 2
                            },
                            "992": {
                                "items": 3
                            },
                            "1200": {
                                "items": 3
                            }
                        }
                    }'>
                   </div>
                </div>
            </div>
        </section>
        <!--Project One End-->

        <div class="black-bg background-repeat-no background-position-top-right"
            style="background-image: url(assets/images/shapes/why-choose-funfact-bg-1-1.png);">
            <!--Why Choose One Start-->
            <section class="why-choose-one">
                <div class="container">
                    <div class="why-choose-one__inner">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="why-choose-one__left">
                                    <div class="section-title text-left">
                                        <span class="section-title__tagline">Our Platform Benefits</span>
                                        <h2 class="section-title__title">Why you Should Choose <br> Qrowd Platform </h2>
                                    </div>
                                    <div class="why-choose-one__left-text">
                                        <p>Qrowd Platform is your go-to crowdfunding solution, designed to help you bring your ideas to life. Whether you’re launching a new product, supporting a cause, or starting a business, Qrowd connects you with a global community of backers eager to support innovative projects.</p>
                                    </div>
                                    <ul class="why-choose-one__points list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <i class="icon-check-mark"></i>
                                            </div>
                                            <div class="content">
                                                <h3 class="title">100% Success Rates</h3>
                                                <p class="text">Provide great funds to thr raisers.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="icon-check-mark"></i>
                                            </div>
                                            <div class="content">
                                                <h3 class="title">Millions of Donors</h3>
                                                <p class="text">Millions of people take initiative.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="contact.html" class="thm-btn">Sign Up</a>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="why-choose-one__right">
                                    <div class="why-choose-one__img-box">
                                        <div class="why-choose-one__img" style="height :700px;">
                                            <img class="h-100" src="assets/images/campaign/poor3.jpg" alt="">
                                        </div>
                                        <div class="why-choose-one__trusted">
                                            <p>Trusted by more <br> than <span class="odometer"
                                                    data-count="3500">00</span>
                                                <br>
                                                clients</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.why-choose-one__inner -->
                </div>
            </section>
            <!--Why Choose One End-->

            <!--Counter One Start-->
            <section class="counter-one">
                <div class="container">
                    <div class="row">
                        <!--Counter One Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="counter-one__border-left"></div>
                                    <div class="counter-one__border-right"></div>
                                    <div class="counter-one__icon">
                                        <span class="icon-verified"></span>
                                    </div>
                                    <div class="counter-one__count-box">
                                        <h3 class="odometer" data-count="790">00</h3>
                                        <p class="counter-one__text">Event Organized</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Counter One Single End-->
                        <!--Counter One Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="counter-one__border-left"></div>
                                    <div class="counter-one__border-right"></div>
                                    <div class="counter-one__icon">
                                        <span class="icon-business"></span>
                                    </div>
                                    <div class="counter-one__count-box">
                                        <h3 class="odometer" data-count="260">00</h3>
                                        <p class="counter-one__text">Funded Campaigns</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Counter One Single End-->
                        <!--Counter One Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="counter-one__border-left"></div>
                                    <div class="counter-one__border-right"></div>
                                    <div class="counter-one__icon">
                                        <span class="icon-stand-out"></span>
                                    </div>
                                    <div class="counter-one__count-box">
                                        <h3 class="odometer" data-count="86">00</h3>
                                        <span class="counter-one__letter">k</span>
                                        <p class="counter-one__text">Visitors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Counter One Single End-->
                        <!--Counter One Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="counter-one__border-left"></div>
                                    <div class="counter-one__border-right"></div>
                                    <div class="counter-one__icon">
                                        <span class="icon-coaching"></span>
                                    </div>
                                    <div class="counter-one__count-box">
                                        <h3 class="odometer" data-count="940">00</h3>
                                        <p class="counter-one__text">Volunteers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Counter One Single End-->
                    </div>
                </div>
            </section>
            <!--Counter One End-->
        </div><!-- /.black-bg -->



        <section class="recommended-one">
            <div class="container">
                <div class="recommended-one__top">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">Businesses You Can Back</span>
                        <h2 class="section-title__title">Recommended for you <br> Fresh Projects</h2>
                    </div>
                </div>
                <div class="recommended-one__bottom">
                    <div class="recommended-one__carousel owl-carousel owl-theme thm-owl__carousel  bottom" data-owl-options='{
                        "loop": true,
                        "autoplay": false,
                        "margin": 30,
                        "nav": false,
                        "dots": true,
                        "smartSpeed": 500,
                        "autoplayTimeout": 10000,
                        "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "768": {
                                "items": 2
                            },
                            "992": {
                                "items": 3
                            },
                            "1200": {
                                "items": 3
                            }
                        }
                   }'>
                      
                     
                    </div>
                </div>
            </div>
        </section>

        <!--Individuals Work Start-->
        <section class="individuals-work">
            <div class="individuals-work__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(assets/images/campaign/s1.jpg);"></div>
            <div class="container">
                <div class="individuals-work__inner">
                    <div class="individuals-work__video-link">
                        <a href="https://www.youtube.com/watch?v=CiFoHm7HD94" class="video-popup">
                            <div class="individuals-work__video-icon">
                                <span class="fa fa-play"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <h3 class="individuals-work__title">Qrowd is evolving the way
                        <br>individuals works</h3>
                </div>
            </div>
        </section>
        <!--Individuals Work End-->

        <!--Testimonial One Start-->
        <section class="testimonial-one">
            <div class="container">
               
                    <div class="testimonial-one__main-content">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="testimonial-one__main-content-left">
                                    <div class="testimonial-one__main-content-img" style="height:500px; width:400px;">
                                        <img  src="assets/images/extra/side-img.jpg"
                                            alt="" style="height:530px; width: 500px;">
                                        <div class="testimonial-one__review-box">
                                            <p>their <br> Introduntion</p>
                                            <div class="testimonial-one__review-icon">
                                                <img src="assets/images/icon/comment-icon.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="testimonial-one__main-content-right">
                                    <div class="section-title text-left">
                                        <span class="section-title__tagline">Our Volunteers</span>
                                        <h2 class="section-title__title">Introduntion to our Volunteers
                                        </h2>
                                    </div>
                                    <div class="swiper-container" id="testimonials-one__carousel">
                                        <div class="swiper-wrapper volunteer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-one__thumb-wrapper">
                        <div class="swiper-container" id="testimonials-one__thumb">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-one__img-holder">
                                        <img src="assets/images/volunteer/1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-one__img-holder">
                                        <img src="assets/images/volunteer/2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-one__img-holder">
                                        <img src="assets/images/volunteer/3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-one__img-holder">
                                        <img src="assets/images/volunteer/4.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="testimonials-one__carousel-pagination"></div>
                    </div>
                   </div>
        </section>
       
        <section class="brand-one">
            <div class="container ">
                <div class="brand-one__title"></div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100,
                "slidesPerView": 5,
                "loop": true,
                "navigation": {
                    "nextEl": "#brand-one__swiper-button-next",
                    "prevEl": "#brand-one__swiper-button-prev"
                },
                "autoplay": { "delay": 5000 },
                "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-2.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-3.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-4.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-5.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-2.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-3.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-4.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="assets/images/brand/brand-1-5.png" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="brand-one__nav div">
                    <div class="swiper-button-prev" id="brand-one__swiper-button-next">
                        <i class="fas fa-angle-left"></i>
                    </div>
                    <div class="swiper-button-next" id="brand-one__swiper-button-prev">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->

      
        <!--Ready One Start-->
        <section class="ready-one">
            <div class="container">
                <div class="ready-one__inner">
                    <div class="ready-one-shape-1 float-bob-x">
                        <img src="assets/images/shapes/ready-one-shape-1.png" alt="">
                    </div>
                    <div class="ready-one__big-icon float-bob-y-2">
                        <span class="icon-fundraiser"></span>
                    </div>
                    <div class="ready-one__left">
                        <div class="icon">
                            <span class="icon-fundraiser"></span>
                        </div>
                        <div class="content">
                            <p>Your story starts from here</p>
                            <h3> “I cried because I had no shoes until I met a man who had no feet”</h3>
                        </div>
                    </div>
                    <!-- <div class="ready-one__right">
                        <a href="" class="thm-btn ready-one__btn">SignUp Today</a>
                    </div> -->
                </div>
            </div>
        </section>
        <!--Ready One End-->

        <?php
          include_once 'footer.php'
        ?>

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.php" aria-label="logo image"><img src="assets/images/resources/logo-2.png" width="143"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:ks6741948@gmail.com">ks6741948@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:6397490046">6397490046</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>

    <script>
document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.category-link').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            const category = event.currentTarget.getAttribute('data-category');
            window.location.href = `campaignbycategory.php?category=${category}`;
        });
    });
});
</script>
    <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/countdown/countdown.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="assets/vendors/vegas/vegas.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/timepicker/timePicker.js"></script>
    <script src="assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/circleType/jquery.lettering.min.js"></script>




    <!-- template js -->
    <script src="assets/js/qrowd.js"></script>
    <script src="assets/js/new.js"></script>

    

</body>


<!-- Mirrored from qrowd-html.vercel.app/main-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:33:58 GMT -->
</html>