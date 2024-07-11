<?php
session_start();
include 'templates/header.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Sanitize user input to prevent SQL injection
    $user = $conn->real_escape_string($user);

    // Fetch the user's hashed password from the database
    $sql = "SELECT password,id,role_id FROM `users` WHERE `username` = '$user' OR `email` = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // print_r($row);
        $hashedPassword = $row['password'];
        $user_id = $row['id'];
        $role = $row['role_id'];




        // Verify the password
        if (password_verify($pass, $hashedPassword)) {
            // Redirect to the admin page on successful login
            $_SESSION['username'] = $user;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $role;
            // Example: Restrict access based on role
            if ($role === 'Employee') {
                // Redirect or show an error page for unauthorized access
                // echo "You are not authorized to access this page.";
                header("Location: http://localhost/Leave-Management-System/admin/own_reports.php");
                exit;
            } else {


                header("Location: http://localhost/Leave-Management-System/admin/index.php");
                exit();
            }
        } else {
            echo "
    <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        <strong>Error!</strong> Invalid credentials.
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times; </span>
        </button>
    </div>
";
        }
    } else {
        echo "
        <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            <strong>Error!</strong> Invalid credentials.
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times; </span>
            </button>
        </div>
    ";
    }
} else {
    // echo "No data posted.";
}


// if ($conn->query($sql) === TRUE) {
//     echo "New record updated successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

?>

<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/login.css">
<section>
    <div class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="content-centre mt-5 md:mt-0" style="text-align: center; padding-top: 60px;">
                    <img src="./assets/images/SGI_logo.png" alt="SGI_LOGO" width="100px">
                    <h1 class="text-centre text-white" style="text-shadow: 4px 2px 2px rgba(0, 0, 0);">
                        Online Leave Management System - PHP <br /> Admin Login
                    </h1>
                </div>

                <div class="form-wi bg-white border border-primary rounded mt-5">
                    <div class="card-body">
                        <form method="POST" action="./login.php">
                            <div class="mb-3 row align-items-center">
                                <!-- <div class="col-10">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" placeholder="Username / Email" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
                                </div> -->
                                <div class="col-10">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" placeholder="Username / Email" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
                                        <div class="invalid-feedback">Please enter your username.</div>
                                    </div>
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
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 mt-2 d-flex align-items-center">
                                    <p class="pt-2 mb-0" style="text-decoration: none;">Don't have account? <a href="register.php">Create an account</a></p>
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