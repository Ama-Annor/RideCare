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
    <title>Review Driver</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <style>
        /* Form Container Styles */
        .reptform {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .center {
            width: 100%;
        }

        .center p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        /* Form Element Styles */
        .form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .input-field,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            background: #f8f9fa;
        }

        .input-field:focus,
        select:focus,
        textarea:focus {
            border-color: #4a90e2;
            outline: none;
            box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        }

        /* Radio Button Styles */
        .radio {
            grid-column: 1 / -1;
            display: flex;
            gap: 2rem;
            align-items: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .radio input[type="radio"] {
            margin-right: 8px;
        }

        .radio label {
            color: #555;
            cursor: pointer;
        }

        /* Star Rating Styles */
        .ratingsstar {
            grid-column: 1 / -1;
        }

        .rating-box {
            text-align: center;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .rating-box header {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .stars {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .stars i {
            font-size: 1.5rem;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .stars i:hover,
        .stars i.active {
            color: #ffd700;
        }

        /* Text Area Styles */
        textarea {
            grid-column: 1 / -1;
            min-height: 150px;
            resize: vertical;
        }

        /* Submit Button Styles */
        #submit {
            grid-column: 1 / -1;
            padding: 1rem 2rem;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #submit:hover {
            background: #357abd;
        }

        /* Error Message Styles */
        .error {
            grid-column: 1 / -1;
            color: #dc3545;
            padding: 0.5rem;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form {
                grid-template-columns: 1fr;
            }

            .reptform {
                margin: 1rem;
                padding: 1rem;
            }

            .radio {
                flex-direction: column;
                gap: 1rem;
            }

            .stars i {
                font-size: 1.2rem;
            }
        }

        /* Full-width elements */
        #phone_number,
        #rideHailingCompany {
            grid-column: 1 / -1;
        }

        /* Optional: Animation for form elements */
        .input-field,
        select,
        textarea {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
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
                <li><a href="../view/finddriver.php"><i class="fa-solid fa-magnifying-glass"></i> Find Driver</a></li>
                <li><a href="../view/reviewdriver.php"><i class="fas fa-comments"></i></i>Review Driver</a></li>
                <li><a href="../view/reportinc.php"><i class="fas fa-address-card"></i>Report Incident</a></li>

                <li><a href="../view/viewreports.php"><i class="fas fa-eye"></i> View Reports</a></li>
                <?php if ($gender == 2 || $user_role == 1) { ?> <li><a href="../view/forum.php"><i class="fa-solid fa-users"></i> Forum</a></li>
                <?php } ?> <li><a href="../login/logout.php"><i class="fa-solid fa-right-from-bracket" style="margin-top: 15px;"></i> Logout</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="header">
                <div class="headtext">Review Driver</div>
            </div>
            <div class="info">
                <div class="reptform">
                    <div class="center">
                        <p>Your feedback is invaluable in ensuring a safe and enjoyable experience for all passengers.
                        </p>
                        <form class="form" id="form">
                            <div id="error" class="error"></div>
                            <input type="text" id="firstName" name="fname" class="input-field" placeholder="Driver First Name" required>
                            <input type="text" id="lastName" name="lname" class="input-field" placeholder="Driver Last Name">
                            <div class="radio">
                                <input type="radio" name="gender" id="gender-male" checked="checked" value="1" />
                                <label for="gender-male">Male</label>
                                <input type="radio" name="gender" id="gender-female" value="2" />
                                <label for="gender-female">Female</label>
                            </div>
                            <input type="text" name="phone_number" id="phone_number" pattern="^\(?\d{1,3}\)?[- ]?\d{3}[- ]?\d{3}[- ]?\d{4}$" placeholder="Phone Number">
                            <select id="rideHailingCompany" name="ride_hailing_company" required>
                                <option value="" selected disabled>Select Ride-Hailing Company</option>
                            </select>
                            <input type="text" id="carMake" name="make" class="input-field" placeholder="Make" required>
                            <input type="text" id="carModel" name="model" class="input-field" placeholder="Model">
                            <input type="text" id="carColor" name="color" class="input-field" placeholder="Color" required>
                            <input type="text" id="plateNumber" name="plate_number" class="input-field" pattern="^[A-Z]{2,3}-\d{1,4}-[A-Z]?$|^[\d]{1,4}-[A-Z]{2,3}-[A-Z]?$|^[A-Z]{1,2}-\d{1,4}$" placeholder="Car Plate Number" required>
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

                            <textarea 
                                id="ReviewDescription" 
                                name="review_description" 
                                placeholder="Share your experience with this driver..."
                                required
                                style="grid-column: 1 / -1; min-height: 150px; margin-top: 1rem;"
                            ></textarea>


                            <button type="submit" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/rating.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../actions/viewrhc_action.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    response = data;
                    let result = "";
                    response.data.forEach((element) => {
                        result += "<option value='" + element.comid + "'>";
                        result += element.company_name + "</option>";
                    });
                    document.getElementById("rideHailingCompany").innerHTML += result;;
                },
                error: function(error) {
                    console.error('Error fetching ride-hailing companies:', error);
                }
            });
        });
    </script>
    <script src="../js/reviewdriver.js"></script>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
</body>

</html>