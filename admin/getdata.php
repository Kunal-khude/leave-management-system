<?php
$server_name = $_SERVER['SERVER_NAME'];
$base_url = "http://" . $server_name . "/leave-management-system";
// include('../include/db-connection.php');
define('ROOT_PATH', dirname(__DIR__) . '/');
include(ROOT_PATH . '/include/db-connection.php');
error_reporting(E_ERROR | E_PARSE);
// Connect to database and initialize $conn if not already done
// Example:
// $conn = new mysqli($servername, $username, $password, $dbname);

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Assuming POST data contains JSON
    $postData = file_get_contents("php://input");

    // Decode JSON data
    $jsonData = json_decode($postData);

    // Access data elements
    $employeeId = $jsonData->employeeId;

    // $employeeId = intval($_POST['employeeId']);

    // Fetch user data from database
    $sql = "SELECT * FROM `users` WHERE `id` = '$employeeId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Prepare data to send back as JSON
        $response = [
            'success' => true,
            'full_name' => htmlspecialchars($row['full_name']),
            'email' => htmlspecialchars($row['email']),
            'department' => htmlspecialchars($row['department'])
        ];
    } else {
        // Handle case where no user is found
        $response = [
            'success' => false,
            'message' => 'No user found with ID: ' . $employeeId
        ];
    }

    // Send JSON response back to JavaScript
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Ensure to exit to prevent further execution
}

// Other PHP code as needed for initialization or rendering
