<!-- Main RHC display page for viewing all ride-hailing companies -->
<?php
include "../settings/core.php";

ifLoggedIn();
$user_role = getUserRole();
$user_id = getUserID();
$gender = getGender();
if ($user_role != 1) {
    header("Location: ../view/userdash.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Header section with meta tags and resources -->
<head>
    <meta charset="UTF-8">
    <title>All Ride-Hailing Companies</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

</head>

<body>
    <!-- Main wrapper container -->
    <div class="wrapper">
        <!-- Sidebar navigation -->
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
        <!-- Main content area -->
        <div class="main_content">
            <div class="header">
                <div class="headtext">All Ride-Hailing Companies</div>
            </div>
            <!-- Add company button section -->
            <div class="info" style="display:flex; justify-content:flex-end; margin-bottom:20px; margin-right:60px; text-align:inline"><a href="../admin/rhcadd.php"><button style="width: 150px; padding: 10px; font-size: 16px;">Add Company</button></a></div>
            <!-- Table display section -->
            <div class="info">
                <table>
                    <thead>
                        <tr>
                            <th>Ride-Hailing Company Name</th>
                            <th>Location</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <!-- Import delete btn functionality from view/viewreports.php to this page -->
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <tbody id="display_rhc_data">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!-- External scripts -->
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/viewrhc.js">
        const urlParams = new URLSearchParams(window.location.search);
        const data = decodeURIComponent(urlParams.get('data'));
    </script>
</body>

</html>