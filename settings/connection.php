<?php
$servername = "localhost";
$username = "root"; //ama.annor
$password = "";
$database = "rideCare"; //webtech_fall2024_ama_annor

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}