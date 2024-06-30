<?php
include 'templates/header.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // echo $user;
    // echo $pass;
    $sql = "SELECT * FROM `users` WHERE `username` = '$user' || `email` = '$user' AND `password` = '$pass'";
    $result = $conn->query($sql);

    // if ($result) {
    //     header("Location: http://localhost/Leave-Management-System/admin/index.php");
    //     exit();
    // }
    echo "<pre>";
    if ($result->num_rows > 0) {
        // echo "Login Successful";
        header("Location: http://localhost/Leave-Management-System/admin/index.php");
        exit();
    } else {
        echo "Login Failed";
    }
    echo "</pre>";
} else {
    echo "No data posted";
}



// if ($conn->query($sql) === TRUE) {
//     echo "New record updated successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

?>

<link rel="stylesheet" href="./assets/css/login.css">
<section>
    <div class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="content-centre mt-5 md:mt-0" style="text-align: center; padding-top: 60px;">
                    <img src="assets/images/SGI_logo.png" alt="SGI_LOGO" width="100px">
                    <h1 class="text-centre text-white" style="text-shadow: 4px 2px 2px rgba(0, 0, 0);">
                        Online Leave Management System - PHP <br /> Admin Login
                    </h1>
                </div>

                <div class="form-wi bg-white border border-primary rounded mt-5">
                    <div class="card-body">
                        <form method="POST" action="./login.php">
                            <div class="mb-3 row align-items-center">
                                <div class="col-10">
                                    <input type="text" placeholder="Username / Email" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
                                </div>
                                <div class="col-2 bg-light text-center">
                                    <li class="fa fa-user" style="font-size: 30px;"></li>
                                </div>
                            </div>
                            <div class="mb-3 row align-items-center">
                                <div class="col-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-2 bg-light text-center">
                                    <li class="fa fa-lock" style="font-size: 30px;"></li>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 mt-2 d-flex align-items-center">
                                    <a href="#" style="text-decoration: none;">Go to Portal</a>
                                </div>
                                <div class="col-4 d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include 'templates/footer.php';
?>