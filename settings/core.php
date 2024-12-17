<?php
// Start the session for user authentication and data persistence
session_start();

// Check if user is logged in, redirect to login if not
function ifLoggedIn()
{
    if (!($_SESSION['user_id'])) {
        header("Location: ../login/login_view.php");
        die();
    }
}

// Get the user's gender from session, return false if not set
function getGender()
{
    if (!($_SESSION['gender'])) {
        return false;
    } else {
        return $_SESSION['gender'];
    }
}

// Get the user's role from session, return false if not set
function getUserRole()
{
    if (!($_SESSION['user_role'])) {
        return false;
    } else {
        return $_SESSION['user_role'];
    }
}

// Get the user's ID from session, return false if not set
function getUserID()
{
    if (!($_SESSION['user_id'])) {
        return false;
    } else {
        return $_SESSION['user_id'];
    }
}

?>