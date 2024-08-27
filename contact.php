<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from qrowd-html.vercel.app/main-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:39:46 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Contact || Qrowd || Qrowd HTML 5 Template </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Qrowd HTML 5 Template " />

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
    <link rel="stylesheet" href="assets/css/qrowd-responsive.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <!-- <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    /.preloader -->


    <div class="page-wrapper">
         <?php
          include_once 'header.php'
         ?>
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <!-- <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
            </div> -->
            <div class="page-header-shape-1 float-bob-x">
                <img src="assets/images/shapes/page-header-shape-1.png" alt="">
            </div>
            <div class="page-header-shape-2 float-bob-y">
                <img src="assets/images/shapes/page-header-shape-2.png" alt="">
            </div>
            <div class="page-header-shape-3 float-bob-x">
                <img src="assets/images/shapes/page-header-shape-3.png" alt="">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li>Contact</li>
                    </ul>
                    <h2>Contact</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact One Start-->
        <section class="contact-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Contact with us</span>
                    <h2 class="section-title__title">Feel free to write us <br> anytime</h2>
                </div>
                <div class="contact-one__form-box">
                <form id="contactForm" class="contact-one__form contact-form-validated" novalidate="novalidate">
    <div class="row">
        <div class="col-xl-6">
            <div class="contact-form__input-box">
                <input type="text" placeholder="Your Name" name="name" required>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="contact-form__input-box">
                <input type="email" placeholder="Email Address" name="email" required>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="contact-form__input-box">
                <input type="text" placeholder="Phone" name="phone">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="contact-form__input-box">
                <input type="text" placeholder="Subject" name="subject">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact-form__input-box text-message-box">
                <textarea name="message" placeholder="Write a Message" required></textarea>
            </div>
            <div id="message" class="pb-3"></div>
            <div class="contact-form__btn-box">
                <button type="submit" class="thm-btn contact-form__btn">Send a Message</button>
            </div>
        </div>
    </div>
</form>
 <!-- This is where the success or error message will be displayed -->

                </div>
            </div>
        </section>
        <!--Contact One End-->

        <!--Address Start-->
        <section class="address">
            <div class="container">
                <div class="row">
                    <!--Address Single Start-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="address__single">
                            <div class="address__title-box">
                                <h4 class="address__title">About</h4>
                                <div class="address__icon">
                                    <span class="icon-entrepreneur-1"></span>
                                </div>
                            </div>
                            <p class="address__text"> Qrowd is located at different  <br> places around the world.  <br>Empower the  world!</p>
                        </div>
                    </div>
                    <!--Address Single End-->
                    <!--Address Single Start-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="address__single">
                            <div class="address__title-box">
                                <h4 class="address__title">Address</h4>
                                <div class="address__icon">
                                    <span class="icon-location"></span>
                                </div>
                            </div>
                            <p class="address__text">27, Mitralok Colony<br> KrishanNagar Chowk <br>
                            Dehradun ,Uttrakhand</p>
                        </div>
                    </div>
                    <!--Address Single End-->
                    <!--Address Single Start-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="address__single">
                            <div class="address__title-box">
                                <h4 class="address__title">Contact</h4>
                                <div class="address__icon">
                                    <span class="icon-contact"></span>
                                </div>
                            </div>
                            <p class="address__text">
                                <a href="tel:6397490046" class="address__number">6397490046</a>
                                <a href="mailto:ks6741948@gmail.com" class="address__email">ks6741948@gmail.com</a>
                                <a href="mailto:kirti.sharma@ebizondigital.com" class="address__email">kirti.sharma@ebizondigital.com</a>
                            </p>
                        </div>
                    </div>
                    <!--Address Single End-->
                </div>
            </div>
        </section>
        <!--Address End-->

        <!--Google Map Start-->
        <section class="google-map">
        <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=30%C2%B021'17.5%22N%2078%C2%B005'09.0%22E+(Qrowd-Non-Prorfit)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps trackers</a></iframe></div>

        </section>
        <!--Google Map End-->

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
    <script>
        $(document).ready(function() {
       $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'controller/userController.php',
            type: 'POST',
            contentType: 'application/json',
                data: JSON.stringify({
                action: 'saveContact',
                name: $('input[name="name"]').val(),
                email: $('input[name="email"]').val(),
                phone: $('input[name="phone"]').val(),
                subject: $('input[name="subject"]').val(),
                message: $('textarea[name="message"]').val()
                }),
                
                success: function(response) {
    if (response.status) {
        $('#message').html('<div class="alert alert-success">' + response.message + '</div>');
        $('#contactForm')[0].reset(); // Reset the form fields
    } else {
        $('#message').html('<div class="alert alert-danger">' + response.message + '</div>');
    }

    
    setTimeout(function() {
        location.reload(); 
    }, 3000); 
},
error: function(xhr, status, error) {
    console.error("Error:", status, error);
    $('#message').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
    
   winodr.location.href="404";
}

        });
    });
});

    </script>
</body>


<!-- Mirrored from qrowd-html.vercel.app/main-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:39:46 GMT -->
</html>