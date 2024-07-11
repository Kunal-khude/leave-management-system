<?php
// Assuming you've already set up database connection here
$server_name = $_SERVER['SERVER_NAME'];
$base_url = "http://" . $server_name . "/leave-management-system";
// include('../include/db-connection.php');
define('ROOT_PATH', dirname(__DIR__) . '/');
include(ROOT_PATH . '/include/db-connection.php');
error_reporting(E_ERROR | E_PARSE);
// Check if 'id' parameter is passed through POST or GET method
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // SQL to delete a record
    $sql = "DELETE FROM `users` WHERE id = $id"; // Replace 'table_name' with your table name

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided";
}

// Close connection
$conn->close();
