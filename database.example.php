<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'database_user');
define('DB_PASS', '');
define('DB_NAME', 'database_name');


// Create Connection

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check Connection

if ($conn->connect_error) {
    die('Connection Failed ' . $conn->connect_error);
}

?>