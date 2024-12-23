<?php
include "../settings/core.php";
ifLoggedIn();
$user_role = getUserRole();
$user_id = getUserID();
$gender = getGender();

// if ($gender == 1) {
//     header("Location: ../view/userdash.php");
//     die();
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>We Care - Supportive Space</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

</head>

<body style="background-color: #f5f7fa !important;">
    <div class="wrapper">
        <?php if ($user_role == 1) { ?>

            <div class="sidebar">
                <div class="logo">
                    <a href="../admin/admindash.php"><img src="../images/logo.png"></a>
                </div>
                <ul>
                    <li><a href="../admin/admindash.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Locate Driver</a></li>
                    <li><a href="../view/viewreports.php"><i class="fas fa-comments"></i></i>View Reports</a></li>
                    <li><a href="../admin/rhcadd.php"><i class="fas fa-address-card"></i>Add RH Company</a></li>
                    <?php if ($gender == 2 && $user_role == 1) { ?> <li><a href="../view/forum.php"><i class="fa-solid fa-users"></i> Forum</a></li>
                    <?php } ?> <li><a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-top: 135px;"></i> Logout</a></li>
                </ul>
            </div>
        <?php } else { ?>

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
        <div class="main_content">
            <div class="header">
                <div class="headtext">Let Us Know!</div>
            </div>
            <div class="info" style="display:block;justify-content:center;">
                <a href="../view/addpost.php"><button>Add Post</button></a>
            </div>
            <div id="reviews">

            </div>
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

            <div class="userprof">


            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/getposts.js"></script>
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
    <script src="../js/addpost.js"></script>
    <script>
        $(document).on("click", "#like-button", function() {
            var posid = $(this).data("posid");
            $.ajax({
                url: "../actions/likepost_action.php",
                method: "post",
                data: JSON.stringify({
                    posid: posid,
                }),
                dataType: "json",
                success: (data, status) => {
                    console.log(data, status);
                    if (data.status == 200) {
                        $(this).siblings("#engagement_count").html(data.engagement_count);
                    }
                    if (data.status == 201) {
                        $(this).siblings("#engagement_count").html(data.engagement_count);
                    }
                },
                error: (error) => {
                    console.error("Error:", error);
                },
            });
        });
    </script>
    <script>
        function confirmDelete(posid) {
            if (confirm("Are you sure you want to delete this post?")) {

                $.ajax({
                    url: "../actions/deletepost_action.php",
                    method: "post",
                    data: JSON.stringify({
                        posid: posid,
                    }),
                    dataType: "json",
                    success: (data, status) => {
                        console.log(data, status);
                        console.log(did + " " + revid);
                        if (data.status == 201) {
                            response = data;

                            alert("Post deleted successfully");
                            window.location.href = "../view/forum.php";
                        }
                    },
                    error: (error) => {
                        $("#error").html(error.error);
                    },
                });
            }
        }
    </script>

</body>

</html>