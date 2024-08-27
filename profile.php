<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: loginFund.php");
    exit();
}

include_once 'model/databse.php';
include_once 'model/user.php';
$user_id = $_SESSION['user_id'];
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$user->id = $user_id;

// Fetch profile and campaigns
$donor_stmt = $user->getDonors();
$donor = $donor_stmt->fetch(PDO::FETCH_ASSOC);
$campaigns_stmt = $user->getCampaignsByDonor($user_id);
$campaigns = $campaigns_stmt->fetchAll(PDO::FETCH_ASSOC);
$donations_stmt = $user->getDonationsByDonor($user_id);
$donations = $donations_stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Fundraiser Profile</title>
   
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
   $(document).ready(function () {
    // Show profile section
    $('#showProfile').click(function () {
    $('#donationSection').hide();
        
        $('#campaignsSection').hide();
        $('#profileSection').show();
        $('#changePasswordSection').hide();
        $('#updateFundraiserForm').hide();

    });

    // Show campaigns section
    $('#showCampaigns').click(function () {
        $('#donationSection').hide();

        $('#profileSection').hide();
        $('#campaignsSection').show();
        $('#changePasswordSection').hide();
        $('#updateFundraiserForm').hide();


    });

    // Show create campaign form
    $('#showCreateCampaignForm').click(function () {
        $('#campaignsSection').hide();
   
        $('#profileSection').hide();
        $('#donationSection').show();
        
        $('#changePasswordSection').hide();
        $('#updateFundraiserForm').hide();

    });

    $('#ChangePass').on('click', function() {
    $('#profileSection').hide();
    $('#campaignsSection').hide();
 
    $('#donationSection').hide();
    
    $('#changePasswordSection').show();
    $('#updateFundraiserForm').hide();

    });
    
   
    $(window).click(function (event) {
        if ($(event.target).is('#updateFundraiserForm')) {
            $('#updateFundraiserForm').fadeOut();
            $('#profileSection').show();
        }
    });

    $(document).on('click', '.editfund', function () {
        // Assuming you set the campaign ID as a data attribute
        var fundraiserId = $(this).data('id');
        
        // Optionally load campaign data via AJAX here

        $('#createCampaignForm').hide();
        $('#profileSection').hide();
        $('#campaignsSection').hide();
        $('#updateCampaignForm').hide();
        $('#changePasswordSection').hide();
        $('#updateFundraiserForm').show();
        // For debugging purposes
        console.log('Update button clicked for campaign ID:', fundraiserId);
    });
});
</script>

<script>
  $(document).ready(function() {
    $('#changePasswordForm').on('submit', function(e) {
        e.preventDefault();

        let oldPassword = $('#old_password').val();
        let newPassword = $('#new_password').val();
        let confirmPassword = $('#confirm_password').val();

        if (newPassword !== confirmPassword) {
            $('#passwordChangeMessage').html('<p style="color:red;">New password and Confirm password do not match.</p>');
            return;
        }

        $.ajax({
            url: 'controller/userController.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                action: 'changePasswordDon',
                password: oldPassword,
                newpass: newPassword
            }),
            success: function(response) {
                console.log("Response received:", response);
                
                if (response.status) {
                    $('#passwordChangeMessage').html('<p style="color:green;">' + response.message + '</p>');
                } else {
                    $('#passwordChangeMessage').html('<p style="color:red;">' + response.message + '</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
                console.log("Response text:", xhr.responseText);
                alert("An error occurred while processing your request. See console for details.");
            }
        });
    });
});
</script>
<script>
  $(document).ready(function() {
    // When the 'Save Changes' button is clicked
    $('.btn-primary').on('click', function(e) {
        e.preventDefault();

        // Get the values from the input fields
        let username = $('#username').val().trim();
        let email = $('#email').val().trim();
        let contact_information = $('#contact_information').val().trim();
        let organization_name = $('#organization_name').val().trim();
        let description = $('#descriptions').val().trim();

       
        $.ajax({
            url: 'controller/userController.php', 
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                action: 'updateDonor',
                username: username,
                email: email,
                contact_information: contact_information,
                organization_name: organization_name,
                description: description
            }),
            success: function(response) {
                console.log("Response received:", response);
                
                // Display success or error messages
                let messageBox = $('<div></div>');

                if (response.status) {
                    messageBox.addClass('alert alert-success')
                              .html('<strong>Success!</strong> ' + response.message);
                } else {
                    messageBox.addClass('alert alert-danger')
                              .html('<strong>Error!</strong> ' + response.message);
                }

                // Append the message box to the form section
                $('#updateFundraiserForm').prepend(messageBox);

                // Automatically remove the message after 5 seconds
                setTimeout(function() {
                    messageBox.fadeOut('slow', function() {
                        $(this).remove();
                        window.location.href="profile_dashboard.php";
                    });
                }, 3000);
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
                console.log("Response text:", xhr.responseText);
                alert("An error occurred while processing your request. See console for details.");
            }
        });
    });
});
</script>
<style>
       

 .change-password-section {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.change-password-section h2 {
    margin-bottom: 20px;
    color: #333;
}

.change-password-section form {
    display: flex;
    flex-direction: column;
}

.change-password-section form div {
    margin-bottom: 15px;
}

.change-password-section form label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.change-password-section form input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.change-password-section form button {
        background-color: #fe7f4c;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      .change-password-section form button:hover {
        background-color: black;
        transform: translateY(-3px);
      }


#passwordChangeMessage p {
    margin-top: 10px;
    font-size: 16px;
}
/* 
 .donation-section {
    display: flex;
    flex-direction:row;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
    background-color: #f9f9f9;
} */

.donation-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    width: calc(33.333% - 20px);
    transition: transform 0.3s ease;
}

.donation-card:hover {
    transform: translateY(-10px);
}

.donation-image img {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
}

.donation-info {
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}

.donation-info h3 {
    font-size: 1.5em;
    margin-bottom: 15px;
    color: #333;
}

.donation-info p {
    margin: 5px 0;
    font-size: 1em;
    color: #555;
}

.amount-donated {
    margin-top: 15px;
    background-color: #f1f1f1;
    padding: 10px;
    border-radius: 5px;
}

.amount-donated p {
    margin: 5px 0;
    font-weight: bold;
    color: #333;
}

.sidebar {
        background-color: #1e3737;
        color: #ecf0f1;
            /* height: 100vh;
            width: 250px; */
            border-right: 1px solid #ddd;
            text-align: center;
            padding: 20px;
            transition: all 0.3s ease;
        }

.sidebar h2 {
    margin-bottom: 20px;
}

.sidebar img.sidebar-img {
    width: 120px; /* Set a fixed width for the image */
    height: 120px; /* Set a fixed height for the image */
    border-radius: 50%; /* Make the image round */
    object-fit: cover; /* Ensure the image fits within the specified dimensions */
    margin-bottom: 20px; /* Add some space below the image */
}

.sidebar nav a {
    display: block;
    margin-bottom: 10px;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.sidebar nav a:hover {
    background-color: #e9ecef;
    color:#333;
}

.main-content {
    padding: 20px;
}



 .profile-details {
    text-align: center;
}

.sidebar .profile-details .profile-picture {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}
.profile-details h2{
    color:whitesmoke;
}


.main-content {
    flex-grow: 1;
    padding: 30px;
  
}

 .campaigns-section, .donation-section,.change-password-section {
    display: none;
}
.profile-section {
        width: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.9);
        padding: 30px;
        background-color: #1e3737;
      }
      .profile-section h2 {
        color: #fd7e14;
        font-weight: bold;
        margin-bottom: 20px;
      }

      .profile-section h2,
      .form-section h2 {
        margin-top: 0;
      }
      .profile-section p {
        margin-bottom: 10px;
        color: grey;
      }


.campaign-card {
    display: flex;
    background-color: #fff;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.campaign-card img {
    width: 150px;
    height: 240px;
    border-radius: 8px 0 0 8px;
    object-fit: cover;
}

.campaign-card .campaign-info {
    padding: 20px;
    flex-grow: 1;
}

.campaign-card .campaign-info h3 {
    margin: 0 0 10px;
}

.campaign-card .campaign-info p {
    margin: 5px 0;
}

.progress-bar {
    width: 100%;
    background-color: #ecf0f1;
    border-radius: 8px;
    overflow: hidden;
    margin: 10px 0;
}

.progress-bar .progress {
    height: 10px;
    background-color:#fd7e14;
}

.header {
        background-color: #1e3737;
        color: white;
        width: 100%;
        height: 200px;
        left:0;       
        margin: 0;
      }

    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
      }
      .main-body {
        padding: 15px;
      }
      .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1),
          0 1px 2px 0 rgba(0, 0, 0, 0.06);
      }

      .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
      }

      .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
      }

      .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
      }

      .gutters-sm > .col,
      .gutters-sm > [class*="col-"] {
        padding-right: 8px;
        padding-left: 8px;
      }
      .mb-3,
      .my-3 {
        margin-bottom: 1rem !important;
      }

      .bg-gray-300 {
        background-color: #e2e8f0;
      }
      .h-100 {
        height: 100% !important;
      }
      .shadow-none {
        box-shadow: none !important;
      }

.main-header__login .dropdown {
    position: relative;
    display: inline-block;
}

.main-header__login .dropdown-menu {
    display: none;
    position: absolute;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 99;
    width: 150px;
}

.main-header__login .dropdown-menu li {
    padding-left:10px;
    
    text-align: left;
}

.main-header__login .dropdown-menu li a {
    text-decoration: none;
    color: gray;
    display: block;
}

.main-header__login .dropdown-menu li a:hover {
     color:#fe7f4c;
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
                                <div class="text mt-3">
                                    <p>27 Mitralok Colony,KrishanNagar,Dehradun</p>
                                </div>
                    </li>
                    <li>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="text mt-3">
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
                                <a href="#" class="dropdown-toggle pt-2"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                                <ul class="dropdown-menu">
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'fundraiser'): ?>
                                        <li class="ps-4 pb-3 pt-2"><a href="profile_dashboard.php">Profile</a></li>
                                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'donor'): ?>
                                        <li class="ps-4 pb-3 pt-2"><a href="index.php">Home</a></li>
                                    <?php endif; ?>
                                    <li><a  class="pb-3" href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account"></i>Login</a>
                                <ul class="dropdown-menu">
                                    <li class="ps-4"><a href="loginFund.php">Login as Fundraiser</a></li>
                                    <li><a href="loginDonor.php">Login as Donor</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account"></i>Register</a>
                                <ul class="dropdown-menu">
                                    <li><a href="registerFund.php">Register as Fundraiser</a></li>
                                    <li><a href="registerDonor.php">Register as Donor</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="main-header__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
         </header>
        <!-- <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div> /.sticky-header__content -->
        <!-- </div>  -->

        <section>
            <div class="header">
            <div class="container">
                <div class="page-header__inner pt-5 mt-5">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>/</span></li>
                        <li>Login</li>
                    </ul>
                    <h2 style="font-size:35px;">Welcome,<?php echo htmlspecialchars($donor['username']); ?>!<span class="ps-2" style="font-size:48px;"><i class="fa-solid fa-user"></i></span></h2>
                </div>
            </div>
            </div>
        </section>
    
        
<section>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2 sidebar">
            
      <img src="assets/images/donors/<?php echo $donor['photo']; ?>" alt="Profile Picture" class="sidebar-img">
    <!-- <h2><?php echo htmlspecialchars($donor['username']); ?></h2> -->
            <nav>
            
        
                <a href="#" id="showProfile">Profile</a>
                <a href="#" id="showCampaigns">Campaigns</a>
                <a href="#" id="showCreateCampaignForm">Donations</a>
                <a href="#" id="ChangePass">Change Password</a>
               
              
            </nav>
        </div>

    <div class="col-md-10 main-content">
            <div id="message" style="display: none; margin: 20px; padding: 10px;"></div>

<div id="profileSection" class="profile-section">
        <h2>Profile Information</h2>
        <div class="container">
            <div class="main-body">
                <div class="col-md-10">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                         <div class="col-sm-3">
                           <h6 class="mb-0">Full Name</h6>
                         </div>
                         <div class="col-sm-9 text-secondary">
                           <?php echo htmlspecialchars($donor['username']); ?>
                         </div>
                        </div>
                        <hr>
                       <div class="row">
                          <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                          </div>
                         <div class="col-sm-9 text-secondary">
                               <?php echo htmlspecialchars($donor['email']); ?>
                        </div>
                      </div>
                       <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo htmlspecialchars($donor['contact_information']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Organization Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo htmlspecialchars($donor['occupation']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo htmlspecialchars($donor['description']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info editfund">Edit</a>
                    </div>
                  </div>
                  </div>
                </div>
               </div>
            </div>
      </div>
</div>
<div id="campaignsSection" class="campaigns-section" style="margin-bottom:90px;">
    <div class="container">
        <div class="row">
            <?php foreach ($campaigns as $campaign):
                $raised_amount = $campaign['raised_amount'];
                $goal_amount = $campaign['goal_amount'];
                $percentageRaised = number_format(($raised_amount / $goal_amount) * 100, 2);
            ?>
            <div class="col-md-4" style="padding-bottom:70px;">
                <div class="project-one__single" style="height: 500px;">
                    <div class="project-one__img-box">
                        <div class="project-one__img" style="height: 250px; overflow: hidden;">
                            <img src="assets/images/campaign/<?php echo $campaign['photo']; ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        
                        <div class="project-one__content">
                            <div class="project-one__tag-and-remaining">
                                <div class="project-one-tag">
                                    <p><?php echo htmlspecialchars($campaign['category']); ?></p>
                                </div>
                            </div>
                            <h3 class="project-one__title"><?php echo htmlspecialchars($campaign['title']); ?></h3>
                            <div class="progress-levels">
                                <div class="progress-box">
                                    <div class="inner count-box">
                                        <div class="bar">
                                            <div class="bar-inner">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000" data-stop="<?php echo $percentageRaised; ?>"><?php echo $percentageRaised; ?>%</span>
                                                </div>
                                                <div class="bar-fill" data-percent="<?php echo $percentageRaised; ?>"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="project-one__goals">
                                <p class="project-one__goals-one"><span><?php echo $campaign['raised_amount']; ?></span><br>Goal of <?php echo $campaign['goal_amount']; ?></p>
                                <p class="project-one__goals-one"><span class="odometer project-one__plus" data-count="12"></span><br>Backers We Got</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


               
<div id="donationSection" class="donation-section container">
  <div class="row">
    <?php foreach ($donations as $donation): ?>
   
    <div class="donation-card col-md-4 m-2">
        <div class="donation-image">
            <img src="assets/images/campaign/<?php echo $donation['photo']; ?>" alt="Campaign Image">
        </div>
        <div class="donation-info">
            <h3><?php echo htmlspecialchars($donation['title']); ?></h3>
            <p><strong>Goal Amount:</strong> $<?php echo htmlspecialchars($donation['goal_amount']); ?></p>
            <p><strong>Raised Amount:</strong> $<?php echo htmlspecialchars($donation['raised_amount']); ?></p>
            <div class="amount-donated">
                <p><strong>Amount Donated:</strong> $<?php echo htmlspecialchars($donation['amount']); ?></p>
                <p><strong>Message:</strong> <?php echo htmlspecialchars($donation['message']); ?></p>
            </div>
        </div>
    </div>
    
    <?php endforeach; ?>
    </div>
</div>


<div id="changePasswordSection" class="change-password-section">
    <h2>Change Password</h2>
    <form id="changePasswordForm">
        <input type="hidden" name="action" value="change_password">
        <div>
            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" required>
        </div>
        <div>
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit">Change Password</button>
        <div id="passwordChangeMessage"></div>
    </form>
</div>

        
<div id="updateFundraiserForm" class="form-section" style="display:none;">
      <div class="container">
        <div class="main-body">
            <div class="col-md-10">
                <div class="card mb-3">
                     <div class="card-body">
                     <div class="col-lg-10">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" id="username" value=" <?php echo htmlspecialchars($donor['username']); ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" id="email" value=" <?php echo htmlspecialchars($donor['email']); ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" id="contact_information" value=" <?php echo htmlspecialchars($donor['contact_information']); ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Occupation</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" id="organization_name" value=" <?php echo htmlspecialchars($donor['occupation']); ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Description</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" id="descriptions" value=" <?php echo htmlspecialchars($donor['description']); ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="button" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
					</div>
                     </div>
                </div>
            </div>
        </div>
      </div>
</div>
        
      </div>
    </div>
</div>
</section>     


    
    

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
    <script src="assets/js/new.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdowns = document.querySelectorAll('.main-header__login .dropdown');
        
        dropdowns.forEach(function(dropdown) {
            var toggle = dropdown.querySelector('.dropdown-toggle');
            var menu = dropdown.querySelector('.dropdown-menu');
            
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                var isOpen = menu.style.display === 'block';
                closeAllDropdowns();
                if (!isOpen) {
                    menu.style.display = 'block';
                }
            });
        });
        
        function closeAllDropdowns() {
            dropdowns.forEach(function(dropdown) {
                var menu = dropdown.querySelector('.dropdown-menu');
                menu.style.display = 'none';
            });
        }
        
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                closeAllDropdowns();
            }
        });
    });
</script>

</body>



</html>







 
