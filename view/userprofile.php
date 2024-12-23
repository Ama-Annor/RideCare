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
    <title>Profile - User</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body style="background-color: #f5f7fa !important;">
    <div class="wrapper">
        <!-- Sidebar navigation -->
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
                <?php if ($gender == 2 || $user_role == 1) { ?> <li><a href="../view/forum.php"><i class="fa-solid fa-users"></i> Forum</a></li>
                <?php } ?> <li><a href="../view/viewreports.php"><i class="fas fa-eye"></i> View Reports</a></li>
                <li><a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-top: 135px;"></i> Logout</a></li>
            </ul>
        </div>
        <!-- Main content area -->
        <div class="main_content">
            <div class="header">
                <div class="headtext">User Profile</div>
            </div>
            <!-- User profile information -->
            <div class="info">
                <div class="userprof">
                    <div class="username" id="username">
                        <h1 id="usernameh1">@ </h1>
                        <span id="email"> </span>
                    </div>
                    <div class="profdescription">
                        <p><i>Contact:</i></p>

                        <p id="contact"> </p>
                    </div>
                    <ul class="profstats">
                        <li><span id="numreviews"> </span>Reviews</li>
                        <li><span id="numposts"> </span>Posts</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/profile.js"></script>
</body>

</html>