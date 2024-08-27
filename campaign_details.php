<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from qrowd-html.vercel.app/main-html/event-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:39:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Campaign Details || Qrowd || Qrowd HTML 5 Template </title>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/qrowd-responsive.css" />

  <script>
$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var campaignId = urlParams.get('id');

    if (campaignId) {
        $.ajax({
            url: 'controller/userController.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                action: 'getCampaignDetails',
                id: campaignId
            }),
            success: function(response) {
                var data = response;
                if (data.error) {
                    $('.details').html('<p>' + data.error + '</p>');
                } else {
                    var detailsHtml = `
                        <div class="row">
                            <div class="event-details__img">
                                <img src="assets/images/campaign/${data.photo}" alt="">
                                <div class="event-details__date">
                                    <p>${data.start_date}</p>
                                </div>
                            </div>
                        </div>
                        <div class="event-details__bottom">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7">
                                    <div class="event-details__left">
                                        <div class="event-details__content-one">
                                            <h3 class="event-details__content-one-title">${data.title}</h3>
                                            <p class="event-details__content-one-text-2">${data.description}</p>
                                            <p class="event-details__content-one-text-1">${data.more_about}</p>
                                            <p class="event-details__content-one-text-3">${data.more_about}</p>


                                        </div>
                                        <div class="event-details__content-two">
                                             <p class="event-details__content-one-text-1">${data.more_about}</p>
                                            <p class="event-details__content-one-text-3 pb-5">${data.more_about}</p>
                                            <div class="event-details__btn-box">
                                                <a href="donationPage.php?id=${data.id}" class="thm-btn event-details__btn">Donate Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-5">
                                    <div class="event-details__sidebar">
                                        <div class="event-details__details-box">
                                            <h5 class="event-details__details-box-title">Campaign Details</h5>
                                            <ul class="list-unstyled event-details__details-box-list">
                                                <li>
                                                    <div class="left">
                                                        <p>Starting Time:</p>
                                                    </div>
                                                    <div class="right">
                                                        <p>${data.start_date}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <p>End Date:</p>
                                                    </div>
                                                    <div class="right">
                                                        <p>${data.end_date}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <p>Category:</p>
                                                    </div>
                                                    <div class="right">
                                                        <p>${data.category}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <p>Goal Amount:</p>
                                                    </div>
                                                    <div class="right">
                                                        <p>${data.goal_amount}</p>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="left">
                                                        <p>Raised Amount:</p>
                                                    </div>
                                                    <div class="right">
                                                        <p>${data.raised_amount}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                       
                                </div>
                            </div>
                        </div>
                    `;
                    $('.details').html(detailsHtml);
                }
            },
            error: function() {
                $('.details').html('<p>Failed to load campaign details.</p>');
            }
        });
    } else {
        $('.details').html('<p>No campaign selected.</p>');
    }
});
</script>

</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="page-wrapper">


                    
    <?php
include_once 'header.php'
?>

        
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/extra/w1.jpg)">
            </div>
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
                        <li><a href="index">Home</a></li>
                        <li><span>/</span></li>
                        <li>Campaign Detail</li>
                    </ul>
                    <h2>About the Campaign</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Event Details Start-->
        <section class="event-details">
        <div class="container details">
             
            </div>
        </section>
        <!--Event Details End-->

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
                            <h3>“The smallest act of charity can ignite a fire of hope.”</h3>
                        </div>
                    </div>
                    <div class="ready-one__right">
                        <a href="registerDonor.php" class="thm-btn ready-one__btn">Donate</a>
                    </div>
                </div>
            </div>
        </section>
        <!--Site Footer Start-->
       <?php
       include_once 'footer.php'
       ?>
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/resources/logo-2.png" width="143"
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
</body>


<!-- Mirrored from qrowd-html.vercel.app/main-html/event-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:39:08 GMT -->
</html>