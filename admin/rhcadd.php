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

<head>
    <meta charset="UTF-8">
    <title>Add Ride-Hailing Company</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
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
        <div class="main_content">
            <div class="header">
                <div class="headtext">Add Ride-Hailing Company</div>
            </div>
            <div class="info">
                <div class="content-container" style="display: flex; justify-content: space-between; padding: 2rem; max-width: 1200px; margin: 0 auto;">
                    <div class="form-section" style="flex: 1; background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <h2 style="color: #008080; margin-bottom: 2rem; text-align: center;">Add New Company</h2>
                        <form class="form" id="form" style="max-width: 500px; margin: 0 auto;">
                            <div id="error" class="error"></div>
                            <div id="success" class="success"></div>
                            
                            <div class="input-group" style="margin-bottom: 1.5rem;">
                                <input type="text" id="compname" name="compname" class="input-field" 
                                    placeholder="Ride-Hailing Company Name" required
                                    style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; transition: border-color 0.3s ease;">
                            </div>

                            <div class="input-group" style="margin-bottom: 1.5rem;">
                                <input type="text" id="comploc" name="comploc" class="input-field" 
                                    placeholder="Ride-Hailing Company Location" required
                                    style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; transition: border-color 0.3s ease;">
                            </div>

                            <div class="input-group" style="margin-bottom: 1.5rem;">
                                <input type="text" name="contactNum" id="contactNum" 
                                    pattern="^\(?\d{1,3}\)?[- ]?\d{3}[- ]?\d{3}[- ]?\d{4}$" 
                                    placeholder="Contact Number"
                                    style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; transition: border-color 0.3s ease;">
                            </div>

                            <div class="input-group" style="margin-bottom: 1.5rem;">
                                <input type="email" name="compemail" id="compemail" 
                                    pattern="^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$" 
                                    placeholder="Email"
                                    style="width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; transition: border-color 0.3s ease;">
                            </div>

                            <button type="submit" id="submit" 
                                style="width: 100%; padding: 12px; background: #008080; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">
                                Submit
                            </button>
                        </form>
                    </div>

                    <div class="view-section" style="flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-left: 2rem;">
                        <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;">
                            <i class="fa-solid fa-building" style="color:#008080; font-size: 100px; margin-bottom: 1.5rem;"></i>
                            <h3 style="color: #008080; margin-bottom: 1.5rem;">View Existing Companies</h3>
                            <a href="../admin/rhcdisplay.php">
                                <button style="padding: 12px 24px; background: #008080; color: white; border: none; border-radius: 8px; font-size: 16px; cursor: pointer; transition: background-color 0.3s ease;">
                                    View Companies
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/addrhc.js"></script>
</body>

</html>