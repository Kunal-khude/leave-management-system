<?php
echo "Welcome to Admin";
include '../templates/header.php';
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $id = $_POST['employee_id'];
        $name = $_POST['employee_name'];

        if ($id) {
            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO department (id, department_name) VALUES (?, ?)");
            $stmt->bind_param("is", $id, $name);
        } else {
            // Insert without specifying the id (it will be auto-incremented)
            $stmt = $conn->prepare("INSERT INTO department (department_name) VALUES (?)");
            $stmt->bind_param("s", $name);
        }

        if ($stmt->execute()) {
            echo "Department Added!";
        } else {
            // echo "Error: " . $stmt->error;
            echo "Error: Deparment with Same ID exists!";
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } catch (\Throwable $th) {
        // echo "An error occurred: " . $th->getMessage();
        echo "Error: Department with Same ID exists!";
    }
} else {
    echo "No data posted";
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $department_name = $_POST['department_name'];
//     $sql = "INSERT INTO `department`(`department_name`) VALUES ('$department_name')";

//     if ($conn->query($sql) == true) {
//         echo "<script>alert('New department created successfully');</script>";
//     } else {
//         echo "<script>alert('Error: " . $stmt->error . "');</script>";
//     }
// }
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
            <p class="display-4 text-center fw-bold">Manage Departments</p>

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
                                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="manage-user">
                                                            <input type="hidden" name="id" value="">
                                                            <input type="hidden" name="type" value="3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="employee_id">Department
                                                                            ID</label>
                                                                        <input type="number" name="employee_id" id="employee_id" class="form-control rounded-0" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="employee_name">Department
                                                                            Name</label>
                                                                        <input type="text" name="employee_name" id="employee_id" class="form-control rounded-0" value="" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="Submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
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
                                    <th>Department Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM department';
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>" . $row["id"] . "</td>

                                        <td>" . $row["department_name"] . "</td>
                                      
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