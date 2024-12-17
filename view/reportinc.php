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
    <title>Submit an Incident Report</title>
    <link rel="stylesheet" href="../css/dashstyle.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<style>
    :root {
    --sidebar-teal: #008080; /* Your sidebar teal color */
    --main-bg: #f5f7fa; /* Light blue-grey background */
}

/* Add/modify these rules */
.main_content {
    background: var(--main-bg);
}

.reptform {
    max-width: 800px;
    margin: 2rem auto;
    padding: 2.5rem;
    background: white; /* Keep form background white for contrast */
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

/* Optional: Style the header to match */
.header {
    background: white;
    border-bottom: 1px solid #e0e0e0;
}

.headtext {
    color: var(--sidebar-teal);
}
    
    .reptform {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2.5rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .center {
        width: 100%;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .center p {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        text-align: center;
        line-height: 1.6;
    }

    /* Form Element Styles */
    .form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #444;
        font-weight: 500;
        font-size: 1rem;
    }

    /* Select Dropdown Styling */
    #driverSelect {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f8f9fa;
        font-size: 1rem;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #driverSelect:hover {
        border-color: #4a90e2;
    }

    #driverSelect:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        outline: none;
    }

    /* Date Input Styling */
    #incidentDate {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f8f9fa;
        font-size: 1rem;
        color: #333;
        transition: all 0.3s ease;
    }

    #incidentDate:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        outline: none;
    }

    /* Textarea Styling */
    #incidentDescription {
        width: 100%;
        min-height: 150px;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f8f9fa;
        font-size: 1rem;
        resize: vertical;
        transition: all 0.3s ease;
        font-family: inherit;
    }

    #incidentDescription:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 2px rgba(74, 144, 226, 0.2);
        outline: none;
    }

    /* Submit Button Styling */
    #submit {
        width: 100%;
        padding: 1rem 2rem;
        background: #008080;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 1rem;
    }

    #submit:hover {
        background: #006666;
    }

    /* Animation */
    .form-group {
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .reptform {
            margin: 1rem;
            padding: 1.5rem;
        }

        .center p {
            font-size: 1rem;
        }

        #submit {
            padding: 0.8rem 1.5rem;
        }
    }
</style>


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
                <div class="headtext">Incident Report Submission</div>
            </div>
            <div class="info">
                <div class="reptform">
                    <div class="center">
                        <p>If you encounter any inappropriate behavior, harassment, or concerning incidents while using
                            a ride hailing service, please don't hesitate to report it. </p>
                        <p>Your report will help us maintain a safe and
                            welcoming community for everyone.</p>
                        <div class="error" id="error"></div>
                        <form class="form" id="form" method="post">
                            <select id="driverSelect" name="did" required>
                                <option value="">Select Driver Name</option>
                            </select>
                            <br>
                            <label for="incidentDate">Description of Incident:</label>
                            <br>
                            <textarea id="incidentDescription" name="report_description" required></textarea>
                            <br>
                            <label for="incidentDate">Incident Date:</label>
                            <br>
                            <input type="date" id="incidentDate" name="incident_date" required>
                            <button type="submit" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/88061bebc5.js" crossorigin="anonymous"></script>
    <script src="../js/reportinc.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../actions/viewdriver_action.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    response = data;
                    let result = "";
                    response.data.forEach((element) => {
                        result += "<option value='" + element.did + "'>";
                        result += element.fname + " " + element.lname + "</option>";
                    });
                    document.getElementById("driverSelect").innerHTML += result;;
                },
                error: function(error) {
                    console.log('Error fetching ride-hailing companies:', error);
                }
            });
        });
    </script>
</body>

</html>