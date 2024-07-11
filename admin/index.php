<?php
session_start();
// echo "Welcome to pricipal dashboard";
// Accessing session variables
// if (isset($_SESSION['username'])) {
//     echo 'Welcome, ' . $_SESSION['username'];
// } else {
//     echo 'Please log in.';
// }
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: http://localhost/Leave-Management-System/login.php");
    exit;
}
// rule for employee
include '../admin/employee_role.php';

// echo "Welcome, " . $userRole;
include '../templates/header.php';

?>


<?php
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
            <p class="display-4 text-center fw-bold">Welcome to Dashboard</p>
            <?php
            include '../templates/dash_cards.php';


            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>