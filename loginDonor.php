<?php
session_start();
$lastCampaignId = isset($_SESSION['last_campaign_id']) ? $_SESSION['last_campaign_id'] : null;
?>

<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Login Donor </title>
   
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Qrowd HTML 5 Template " />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <script>
        $(document).ready(function() {
        function validateField(input, errorDiv, errorMessage) {
        $(input).on('focus', function() {
            if ($(this).val().trim() === "") {
                $(errorDiv).text(errorMessage);
            }
        });

        $(input).on('blur', function() {
            $(errorDiv).text('');
        });

        $(input).on('input', function() {
            if ($(this).val().trim() === "") {
                $(errorDiv).text(errorMessage);
            } else {
                $(errorDiv).text('');
            }
        });
    }

    function validateForm(event) {
        event.preventDefault();

        var userId = $("#t1").val();
        var password = $("#p1").val();
        console.log(userId);
        console.log(password);
        var isValid = true;

        $(".error-message").text("");

        if (userId === "") {
            $("#userIdError").text("Please enter your ID");
            isValid = false;
        }
        if (password === "") {
            $("#passwordError").text("Please enter your password");
            isValid = false;
        }

        if (isValid) {
            var lastCampaignId = "<?php echo htmlspecialchars($lastCampaignId); ?>";
            $.ajax({
                url: 'controller/userController.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    email: userId,
                    password_hash: password,
                    action:"loginDon"
                }),
                
                success: function(response) {
                     let messageBox = $('<div></div>');

                if (response.status) {
                    messageBox.addClass('alert alert-success')
                              .html('<strong>Success!</strong> ' + response.message);
                    
                    $('#fundraiser-register-form')[0].reset();
                

                $('#fundraiser-register-form').prepend(messageBox);

               
                setTimeout(function() {
                    messageBox.fadeOut('slow', function() {
                        $(this).remove();
                        if (lastCampaignId) {
                                            window.location.href = "campaign_details.php?id=" + lastCampaignId;
                                        } else {
                                            window.location.href = "index";
                                        }
                    });
                }, 3000);
            }
            else {
                    messageBox.addClass('alert alert-danger')
                              .html('<strong>Error!</strong> ' + response.message);
                }
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + status + " " + error);
                    console.log(xhr.responseText);
                    $('#responseMessage').html('<p style="color: red;">An error occurred while processing the request. ' + error + '</p>');
                      window.location.href="404";
                }
            });
        }
    }

    validateField("#t1", "#userIdError", "Please enter your ID");
    validateField("#p1", "#passwordError", "Please enter your password");

    $("form").submit(validateForm);
});
    </script>
    <style>
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .header{
    background-color:#1e3737;
    color:white;
    width:100%;
    height:230px;
    padding:0;
    top:0;
    margin:0;
}

    </style>
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>







    <div class="page-wrapper">
        <?php
        include_once 'header.php'
        ?>


        <section>
            <div class="header">
            <div class="container">
                <div class="page-header__inner pt-5 mt-5 pb-5 mb-5">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index">Home</a></li>
                        <li><span>/</span></li>
                        <li>Login</li>
                    </ul>
                    <h2 style="font-size:28px;">Welcome,Login into Your Account<span class="ps-2" style="font-size:38px;"><i class="fa-solid fa-user"></i></span></h2>
                    
                </div>
            </div>
            </div>
        </section>

        <section class="login-register ">
            <div class="container ">
                <div class="row d-flex justify-content-center ">
                    <div class="col-lg-8 ">
                        <h3 class="login-register__title">Login</h3>
                        <form class="login-register__form" id="fundraiser-register-form" action="#" method ="POST">
                            
                            <div class="contact-form__input-box">
                                <input type="text" id="t1" placeholder="Username or Email Address*">
                            </div>
                            <div id="userIdError" class="error-message"></div>
                            
                            <div class="contact-form__input-box">
                                <input type="password" id="p1" placeholder="Password*">
                            </div>
                            <div id="passwordError" class="error-message"></div>
                            
                           
                            <div class="login-register__text"><a href="registerDonor.php">Register youself ,if not login!</a></div>
                            <div class="login-register__info">
                                <button type="submit" class="thm-btn login-register__btn">Login</button>
                                <div class="login-register__text"><a href="forgot.php">Forgot your Password?</a></div>
                                <!-- /.login-register__text -->
                            </div>
                            <div id="passwordError" class="error-message"></div>
                        </form>
                    </div><!-- /.col-lg-6 -->
                   
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.login-register -->


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

</body>


<!-- Mirrored from qrowd-html.vercel.app/main-html/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:37:45 GMT -->
</html>