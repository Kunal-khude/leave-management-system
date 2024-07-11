<?php
// echo "Welcome to Admin";
session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: http://localhost/Leave-Management-System/login.php");
    exit;
}
include '../templates/header.php';
?>


<?php
?>
<!-- <p class="display-4 text-center fw-bold">Welcome to Admin</p> -->
<div class="container-fluid">
    <div class="row">

        <div class="col-12 p-0">
            <?php include '../templates/header-admin.php'; ?>

            <p class="display-4 text-center fw-bold mt-5">My Applications</p>

            <?php include '../templates/own_report.php'; ?>
            <?php include '../templates/footer.php'; ?>
        </div>

    </div>
</div>