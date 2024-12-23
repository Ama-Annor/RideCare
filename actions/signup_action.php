<?php


header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers, Authorization, X-Request-With');

include (__DIR__.'/../functions/functions.php');

$inputData = json_decode(file_get_contents("php://input"));

$res;

if (empty($inputData)) {
    $res["message"] = "No data received";
    $res["status"] = "Failed";
    echo json_encode($res);
    exit();
}
$signupUser = signupUser($inputData);

echo json_encode($signupUser);