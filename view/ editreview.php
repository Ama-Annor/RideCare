<?php
include "../settings/core.php";
ifLoggedIn();
$user_role = getUserRole();
$user_id = getUserID();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Review</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
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
        <div class="main_content">
            <div class="header">
                <div class="headtext">Edit Review</div>
            </div>
            <div class="info">
                <div class="reptform">
                    <div class="left-side">
                        <i class="fa-brands fa-speakap" style="color:#008080; font-size: 200px"></i>
                        <div class="shorttext">
                            Be a part of something bigger.
                            <br><br>
                            Make others safe by <span class="spec" style="color:#E41D9E">
                                saying if</span>.
                        </div>
                    </div>
                    <div class="right-side">
                        <p>If you encounter any inappropriate behavior, harassment, or concerning incidents while using
                            a ride hailing service, please don't hesitate to report it. </p>
                        <p>Your report will help us maintain a safe and
                            welcoming community for everyone.</p>
                        <div class="error" id="error"></div>
                        <form class="form" id="form" method="post">
                            <div class="ratingsstar">
                                <div class="rating-box">
                                    <header>How was your experience?</header>
                                    <div class="stars">
                                        <i class="fa-solid fa-star" id="star1"></i>
                                        <i class="fa-solid fa-star" id="star2"></i>
                                        <i class="fa-solid fa-star" id="star3"></i>
                                        <i class="fa-solid fa-star" id="star4"></i>
                                        <i class="fa-solid fa-star" id="star5"></i>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <label for="review">Review Description:</label>
                            <br>
                            <textarea id="ReviewDescription" name="review_description" required></textarea>
                            <br>
                            <button type="submit" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/editreview.js"></script>
</body>

</html>