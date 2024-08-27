<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.main-header__login .dropdown {
    position: relative;
    display: inline-block;
}

.main-header__login .dropdown-menu {
    display: none;
    position: absolute;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
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
.button {
        background-color: #fd7e14;
        color: white;
        border: none;
        padding: 8px;
        border-radius: 4px;
        cursor: pointer;
        /* margin-top: 10px; */
      }

      .button:hover {
        color: white;
        background-color: black;
      }






</style>
</head>
<body>
<header class="main-header">
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
                                    <p><a href="mailto:Ks6741948@gmail.com">ks6741948@gmail.com</a></p>
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
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'fundraiser'): ?>
                                        <li class="ps-4"><a href="profile_dashboard">Profile</a></li>
                                    <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'donor'): ?>
                                        <li class="ps-4"><a href="profile">Profile</a></li>
                                    <?php endif; ?>
                                    <li><a href="logout">Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account"></i>Login</a>
                                <ul class="dropdown-menu">
                                    <li class="ps-4"><a href="loginFund">Login as Fundraiser</a></li>
                                    <li><a href="loginDonor">Login as Donor</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-account"></i>Register</a>
                                <ul class="dropdown-menu">
                                    <li><a href="registerFund">Register as Fundraiser</a></li>
                                    <li><a href="registerDonor">Register as Donor</a></li>
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
            <nav class="main-menu">
                <div class="main-menu__wrapper">
                    <div class="main-menu__wrapper-inner clearfix">
                        <div class="main-menu__left">
                            <div class="main-menu__logo">
                                <a href="index.php"><img src="assets/images/resources/logo-1.png" alt=""></a>
                            </div>
                            <div class="main-menu__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="index">Home </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Pages</a>
                                        <ul class="shadow-box">
                                        <li><a href="about">About</a></li>
                                        <li><a href="campaigns">Campaigns</a></li>
                                        <li><a href="volunteer">Volunteers</a></li>
                                        <li><a href="donation">Donors</a></li>
                                        
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Explore</a>
                                        <ul class="shadow-box">
                                        <li><a href="faq.php">How it work</a></li>
                                        <!-- <li><a href="fundraisers.php"> Be a Fundraiser</a></li>
                                        <li><a href="donors.php">Be a Donor</a></li> -->
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu__right">
                            <div class="main-menu__call-search-btn-box">
                                <div class="main-menu__call">
                                    <!-- <div class="main-menu__call-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="main-menu__call-content">
                                        <p class="main-menu__call-sub-title">Call Anytime</p>
                                        <h5 class="main-menu__call-number"><a href="tel:6397490046">6397490046</a></h5>
                                    </div> -->
                                </div>
                                <div class="main-menu__search-box">
                                     <form id="search-form" action="search_results.php" method="get">
                                     <input type="text" name="query" style="color:grey;" placeholder="Search campaigns..." required>
                                     <button type="submit" class="btn button">Search</button>
                                     </form>
                                </div>
                                
                                <div class="main-menu__btn-box">
                                 <a href="loginFund" class="thm-btn main-menu__btn"><i class="icon-plus-symbol"></i>Add a Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
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