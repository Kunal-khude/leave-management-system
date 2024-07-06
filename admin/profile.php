<?php
echo "Welcome to Admin";
include '../templates/header.php';
?>


<?php
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
            <p class="display-4 text-center fw-bold">Welcome to Admin</p>

            <?php


            include '../templates/table.php';
            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>