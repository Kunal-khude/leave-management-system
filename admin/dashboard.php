<?php
// echo "Welcome to pricipal dashboard";
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
            include '../templates/table.php';


            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>