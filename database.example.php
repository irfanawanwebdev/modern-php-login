<?php

$hostName = "your_host";
$dbUser = "your_username";
$dbPassword = "your_password";
$dbName = "your_database";


// Create Connection

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check Connection

if ($conn->connect_error) {
    die('Connection Failed ' . $conn->connect_error);
}


?>
