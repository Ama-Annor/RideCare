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
    <!-- Meta tags and resource includes -->
    <meta charset="UTF-8">
    <title>Driver Detail</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <?php if ($user_role == 1) { ?>
            <!-- Admin sidebar navigation -->
            <div class="sidebar">
                <div class="logo">
                    <a href="../admin/admindash.php"><img src="../images/logo.png"></a>
                </div>
                <ul>
                    <li><a href="../admin/admindash.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Locate Driver</a></li>
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
                    <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Locate Driver</a></li>
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
                <div class="headtext">Driver Detail</div>
            </div>
            <!-- Driver profile information -->
            <div class="info">
                <div class="userprof">
                    <div class="username" id="username">
                        <h1 id="drivername"> </h1>
                        <span id="contact"> </span>
                        <span> | </span>
                        <span id="gender"> </span>
                    </div>
                    <div class="profdescription">
                        <p id="cardetails"> </p>
                        <p id="carplate"> </p>
                        <p id="rhcomp"> </p>
                    </div>
                    <ul class="profstats">
                        <li><span id="numreviews"> </span>Review(s)</li>
                        <li><span id="avgrating"> </span>Average Rating</li>
                    </ul>
                    <div class="reviewbutton" id="reviewbutton" style="display:flex;margin-top:10px;justify-content:center;">
                    </div>
                    <div id="reviews">
                    </div>
                    <!-- Back to top button (commented out) -->
                    <!-- <i class="fas fa-arrow-up" class="backToTopBtn" id="backToTopBtn" style="color: white;
  background-color: #008080;
  width: 30px;
  height: 30px;
  font-size: 27px;
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: flex;
  justify-content: center;
  align-items: center;"></i> -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- External scripts -->
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/driverdetails.js"> </script>
    <script src="../js/driverreviews.js"> </script>
    <script src="../js/deletereview.js"></script>
    <!-- Review deletion confirmation handler -->
    <script>
        function confirmDelete(revid, did) {
            if (confirm("Are you sure you want to delete this review?")) {

                $.ajax({
                    url: "../actions/deletereview_action.php",
                    method: "post",
                    data: JSON.stringify({
                        revid: revid,
                    }),
                    dataType: "json",
                    success: (data, status) => {
                        console.log(data, status);
                        console.log(did + " " + revid);
                        if (data.status == 201) {
                            response = data;

                            alert("Review deleted successfully");
                            window.location.href = "../view/driverdetails.php?did=" + did;
                        }
                    },
                    error: (error) => {
                        $("#error").html(error.error);
                    },
                });
            }
        }
    </script>
    <!-- Back to top button functionality -->
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