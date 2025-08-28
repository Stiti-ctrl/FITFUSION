<?php
$servername = "localhost";  // Your server name (usually localhost)
$username = "root";         // Your database username
$password = "";             // Your database password (leave empty if none)
$dbname = "fitfusion2";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


