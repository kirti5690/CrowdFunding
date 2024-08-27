<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from qrowd-html.vercel.app/main-html/project-carousel.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:38:50 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Volunteer </title>
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
    <style>
    /* Volunteer Intro Section */
    .volunteer-intro {
       
        background-color: #f9f9f9;
        padding-bottom:120px;
        padding-top:90px;
    }

    .volunteer-intro__title {
        font-size: 35px;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }

    .volunteer-intro__text {
        font-size: 18px;
        color: #666;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    
    .cta-banner {
        padding-bottom:130px;
        background-color: #ff7a59;
        color: #fff;
       padding-top:50px;
    }

  

    .cta-banner p {
        font-size: 19px;
        margin-bottom: 20px;
    }

    .cta-banner__btn {
        background-color: #fff;
        color: #ff7a59;
        padding: 15px 25px;
      
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s, color 0.3s;
    }

    .cta-banner__btn:hover {
        background-color: #e06650;
        color: #fff;
    }

   
    .volunteer-stats {
        padding: 60px 0;
        background-color: #fff;
    }

    .volunteer-stats h3 {
        font-size: 32px;
        font-weight: 700;
        color: #333;
        margin-bottom: 10px;
    }

    .volunteer-stats p {
        font-size: 16px;
        color: #666;
    }

    .volunteer-stats .col-lg-4 {
        margin-bottom: 30px;
    }

    @media (max-width: 768px) {
        .volunteer-intro__title {
            font-size: 24px;
        }

        .volunteer-intro__text {
            font-size: 14px;
        }

        .cta-banner h4 {
            font-size: 20px;
        }

        .cta-banner p {
            font-size: 14px;
        }

        .volunteer-stats h3 {
            font-size: 28px;
        }

        .volunteer-stats p {
            font-size: 14px;
        }
    }
</style>

</head>

<body class="custom-cursor">
    <!-- Custom Cursor and Preloader -->
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>

    <div class="page-wrapper">
        <?php include_once 'header.php'; ?>

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/extra/volunteer-banner.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>/</span></li>
                        <li>Meet Our Volunteers</li>
                    </ul>
                    <h2>Meet Our Volunteers</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!-- Introduction Section -->
        <section class="volunteer-intro ">
            <div class="container text-center">
                <h2 class="section-title__title mb-3">Volunteers are the heart of our mission.</h2>
                <p class="event-details__content-one-text-1">Our volunteers are the driving force behind our success. Their dedication and passion fuel our efforts to make a difference in the world. We are proud to showcase these incredible individuals who donate their time and skills to help others. Join us in appreciating their contributions and consider becoming a volunteer yourself!</p>
            </div>
        </section>

        <!-- Call-to-Action Banner -->
        <section class="cta-banner">
            <div class="container text-center">
                <h2 class="section-title__title mb-3">Want to Make a Difference?</h2>
                <p>Your journey of giving back starts here. Join our community of volunteers and start making an impact today.</p>
                <a href="registerVolunteer.php" class="thm-btn cta-banner__btn">Become a Volunteer</a>
            </div>
        </section>

        <!-- Volunteer Statistics -->
        <section class="volunteer-stats">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">
                <h3 >0+</h3> <!-- Placeholder for Volunteers Engaged -->
                <p>Volunteers Engaged</p>
            </div>
            <div class="col-lg-4 text-center">
                <h3>0+</h3> <!-- Placeholder for Hours Volunteered -->
                <p>Hours Volunteered</p>
            </div>
            <div class="col-lg-4 text-center">
                <h3>0+</h3> <!-- Placeholder for Projects Completed -->
                <p>Projects Completed</p>
            </div>
        </div>
    </div>
</section>



        <!--Project Page One Start-->
        <section class="project-one " style="padding: 70px 0 170px">
            <div class="container">
                <div class="project-one__top">
                    <div class="section-title text-center">
                        <span class="section-title__tagline">Hear from those who make a difference every day.</span>
                        <h2 class="section-title__title">What Our Volunteers Say</h2>
                    </div>
                </div>
                <div class="project-one__bottom">
                    <div class=" row four">
                        <!-- Volunteer Cards Here -->
                    </div>
                </div>
            </div>
        </section>
        <!--Project Page One End-->

        <!-- Ready to Donate Section -->
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
                            <h3>“Let your heart bloom with the flowers of kindness.”</h3>
                        </div>
                    </div>
                    <div class="ready-one__right">
                        <a href="registerDonor.php" class="thm-btn ready-one__btn">Donate</a>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once 'footer.php'; ?>
    </div>


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
    <script src="assets/js/new.js"></script>

</body>

<script>
$(document).ready(function() {
    fetchVolunteerStats();
});

function fetchVolunteerStats() {
    $.ajax({
        url: "controller/userController.php",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ action: "getVolunteerStats" }),
        dataType: 'json',
        success: function(data) {
            console.log(data);
            const volunteerElements = $('.volunteer-stats h3');
            if (volunteerElements.length === 3) {
                volunteerElements.eq(0).text(data.volunteers + '+');
                volunteerElements.eq(1).text(data.hours + '+');
                volunteerElements.eq(2).text(data.projects + '+');
            } else {
                console.error('Expected 3 h3 elements, found:', volunteerElements.length);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching volunteer stats:', error);
        }
    });
}



</script>
<!-- Mirrored from qrowd-html.vercel.app/main-html/project-carousel.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:38:50 GMT -->
</html>