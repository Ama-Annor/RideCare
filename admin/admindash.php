<?php
// Core includes and user authentication
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Styles for quick action cards and layout -->
    <style>
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            padding: 1.5rem;
            max-width: calc(100% - 225px); /* Account for sidebar width */
            margin: 0 auto;
        }

        .quick-actions a {
            text-decoration: none;
            color: #008080;
        }

        .quick-action {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.06);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-height: 180px;
            border: 1px solid transparent;
        }

        .quick-action::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #008080, #006666);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .quick-action:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.12);
            border-color: #008080;
        }

        .quick-action:hover::before {
            opacity: 0.05;
        }

        .quick-action i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #008080;
            position: relative;
            z-index: 2;
            transition: transform 0.3s ease;
        }

        .quick-action:hover i {
            transform: scale(1.1);
        }

        .quick-action span {
            font-size: 1rem;
            font-weight: 600;
            text-align: center;
            position: relative;
            z-index: 2;
            transition: color 0.3s ease;
            background: linear-gradient(135deg, #008080, #006666);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            padding: 0.3rem 0;
        }

        .quick-action:hover span {
            letter-spacing: 0.3px;
        }

        @media (max-width: 1200px) {
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .quick-actions {
                grid-template-columns: 1fr;
                padding: 1rem;
            }
            
            .quick-action {
                min-height: 160px;
            }
        }
    </style>
</head>

<!-- Admin dashboard for managing RideCare system -->

<body style="background-color: #f5f7fa !important;">
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
                <div class="headtext">Admin Dashboard</div>
            </div>
            <!-- Quick action cards grid -->
            <div class="info">
                <div class="quick-actions">
                    <a href="../view/finddriver.php" class="quick-action">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>Locate Driver</span>
                    </a>
                    <a href="../admin/rhcadd.php" class="quick-action">
                        <i class="fas fa-comments"></i>
                        <span>Add RHC Driver</span>
                    </a>
                    <a href="../admin/rhcdisplay.php" class="quick-action">
                        <i class="fas fa-address-card"></i>
                        <span>View RHC</span>
                    </a>
                    <a href="../view/forum.php" class="quick-action">
                        <i class="fa-solid fa-users"></i>
                        <span>Forum</span>
                    </a>
                    <a href="../view/viewreports.php" class="quick-action">
                        <i class="fas fa-eye"></i>
                        <span>View Reports</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- External scripts -->
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>

</body>

</html>