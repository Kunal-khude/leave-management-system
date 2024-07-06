<?php
echo "Welcome to Admin";
include '../templates/header.php';
?>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    try {


        $name = $_POST['first_name'];
        $designation = $_POST['designation'];
        $username = $_POST['username'];
        $dob = $_POST['dob'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (full_name,department_id, username, email, address) VALUES ( ?, ?, ?, ?, ?)");
        $stmt->bind_param("is", $name, $designation, $username, $contact, $address);

        if ($stmt->execute()) {
            echo "Department Added!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        echo "An error occurred: " . $th->getMessage();
    }
} else {
    echo "No data posted";
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

            <html>

            <head>
                <title>Table Demo</title>
                <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
                <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
                <script>
                    $(document).ready(function() {

                        $("#datatable").dataTable();

                    });
                </script>
            </head>

            <body>
                <div class="card">
                    <div class="card-header">Data Tables</div>
                    <div class="d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#department">
                            Create New
                        </button>
                        <div class="modal fade" id="department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:black" id="exampleModalLabel">Add
                                            Department</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="card card-outline card-primary mt-5 shadow" style="border-top:2px solid blue; border-radius:10px">
                                                <div class="card-body">
                                                    <div class="container-fluid">
                                                        <!DOCTYPE html>
                                                        <html lang="en">

                                                        <head>
                                                            <meta charset="UTF-8">
                                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                            <title>Home Page</title>
                                                            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                                            <style>
                                                                .form-container {
                                                                    max-width: 900px;
                                                                    margin: 40px auto;
                                                                    padding: 20px;
                                                                    border: 1px solid #ccc;
                                                                    border-radius: 10px;
                                                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                                                }

                                                                .form-row {
                                                                    margin-bottom: 20px;
                                                                }

                                                                .avatar-label {
                                                                    display: flex;
                                                                    align-items: center;
                                                                    justify-content: space-between;
                                                                }

                                                                .avatar-placeholder {
                                                                    display: flex;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    border: 1px dashed #ccc;
                                                                    border-radius: 50%;
                                                                    width: 100px;
                                                                    height: 100px;
                                                                    margin: 10px 0;
                                                                }
                                                            </style>
                                                        </head>

                                                        <body>
                                                            <div class="container form-container">
                                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="employeeId">Employee ID</label>
                                                                            <input type="text" class="form-control" id="employeeId">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="department">Department</label>
                                                                            <select id="department" class="form-control">
                                                                                <option selected>Please Select Department here</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="firstName">Full Name</label>
                                                                            <input type="text" class="form-control" id="firstName">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="designation">Designation</label>
                                                                            <input type="number" name="designation" class="form-control" id="designation">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">

                                                                        <div class="form-group col-md-6">
                                                                            <label for="username">Username</label>
                                                                            <input type="text" class="form-control" id="username">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="lastName">Avatar</label>

                                                                            <input type="file" class="form-control" id="file" style="width: 100%;">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">

                                                                            <label for="dob">DOB</label>
                                                                            <input type="text" class="form-control" id="dob" placeholder="dd-mm-yyyy">

                                                                        </div>
                                                                        <div class="form-group avatar-placeholder text-center">

                                                                            <span>Image Not Available</span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="contact">Email</label>
                                                                            <input type="text" class="form-control" id="contact" name="email">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-row">

                                                                        <div class="form-group col-md-6">
                                                                            <label for="address">Address</label>
                                                                            <textarea type="text" class="form-control" id="address" rows="4"></textarea>
                                                                        </div>
                                                                    </div>


                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>

                                                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                                                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                                        </body>

                                                        </html>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Department ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM users';
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                                    <td>" . $row["id"] . "</td>

                                                    <td>" . $row["full_name"] . "</td>
                                                    <td>" . $row["email"] . "</td>
                                                    <td>
                                                        <p class='m-0 '>
                                                            <b></b>" . $row["department_id"] . "<br>
                                                        </p>
                                                    </td>
                                                    <td class='show'>
                                                        <button type='button' id='employee'
                                                            class='btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon'
                                                            data-bs-toggle='dropdown' aria-expanded='true'>
                                                            Action
                                                            <span class='sr-only'></span>
                                                        </button>
                                                        <div class='dropdown-menu' aria-la role='menu'
                                                            x-placement='top-start'
                                                            style='position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1230px, -140px, 0px);'>
                                                            <a class='dropdown-item'
                                                                href='?page=employees/records&amp;id=11'><span
                                                                    class='fa fa-eye text-info'></span> View</a>
                                                            <div class='dropdown-divider'></div>
                                                            <a class='dropdown-item'
                                                                href='?page=employees/manage_employee&amp;id=11'><span
                                                                    class='fa fa-edit text-primary'></span> Edit</a>
                                                            <div class='dropdown-divider'></div>
                                                            <a class='dropdown-item reset_password'
                                                                href='javascript:void(0)' data-id='11'><span
                                                                    class='fa fa-key text-primary'></span> Reset
                                                                Passwowrd</a>
                                                            <div class='dropdown-divider'></div>
                                                            <a class='dropdown-item delete_data'
                                                                href='javascript:void(0)' data-id='11'><span
                                                                    class='fa fa-trash text-danger'></span>
                                                                Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </body>

            </html>
            <?php


            // include '../templates/table.php';
            include '../templates/footer.php';

            ?>
        </div>
    </div>

</div>