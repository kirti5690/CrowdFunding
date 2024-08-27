<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Login  </title>
   
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

    function validateForm() {
        var userName = $("#t1").val();
        var email = $("#t2").val();
        var password = $("#t3").val();
        var contact = $("#t4").val();
        var organization = $("#t5").val();
        var description = $("#t6").val();
        var adhaar_number = $("#t8").val();
        var fileInput = $("#t7")[0];
        var file = fileInput.files[0]; 
        var isValid = true;

        $(".error-message").text("");
 
        if (email === "") {
            $("#userIdError").text("*Please enter your email");
            isValid = false;
        }
        if (password === "") {
            $("#passwordError").text("*Please enter your password");
            isValid = false;
        }
        if (userName === "") {
            $("#userNameError").text("*Please enter your name");
            isValid = false;
        }
        if (contact === "") {
            $("#contactError").text("*Please enter your phone number");
            isValid = false;
        }
        if (organization === "") {
            $("#organizationError").text("*Please enter your organization name");
            isValid = false;
        }
        if (description === "") {
            $("#descriptionError").text("*Please add description");
            isValid = false;
        }
        if (adhaar_number === "") {
            $("#adhaarError").text("*Please write your adhaar number");
            isValid = false;
        }
        if (!file) {
            $("#fileError").text("*Please upload a profile picture");
            isValid = false;
        }

        return isValid;
    }

    
    $('#fundraiser-register-form').on('submit', function(event) {
        event.preventDefault(); 

        if (!validateForm()) {
            return; 
        }

        var formData = new FormData(this); 
        formData.append('action', 'registerFund');

        $.ajax({
            url: 'controller/userController.php',
            type: 'POST',
            data: formData, 
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                   
                    $('#otpModal').modal('show');
                } else {
                    
                    let messageBox = $('<div></div>');
                    messageBox.addClass('alert alert-danger')
                              .html('<strong>Error!</strong> ' + response.message);
                    $('#fundraiser-register-form').prepend(messageBox);
                    setTimeout(function() {
                        messageBox.fadeOut('slow', function() {
                            $(this).remove();
                        });
                    }, 3000);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr); 
                console.log("Status Code:", xhr.status);
                console.log("Response Text:", xhr.responseText);
                $('#responseMessage').html('<p style="color: red;">An error occurred while processing the request. ' + error + '</p>');
            }
        });
    });

   
    $('#verifyOtpButton').on('click', function() {
        var otp = $('#otpInput').val().trim();

        if (otp === "") {
            $('#otpError').text("*Please enter the OTP");
            return;
        }

        $.ajax({
            url: 'controller/userController.php',
            type: 'POST',
            data: { action: 'verifyOTP', otp: otp },
            success: function(response) {
                if (response.status) {
                   
                    $('#otpModal').modal('hide');
                    let messageBox = $('<div></div>');
                    messageBox.addClass('alert alert-success')
                              .html('<strong>Success!</strong> Registration successful');
                    $('#fundraiser-register-form').prepend(messageBox);
                    setTimeout(function() {
                        messageBox.fadeOut('slow', function() {
                            $(this).remove();
                            window.location.href = "loginFund"; 
                        });
                    }, 3000);
                } else {
                   
                    $('#otpError').text("*Invalid OTP. Please try again.");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr); 
                console.log("Status Code:", xhr.status);
                console.log("Response Text:", xhr.responseText);
                $('#otpError').html('<p style="color: red;">An error occurred while verifying the OTP. ' + error + '</p>');
            }
        });
    });

    // Validation for form fields
    validateField("#t1", "#userNameError", "*Please enter your name");
    validateField("#t2", "#userIdError", "*Please enter your email");
    validateField("#t3", "#passwordError", "*Please enter your password");
    validateField("#t4", "#contactError", "*Please enter your phone number");
    validateField("#t5", "#organizationError", "*Please enter your organization name");
    validateField("#t6", "#descriptionError", "*Please add description");
    validateField("#t8", "#adhaarError", "*Please write your adhaar number");
});

</script>
    <style>
    .error-message {
            color:red;
            font-size: 14px;
            margin-bottom: 10px;
    }
    .header{
    background-color:#1e3737;
    color:white;
    width:100%;
    height:250px;
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
                    <h2 style="font-size:28px;">Welcome,Create Your Account as Fundraiser <span class="ps-2" style="font-size:38px;"><i class="fa-solid fa-user"></i></span></h2>
                </div>
            </div>
            </div>
        </section> 
<section class="login-register ">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <h3 class="login-register__title">Register</h3>
                <form class="login-register__form" id="fundraiser-register-form" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="registerfund">
                    
                    <!-- Registration Fields -->
                    <div class="contact-form__input-box">
                        <input type="text" name="username" id="t1" placeholder="Username" required>
                    </div>
                    <div id="userNameError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <input type="email" name="email" id="t2" placeholder="Email Address" required>
                    </div>
                    <div id="userIdError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <input type="password" name="password" id="t3" placeholder="Password" required>
                    </div>
                    <div id="passwordError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <input type="text" name="contact_information" id="t4" placeholder="Contact Information" required>
                    </div>
                    <div id="contactError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <input type="text" name="organization_name" id="t5" placeholder="Organization Name" required>
                    </div>
                    <div id="organizationError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <textarea name="description" id="t6" placeholder="Description" required></textarea>
                    </div>
                    <div id="descriptionError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <input type="text" name="adhaar_number" id="t8" placeholder="Adhaar Number" required>
                    </div>
                    <div id="adhaarError" class="error-message"></div>

                    <div class="contact-form__input-box">
                        <input type="file" name="profile_picture" id="t7" required>
                    </div>
                    <div id="fileError" class="error-message"></div>
                    
                   

                    <div class="login-register__info">
                        <button type="submit" id="registerButton" class="thm-btn login-register__btn">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- OTP Verification Modal -->
<div id="otpModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">OTP Verification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact-form__input-box">
                    <input type="text" id="otpInput" placeholder="Enter OTP" required>
                </div>
                <div id="otpError" class="error-message"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="verifyOtpButton" class="thm-btn login-register__btn">Verify OTP</button>
            </div>
        </div>
    </div>
</div>



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


<!-- Mirrored from qrowd-html.vercel.app/main-html/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 09:37:45 GMT -->
</html>