<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: http://localhost/Leave-Management-System/login.php");
    exit;
}
// rule for employee
include '../admin/employee_role.php';

include '../templates/header.php';

// Fetch user data based on session user ID
// $sql = "SELECT full_name,email,phone,id FROM `users` WHERE `username`='" . $_SESSION['username'] . "' OR `email`='" . $_SESSION['username'] . "'";
// $result = $conn->query($sql);

// $usersArray = [];

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $usersArray[] = $row;
// }




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateleaveTypes']) && isset($_POST['updateid'])) {
    // Handle form data
    $leaveType = $_POST['updateleaveTypes'];
    $status = $_POST['updatestatus'];
    $id = $_POST['updateid'];
    // echo $id . "<br> asd" . $leaveType . "<br>asd" . $status . "<br>" . $id;

    // // Example SQL update statement (replace with your actual table and fields)
    $sql = "UPDATE leave_report SET status='$status',leave_type='$leaveType' WHERE id='$id'";

    // // Prepare and bind
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // $conn->close();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id = $_POST['delete'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM leave_report WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }


    // Redirect back to the main page (adjust the location if necessary)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
//  else {
//     echo "Invalid request";
// }

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_date'])) {
    // Prepare data from POST
    // $id = $_POST['fullName']; // Assuming you set this in your HTML form as a hidden field
    $leaveType = $_POST['leaveType'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];
    $id_user = $_SESSION['user_id'];
    // echo $id_user;
    // foreach ($usersArray as $user) {
    // }

    // Get the user ID from the session
    // echo $id . "<br> asd" . $leaveType . "<br>asd" . $start_date . "<br>" . $end_date . "<br>" . $reason;
    // echo "<br>user id :" . $id_user . ". ";

    // SQL query to insert data into the database
    $sql = "INSERT INTO leave_report (employee_id, leave_type, start_date, end_date, reason)
        VALUES ('$id_user', '$leaveType', '$start_date', '$end_date', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // $conn->close();
}



// Optionally print the user array for debugging
// print_r($usersArray);

// Fetch leave types
$sql = "SELECT * FROM `leave_types`";
$result = $conn->query($sql);
$leaveArray = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $leaveArray[] = $row;
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            <?php
            include '../templates/sidebar.php';
            ?>
        </div>
        <div class="col-10 p-0">
            <?php
            include '../templates/header-admin.php';
            ?>
            <p class="display-4 text-center fw-bold">Leave Reports</p>
            <?php
            include '../templates/report.php';


            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>