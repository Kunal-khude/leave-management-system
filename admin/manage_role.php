<?php
session_start();
include '../templates/header.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_role']) && !empty($_POST['role_name'])) {
        // Insert new Role
        $role_name = $conn->real_escape_string($_POST['role_name']);
        $role_status = $conn->real_escape_string($_POST['role_status']);
        $sql = "INSERT INTO `role` (name, status) VALUES ('$role_name', '$role_status')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'New role created successfully';
        } else {
            $_SESSION['error'] = 'Error: ' . $conn->error;
        }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['update_role']) && !empty($_POST['role_name']) && !empty($_POST['role_id'])) {
        // Update existing role
        $role_id = intval($_POST['role_id']);
        $role_name = $conn->real_escape_string($_POST['role_name']);
        $role_status = $conn->real_escape_string($_POST['role_status']);
        $sql = "UPDATE `role` SET name='$role_name', status='$role_status' WHERE id=$role_id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'Role updated successfully';
        } else {
            $_SESSION['error'] = 'Error: ' . $conn->error;
        }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['delete_role']) && !empty($_POST['role_id'])) {
        // Delete role
        $role_id = intval($_POST['role_id']);
        $sql = "DELETE FROM `role` WHERE id=$role_id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'Role deleted successfully';
        } else {
            $_SESSION['error'] = 'Error: ' . $conn->error;
        }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Fetch Roles 
$sql = "SELECT * FROM `role`";
$result = $conn->query($sql);
$roleArray = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $roleArray[] = $row;
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
            <p class="display-4 text-center fw-bold">Role Management</p>
            <?php
            include '../templates/manage_role.php';


            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>