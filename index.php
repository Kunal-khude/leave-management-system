<?php
include 'templates/header.php';
?>

<?php
// $user = $_POST['user'];
// $sql = "SELECT * FROM `users` WHERE `id` = '1' ";


// if ($conn->query($sql) === TRUE) {
//     echo "New record updated successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

?>
<link rel="stylesheet" href="./assets/css/style.css">

<section>
    <div class="hero-banners">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="content-centre" style="text-align: center; padding-top: 125px;">
                    <img src="assets/images/SGI_logo.png" alt="" width="100px">
                    <h1 class="text-centre text-white">
                        Leave Management System <sub> online </sub>
                    </h1>
                </div>

                <div class="col-md-12 rounded mt-3 d-flex align-items-center justify-content-center">
                    <a href="./login.php" class="btn btn-primary">Login</a>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
include 'templates/footer.php';
?>