<?php
session_start();
include '../templates/header.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_department']) && !empty($_POST['department_name'])) {
        // Insert new department
        $department_name = $conn->real_escape_string($_POST['department_name']);
        $department_status = $conn->real_escape_string($_POST['department_status']);
        $sql = "INSERT INTO department (name, status) VALUES ('$department_name', '$department_status')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'New department created successfully';
        } else {
            $_SESSION['error'] = 'Error: ' . $conn->error;
        }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['update_department']) && !empty($_POST['department_name']) && !empty($_POST['department_id'])) {
        // Update existing department
        $department_id = intval($_POST['department_id']);
        $department_name = $conn->real_escape_string($_POST['department_name']);
        $department_status = $conn->real_escape_string($_POST['department_status']);
        $sql = "UPDATE department SET name='$department_name', status='$department_status' WHERE id=$department_id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'Department updated successfully';
        } else {
            $_SESSION['error'] = 'Error: ' . $conn->error;
        }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete_department']) && !empty($_POST['department_id'])) {
        // Delete department
        $department_id = intval($_POST['department_id']);
        $sql = "DELETE FROM department WHERE id=$department_id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'Department deleted successfully';
        } else {
            $_SESSION['error'] = 'Error: ' . $conn->error;
        }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Fetch departments
$sql = "SELECT * FROM department";
$result = $conn->query($sql);
$departmentArray = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $departmentArray[] = $row;
    }
}

?>

<div class="container-fluid ">
    <div class="row">
        <div class="col-2 p-0">
            <?php
            include '../templates/sidebar.php';
            ?>
        </div>
        <div class="col-10 p-0 ">
            <?php
            include '../templates/header-admin.php';

            ?>
            <p class="display-4 text-center fw-bold">Manage Departments</p>


            <?php
            include '../templates/department_table.php';

            include '../templates/footer.php';
            ?>
        </div>


    </div>


</div>