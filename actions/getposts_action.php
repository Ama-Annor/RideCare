<?php

// Set HTTP headers for API response
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Request-With');

// Include helper functions
include('../functions/functions.php');

// Get and return all posts
$getPosts = getPosts();

echo $getPosts;