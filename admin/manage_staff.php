<?php
// echo "Welcome to Admin";
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

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    // include 'db_connection.php'; // Ensure this file contains your database connection logic

    try {
        // Check if it's an update or insert request
        if (!isset($_POST['employeeId'])) {
            // Insert new user
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
                if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
                    throw new Exception('Failed to move uploaded file.');
                }
            } else {
                $avatar = null;
            }

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password, phone, dob, gender, address, role_id, department, status, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            // Bind the parameters with the correct types
            $stmt->bind_param("ssssssssssss", $full_name, $username, $email, $password, $phone, $dob, $gender, $address, $role, $department, $status, $avatar);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . htmlspecialchars($stmt->error));
            }

            // echo "User Added Successfully!";
            $stmt->close();
        } else {
            // Update existing user
            $employeeId = intval($_POST['employeeId']);
            // echo "Employee ID: " . $employeeId . "<br>";
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $department = $_POST['department_update'];

            // Debugging: Check the value of department_update
            if ($department === null) {
                throw new Exception('Department value is null.');
            } else {
                // echo "Department value: " . $department . "<br>";
            }

            // Assuming you have a database connection already established in $conn
            $sql = "UPDATE `users` SET `department`='$department', `email`='$email', `full_name`='$fullName' WHERE `id`=$employeeId";

            if ($conn->query($sql) === TRUE) {
                // echo "User updated successfully!";
            } else {
                echo "Error updating user: " . $conn->error;
            }

            // Close the connection
            $conn->close();
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }

    // Close the database connection
    // $conn->close();
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