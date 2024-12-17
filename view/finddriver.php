<?php
// Core includes and user authentication
include "../settings/core.php";
ifLoggedIn();
$user_role = getUserRole();
$user_id = getUserID();
$gender = getGender();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and resources -->
    <meta charset="UTF-8">
    <title>Find Driver</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body style="background-color: #f5f7fa !important;">
    <div class="wrapper">
        <?php if ($user_role == 1) { ?>
            <!-- Admin sidebar navigation -->
            <div class="sidebar">
                <div class="logo">
                    <a href="../admin/admindash.php"><img src="../images/logo.png"></a>
                </div>
                <ul>
                    <li><a href="../admin/admindash.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Find Driver</a></li>
                    <li><a href="../view/viewreports.php"><i class="fas fa-comments"></i></i>View Reports</a></li>
                    <li><a href="../admin/rhcadd.php"><i class="fas fa-address-card"></i>Add RH Company</a></li>
                    <?php if ($gender == 2 || $user_role == 1) { ?> <li><a href="../view/forum.php"><i class="fa-solid fa-users"></i> Forum</a></li>
                    <?php } ?> <li><a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-top: 135px;"></i> Logout</a></li>
                </ul>
            </div>
        <?php } else { ?>
            <!-- User sidebar navigation -->
            <div class="sidebar">
                <div class="logo">
                    <a href="../view/userdash.php"><img src="../images/logo.png"></a>
                </div>
                <ul>
                    <li><a href="../view/userdash.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="../view/userprofile.php"><i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Find Driver</a></li>
                    <li><a href="../view/reviewdriver.php"><i class="fas fa-comments"></i></i>Review Driver</a></li>
                    <li><a href="../view/reportinc.php"><i class="fas fa-address-card"></i>Report Incident</a></li>
                    <li><a href="../view/viewreports.php"><i class="fas fa-eye"></i> View Reports</a></li>
                    <?php if ($gender == 2 || $user_role == 1) { ?> <li><a href="../view/forum.php"><i class="fa-solid fa-users"></i> Forum</a></li>
                    <?php } ?> <li><a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-top: 15px;"></i> Logout</a></li>
                </ul>
            </div>
        <?php } ?>
        <!-- Main content area -->
        <div class="main_content">
            <div class="header">
                <div class="headtext">Find Driver</div>
            </div>
            <!-- Search interface -->
            <div class="info" id="searchinfo">
                <div class="searchboxwrapper" id="searchboxwrapper">
                    <div class="searchboxitem searchboxitem1">
                        <div class="searchbox">
                            <input type="text" id="input_search" class="input_search" placeholder="Search Drivers or Car Plate Numbers">
                            <span class="icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                        <button id="submit">Search</button>
                    </div>

                </div>
                <!-- Error message display -->
                <div class="error" id="error" style="color:#008080; display: flex; justify-content: center; align-items: center; margin-top:20px; font-size: 24px; font-weight: bold;"> </div>

                <!-- Search results container -->
                <div class="results" id="results" style="width:80%; display: flex; margin-left:70px; align-items: center;">
                </div>

                <!-- Footer tagline -->
                <div style="position: fixed; bottom: 40px; left: 50%; transform: translateX(-50%); text-align: center; opacity: 0.7;">
                    <h1 style="color: #666;">
                    Ride Care: Your Journey, Your Safety, Our Priority. 
                    </h1>
                </div>

            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/search.js"></script>
    <!-- Back to top functionality -->
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#backToTopBtn').fadeIn();
                } else {
                    $('#backToTopBtn').fadeOut();
                }
            });

            $('#backToTopBtn').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });
        });
    </script>
</body>

</html>