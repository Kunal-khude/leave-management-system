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

                                            <div class="container form-container">
                                                !-- Update Staff Modal -->
                                                <div class="modal fade" id="updateModal" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <form action="" method="POST" class="add-staff" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add Staff</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <input type="hidden" id="updatestaffId" name="updatestaffId">

                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div class="form-group col">
                                                                        <label for="firstname">First Name</label>
                                                                        <input type="text" class="form-control" id="updatefirstname" placeholder="First Name" name="updatefirstname">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="lastname">Last Name</label>
                                                                        <input type="text" class="form-control" id="updatelastname" placeholder="Last Name" name="updatelastname">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div class="form-group col">
                                                                        <label for="email">username</label>
                                                                        <input type="username" class="form-control" id="updateusername" placeholder="username" name="updateusername">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="email">Email</label>
                                                                        <input type="email" class="form-control" id="updateemail" placeholder="Email" name="updateemail">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div class="form-group col">
                                                                        <label for="phone">Phone</label>
                                                                        <input type="text" class="form-control" id="updatephone" placeholder="phone" name="updatephone">
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="dob">DOB</label>
                                                                        <input type="date" class="form-control" id="updatedob" placeholder="dob" name="updatedob">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div class="form-group col">
                                                                        <label for="inputEmail4">Gneder</label>
                                                                        <div>
                                                                            <input class="form-check-input" type="radio" name="updategender" id="updategendermale" value="male">
                                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                                            <input class="form-check-input" type="radio" name="updategender" id="updategenderfemale" value="female">
                                                                            <label class="form-check-label" for="inlineRadio1">Female</label>
                                                                            <input class="form-check-input" type="radio" name="updategender" id="updategenderother" value="other">
                                                                            <label class="form-check-label" for="inlineRadio1">Other</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="address">Address</label>
                                                                        <input type="text" class="form-control" id="updateaddress" placeholder="Adress" name="updateaddress">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div class="form-group col">
                                                                        <label for="role" class="form-label">Role</label>
                                                                        <select class="form-select" id="updaterole_id" name="updaterole_id">
                                                                            <option value="1">Admin</option>
                                                                            <option value="2">Staff</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col">
                                                                        <label for="department" class="form-label">Department</label>
                                                                        <select class="form-select" id="updatedepartment_id" name="updatedepartment_id">
                                                                            <option value="1">Hod</option>
                                                                            <option value="2">cleanner</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div class="form-group col">
                                                                        <label for="updatestatus" class="form-label">Status</label>
                                                                        <select class="form-select" id="updatestatus" name="updatestatus">
                                                                            <option value="Active">Active</option>
                                                                            <option value="Inactive">Inactive</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                <div class="form-row d-flex add-staf-field">
                                                                    <div clas="col">
                                                                        <img src="" alt="" srcset="" style="width: 50px;" id="Imagesrc">
                                                                        <input type="hidden" name="image_url" id="image_url">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col">
                                                                    <label for="inputPassword4">Upload New Profile Image</label>
                                                                    <input type="file" class="d-none form-control" id="updateprofile" placeholder="Profile Image" name="updateprofile">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="update_staff" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="firstName">First Name</label>
                                                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="lastName">Last Name</label>
                                                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email" name="emailid" placeholder="Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="password">Password</label>
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="confirmPassword">Confirm Password</label>
                                                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="phone">Phone</label>
                                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" pattern="[0-9]{10}" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="dob">DOB</label>
                                                            <input type="date" class="form-control" id="dob" name="dob" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Gender</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                                                                <label class="form-check-label" for="male">Male</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                                                <label class="form-check-label" for="female">Female</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                                                                <label class="form-check-label" for="other">Other</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="role">Role</label>
                                                            <select id="role" class="form-control" name="role" required>
                                                                <?php
                                                                // Assuming `conn` is your database connection object
                                                                $sql = "SELECT * FROM `role`";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="department">Department</label>
                                                            <select id="department" class="form-control" name="department" required>
                                                                <?php
                                                                // Assuming `conn` is your database connection object
                                                                $sql = "SELECT * FROM department";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="status">Status</label>
                                                            <select id="status" class="form-control" name="status" required>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="avatar">Profile Image</label>
                                                            <input type="file" class="form-control" id="avatar" name="avatar">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </form>

                                                <script>
                                                    function validateForm() {
                                                        var password = document.getElementById("password").value;
                                                        var confirmPassword = document.getElementById("confirmPassword").value;
                                                        if (password != confirmPassword) {
                                                            alert("Passwords do not match.");
                                                            return false;
                                                        }
                                                        return true;
                                                    }
                                                </script>


                                            </div>

                                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                        <th>Department</th>
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
                                <p class='m-0'>
                                    <b>" . $row["department_id"] . "</b><br>
                                </p>
                            </td>
                            <td class='show'>
                                <div class='dropdown'>
                                    <button type='button' id='employee' class='btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon'
                                        data-bs-toggle='dropdown' aria-expanded='false'>
                                        Action
                                        <span class='sr-only'></span>
                                    </button>
                                    <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                                        <li><a class='dropdown-item' href='?page=employees/records&amp;id=" . $row["id"] . "'><span class='fa fa-eye text-info'></span> View</a></li>
                                        <li><a class='dropdown-item edit_employee' href='javascript:void(0)' data-id='" . $row["id"] . "'><span class='fa fa-edit text-primary'></span> Edit</a></li>
                                        <li><a class='dropdown-item reset_password' href='javascript:void(0)' data-id='" . $row["id"] . "'><span class='fa fa-key text-primary'></span> Reset Password</a></li>
                                        <li><a class='dropdown-item delete_data' href='javascript:void(0)' data-id='" . $row["id"] . "'><span class='fa fa-trash text-danger'></span> Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>

            </table>

            <!-- Modal -->
            <div class='modal fade' id='editModal' tabindex='-1' aria-labelledby='editModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='editModalLabel'>Edit Employee</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <!-- Form for editing employee details -->
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                <input type='hidden' id='employeeId' name='employeeId' value=''>

                                <div class='mb-3'>
                                    <label for='fullName' class='form-label'>Full Name</label>
                                    <input type='text' class='form-control' id='fullName' name='fullName' required>
                                </div>

                                <div class='mb-3'>
                                    <label for='email' class='form-label'>Email</label>
                                    <input type='email' class='form-control' id='email' name='email' required>
                                </div>

                                <div class='mb-3'>
                                    <label for="department">Department</label>
                                    <select id="department" class="form-control" name="department" required>
                                        <?php
                                        // Assuming `conn` is your database connection object
                                        $sql = "SELECT * FROM department";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <button type='submit' class='btn btn-primary'>Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScript to handle modal and form -->
            <script>
                $(document).ready(function() {
                    $('.edit_employee').click(function() {
                        var employeeId = $(this).data('id');
                        console.log(employeeId);
                        $('#employeeId').val(employeeId); // Set employeeId in hidden input
                        $('#editModal').modal('show'); // Show the modal
                    });

                    $('#editForm').submit(function(event) {
                        event.preventDefault();
                        var formData = $(this).serialize();
                        // Handle form submission (e.g., AJAX)
                        // $.ajax({
                        //     url: 'update_employee.php',
                        //     type: 'POST',
                        //     data: formData,
                        //     success: function (response) {
                        //         alert('Employee details updated successfully.');
                        //         $('#editModal').modal('hide');
                        //     },
                        //     error: function () {
                        //         alert('Error updating employee details.');
                        //     }
                        // });
                        $('#editModal').modal('hide'); // Close modal after submission (example)
                    });
                });
            </script>

        </div>
    </div>
</body>

</html>