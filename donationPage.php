<?php
session_start();

$campaignId = isset($_GET['id']) ? $_GET['id'] : '';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'donor') {
    // Store the campaign ID in the session for later use
    $_SESSION['last_campaign_id'] = $campaignId;
    // Redirect to login page
    header("Location: loginDonor.php");
    exit();
}




include_once 'model/databse.php';
include_once 'model/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

$campaignDetails = $user->getCampaignDetails($campaignId)->fetch(PDO::FETCH_ASSOC);

if (!$campaignDetails) {
    echo "<p>Invalid campaign ID.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donate</title>
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
<style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
     .center{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom:40px;
     }
    .donation-container {
        background-color: #fff;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        max-width: 550px;
        width: 100%;
        text-align: center;
        position: relative;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .donation-title {
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
        font-weight: 700;
    }

    .campaign-image {
        max-width: 100%;
        height: 250px;
        border-radius: 15px;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .campaign-image:hover {
        transform: scale(1.05);
    }

    .campaign-description {
        color: #555;
        margin-bottom: 25px;
        line-height: 1.6;
    }

    .donation-label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #333;
        text-align: left;
    }

    .donation-input {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 2px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    .donation-input:focus {
        border-color: #007bff;
        outline: none;
    }

    .donation-button {
        width: 100%;
        padding: 15px;
        background-color: #fe7f4c;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .donation-button:hover {
        background-color: black;
        transform: translateY(-3px);
    }

    .back-link {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .back-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .message {
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 5px;
        display: none;
        text-align: center;
        font-size: 16px;
        font-weight: 500;
    }

    .message.success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .message.error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 30px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        text-align: center;
        border-radius: 15px;
        position: relative;
    }

    .modal-content h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .modal-content p {
        font-size: 16px;
        margin-bottom: 25px;
        color: #555;
    }

    .close {
        color: #aaa;
        font-size: 24px;
        position: absolute;
        right: 15px;
        top: 10px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
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
   <div class="center">
    <div class="donation-container">
    <h2 class="donation-title">Donate to <?php echo htmlspecialchars($campaignDetails['title']); ?></h2>
    <img src="assets/images/campaign/<?php echo htmlspecialchars($campaignDetails['photo']); ?>" alt="Campaign Image" class="campaign-image">
    <p class="campaign-description"><?php echo htmlspecialchars($campaignDetails['description']); ?></p>

    <div id="message" class="message"></div>

    <form id="donationForm" class="donation-form">
        <label for="amount" class="donation-label">Donation Amount:</label>
        <input type="number" id="amount" name="amount" placeholder="Enter your donation amount" class="donation-input" required>
        <input type="hidden" id="campaign_id" name="campaign_id" value="<?php echo htmlspecialchars($campaignId); ?>">
        <input type="hidden" id="donor_id" name="donor_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
        <button type="submit" class="donation-button">Donate Now</button>
    </form>
    <a href="campaign_details.php?id=<?php echo $campaignId; ?>" class="back-link">Go back to campaign</a>
</div>
</div>
<!-- Thank You Modal -->
<div id="thankYouModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Thank You!</h2>
        <p>Your donation was successful. We greatly appreciate your support!</p>
        <div class="thank-you-icon" style="font-size:38px;">🎉</div>
        <a href="index.php" class="back-link">Return to Homepage</a>
    </div>
</div>

    <?php
       include_once 'footer.php'
       ?>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#donationForm').submit(function(e) {
            e.preventDefault();

            var donationData = {
                action: 'makeDonation',
                campaign_id: $('#campaign_id').val(),
                donor_id: $('#donor_id').val(),
                amount: $('#amount').val()
            };

            $.ajax({
                url: 'controller/userController.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(donationData),
                success: function(response) {
                    var messageDiv = $('#message');
                    if (response.status) {
                        messageDiv.removeClass('error').addClass('success').text('Donation successful!').show();
                        $('#thankYouModal').fadeIn();
                    } else {
                        messageDiv.removeClass('success').addClass('error').text('Donation failed: ' + response.message).show();
                    }
                },
                error: function() {
                    $('#message').removeClass('success').addClass('error').text('An error occurred while processing your donation.').show();
                }
            });
        });

        // Close modal when clicking the close button
        $('.close').click(function() {
            $('#thankYouModal').fadeOut();
        });

        // Close modal when clicking outside the modal content
        $(window).click(function(event) {
            if (event.target.id === 'thankYouModal') {
                $('#thankYouModal').fadeOut();
            }
        });
    });
</script>

</body>
</html>