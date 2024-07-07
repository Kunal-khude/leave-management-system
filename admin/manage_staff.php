<?php
// echo "Welcome to Admin";
include '../templates/header.php';
?>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    // include 'db_connection.php'; // Make sure this file contains your database connection logic

    try {
        if (!isset($_POST['employeeId'])) {

            // Retrieve form data
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $username = $_POST['username'];
            $email = $_POST['emailid'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $department = $_POST['department'];
            $status = $_POST['status'];
            $full_name = $firstName . " " . $lastName;
            // Handle file upload
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == UPLOAD_ERR_OK) {
                $avatar = $_FILES['avatar']['name'];
                $targetDir = "uploads/";
                $targetFile = $targetDir . basename($avatar);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile);
            } else {
                $avatar = null;
            }
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password, phone, dob, gender, address, role_id, department_id, status, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind the parameters with the correct types
            $stmt->bind_param("ssssssssssss", $full_name, $username, $email, $password, $phone, $dob, $gender, $address, $role, $department, $status, $avatar);


            if ($stmt->execute()) {
                echo "User Added Successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            // Update existing user
            $employeeId = intval($_POST['employeeId']);
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $department = $_POST['department'];

            // Use prepared statement to update user data
            $stmt = $conn->prepare("UPDATE users SET full_name=?, email=?, department_id=? WHERE id=?");

            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind the parameters with the correct types
            $stmt->bind_param("ssii", $fullName, $email, $department, $employeeId);

            // Execute the statement
            if ($stmt->execute()) {
                echo "User updated successfully!";
            } else {
                echo "Error updating user: " . $stmt->error;
            }

            $stmt->close();
        }
    } catch (\Throwable $th) {
        echo "An error occurred: " . $th->getMessage();
    }
} else {
    // echo "No data posted";
}
?>


<!-- <p class="display-4 text-center fw-bold">Welcome to Admin</p> -->
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
            <p class="display-4 text-center fw-bold">Staff Manage</p>


            <?php


            include '../templates/staff_form.php';
            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>