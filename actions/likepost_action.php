<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Set HTTP headers for API response
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Request-With');

// Include helper functions
include('../functions/functions.php');

// Get and decode JSON input data
$input_data = json_decode(file_get_contents("php://input"));

$res;

// Check if input data exists
if (empty($input_data)) {
    $res["msg"] = "No data received";
    echo json_encode($res);
    exit();
}

// Process the like post action
$likePost = likePost($input_data);

// Return response
echo $likePost;