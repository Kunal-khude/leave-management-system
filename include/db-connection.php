<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "leave_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// $sql = "SELECT * FROM users;";
// print $conn->query($sql);
