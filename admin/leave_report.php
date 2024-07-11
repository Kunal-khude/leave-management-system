<?php
session_start();
include '../templates/header.php';

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prepare data from POST
    $id = $_POST['fullName']; // Assuming you set this in your HTML form as a hidden field
    $leaveType = $_POST['leaveType'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO leave_report (employee_id, leave_type, start_date, end_date, reason)
        VALUES ('$id', '$leaveType', '$start_date', '$end_date', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Fetch Employees


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