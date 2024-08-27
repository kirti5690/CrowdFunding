<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Login Register || Qrowd || Qrowd HTML 5 Template </title>
   
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Qrowd HTML 5 Template " />

   
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

   
    <link rel="stylesheet" href="assets/css/qrowd.css" />
    <link rel="stylesheet" href="assets/css/qrowd-responsive.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
   <style>
    .policy-section {
            padding: 60px 0;
            background-color: #f7f7f7;
        }
        .policy-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .policy-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
        }
        .policy-content {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .policy-content h3 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #555;
            margin-top: 20px;
        }
        .policy-content p {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
            margin-top: 10px;
        }
        .policy-content ul {
            list-style: disc;
            margin-left: 20px;
        }
        .policy-content ul li {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
        }
        button {
    background-color: #fd7e14;
    color:white;
    border: none;
    cursor: pointer;
    margin:10px;
    padding:10px;
    border-radius:50%;
}

 button:hover {
     color:#fd7e14;
     background-color:black;
}
   </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>







    <div class="page-wrapper">
<header>
     <div class="main-header__top">
                <div class="main-header__top-inner">
                    <div class="main-header__top-left">
                        <ul class="list-unstyled main-header__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="text">
                                    <p>27 Mitralok Colony,KrishanNagar,Dehradun</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:Ks6741948@gmail.com">Ks6741948@gmail.com</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="main-header__top-right">
                    <div class="main-header__login">
                    <ul class="list-unstyled main-header__login-list">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="profile_dashboard.php">Profile</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account"></i>Login</a>
                                  <ul class="dropdown-menu">
                                    <li><a class="ps-2" href="loginFund.php">Login as Fundraiser</a></li>
                                    <li><a href="loginDonor.php">Login as Donor</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account"></i>/Register</a>
                                  <ul class="dropdown-menu">
                                    <!-- <li><a href="registerFund.php">Register as Fundraiser</a></li> -->
                                    <li><a class="ps-2" href="registerDonor.php">Register as Donor</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
        </li>
    </ul>
</div>
</header>
<button onclick="back()"><-</button>
       <section class="policy-section">
            <div class="container">
                <div class="policy-header">
                    <h2>Website Policies</h2>
                </div>
                <div class="policy-content">
                    <h3>Fundraiser Policies</h3>
                    <p>As a fundraiser on our platform, you must adhere to the following policies:</p>
                    <ul>
                        <li>All funds raised must be used for the stated purpose of the campaign.</li>
                        <li>Fundraisers must provide accurate and complete information about their campaigns.</li>
                        <li>Misrepresentation of campaign information is strictly prohibited.</li>
                        <li>Fundraisers must comply with all applicable laws and regulations.</li>
                        <li>It is the responsibility of the fundraiser to communicate with donors about the campaign's progress and outcomes.</li>
                    </ul>

                    <h3>Donor Policies</h3>
                    <p>As a donor on our platform, you must adhere to the following policies:</p>
                    <ul>
                        <li>Donors must provide accurate and complete information when making a donation.</li>
                        <li>Donations are final and non-refundable.</li>
                        <li>Donors should only contribute to campaigns they believe in and trust.</li>
                        <li>It is the donor's responsibility to research and verify the legitimacy of a campaign before making a donation.</li>
                        <li>Donors must comply with all applicable laws and regulations.</li>
                    </ul>

                    <h3>Government Policies</h3>
                    <p>Our platform complies with all relevant government policies and regulations:</p>
                    <ul>
                        <li>All campaigns must comply with local, state, and federal laws.</li>
                        <li>We reserve the right to remove any campaign that violates legal requirements.</li>
                        <li>We cooperate with law enforcement and regulatory authorities as required.</li>
                        <li>Fundraisers are responsible for ensuring their campaigns adhere to all legal requirements.</li>
                        <li>We do not tolerate illegal activities, and any such activities will be reported to the authorities.</li>
                    </ul>

                    <h3>Platform Commission</h3>
                    <p>Our platform charges a commission fee for all funds raised:</p>
                    <ul>
                        <li>A standard commission rate of 5% is applied to all donations.</li>
                        <li>This fee helps cover operational costs and ensures the sustainability of our platform.</li>
                        <li>The commission fee is automatically deducted from the total funds raised before disbursement to the fundraiser.</li>
                        <li>Any applicable payment processing fees will also be deducted.</li>
                        <li>We strive to maintain transparency and provide detailed reports of all transactions.</li>
                    </ul>
                </div>
            </div>
        </section>


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
                <a href="index.html" aria-label="logo image"><img src="assets/images/resources/logo-2.png" width="143"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@qrowd.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
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
    <script>
        function back(){
            window.location.href="faq.php";
        }
    </script>
   
</body>


<!-- Mirrored from qrowd-html.vercel.app/main-html/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:37:45 GMT -->
</html>