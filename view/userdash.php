<?php
include "../settings/core.php";
ifLoggedIn();
$user_role = getUserRole();
$user_id = getUserID();
$gender = getGender();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>User Home</title>
  <link rel="stylesheet" href="../css/dashstyle.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <style>
    :root {
        --sidebar-teal: #008080;
        --main-bg: #f5f7fa;
        --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --hover-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .wrapper {
        background: var(--main-bg);
    }

    .main_content {
        background: var(--main-bg);
    }

    .info {
        background: var(--main-bg);
        padding: 2rem;
    }

    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        padding: 1rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .quick-action {
        background-color: white;
        border-radius: 16px;
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
        box-shadow: var(--card-shadow);
        text-decoration: none;
        aspect-ratio: 1;
    }

    .quick-action:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow);
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
    }

    .quick-action i {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        color: var(--sidebar-teal);
        transition: transform 0.3s ease;
    }

    .quick-action:hover i {
        transform: scale(1.1);
    }

    .quick-action span {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c3e50;
        text-align: center;
    }

    .header {
        background: white;
        border-bottom: 1px solid #e0e0e0;
        padding: 1rem 2rem;
    }

    .headtext {
        color: var(--sidebar-teal);
        font-size: 1.5rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .quick-actions {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 0.5rem;
        }

        .quick-action {
            padding: 1.5rem;
        }

        .quick-action i {
            font-size: 2.5rem;
        }

        .quick-action span {
            font-size: 1.1rem;
        }
    }
  </style>
  </style>
</head>

<body style="background-color: #f5f7fa !important;">
  <div class="wrapper">
    <div class="sidebar">
      <div class="logo">
        <a href="../view/userdash.php"><img src="../images/logo.png"></a>
      </div>
      <ul>
        <li><a href="../view/userdash.php"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="../view/userprofile.php"><i class="fas fa-user"></i>Profile</a></li>
        <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Find Driver</a></li>
        <li><a href="../view/reviewdriver.php"><i class="fas fa-comments"></i> Review Driver</a></li>
        <li><a href="../view/reportinc.php"><i class="fas fa-address-card"></i> Report Incident</a></li>
        <?php if ($gender == 2 || $user_role == 1) { ?> <li><a href="../view/forum.php"><i class="fa-solid fa-users"></i> Forum</a></li>
        <?php } ?> <li><a href="../view/viewreports.php"><i class="fas fa-eye"></i> View Reports</a></li>
        <li><a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-top: 120px;"></i> Logout</a></li>
      </ul>
    </div>
    <div class="main_content">
      <div class="header">
        <div class="headtext">User Home</div>
      </div>
      <div class="info">
        <div class="quick-actions">
          <a href="../view/finddriver.php" class="quick-action">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span>Find Driver</span>
          </a>
          <a href="../view/reviewdriver.php" class="quick-action">
            <i class="fas fa-comments"></i>
            <span>Review Driver</span>
          </a>
          <a href="../view/reportinc.php" class="quick-action">
            <i class="fas fa-address-card"></i>
            <span>Report Incident</span>
          </a>
          <?php if ($gender == 2 || $user_role == 1) { ?> <a href="../view/forum.php" class="quick-action">
              <i class="fa-solid fa-users"></i>
              <span>Forum</span>
            </a>
          <?php } ?>

          <a href="../view/viewreports.php" class="quick-action">
            <i class="fas fa-eye"></i>
            <span>View Reports</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
</body>

</html>