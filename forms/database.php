<?php
// database.php

$servername = "localhost"; // or your server name
$username = "root";        // your DB username
$password = "";            // your DB password
$database = "hospital_db"; // your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
