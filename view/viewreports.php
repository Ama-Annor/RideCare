<!-- viewreports.php - Main page for viewing incident reports -->
<?php
// Include core functionality and check user authentication
include "../settings/core.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <title>All Ride-Hailing Companies</title>
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
                <div class="headtext">View Reports</div>
            </div>
            <!-- Report incident button -->
            <div class="info" style="display:flex; justify-content:flex-end; margin-bottom:20px; margin-right:60px; text-align:inline"><a href="../view/reportinc.php"><button style="width: 150px; padding: 10px; font-size: 16px;">Report Incident</button></a></div>
            <!-- Reports table -->
            <div class="info">
                <table>
                    <thead>
                        <tr>
                            <?php
                            if ($_SESSION['user_role'] == 1) { ?>
                                <th>User Email</th>
                            <?php } ?>
                            <th>Driver</th>
                            <th>Company</th>
                            <th>Incident Date</th>
                            <th>Incident Description</th>
                        </tr>
                    </thead>
                    <tbody id="display_report_data">
                    </tbody>
                </table>
            </div>
            <!-- Back to top button -->
            <i class="fas fa-arrow-up" class="backToTopBtn" id="backToTopBtn" style="color: white;
  background-color: #008080;
  width: 30px;
  height: 30px;
  font-size: 27px;
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: flex;
  justify-content: center;
  align-items: center;"></i>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/viewreport.js">
    </script>
    <script>
        // Back to top button functionality
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