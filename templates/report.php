<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated Table</title>
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#datatable").DataTable();

            // Update button click event
            $('.update-btn').on('click', function() {
                let row = $(this).closest('tr');
                let id = row.find('td:eq(0)').text();
                let fullName = row.find('td:eq(1)').text();
                let email = row.find('td:eq(2)').text();
                let phone = row.find('td:eq(3)').text();
                let leaveType = row.find('td:eq(4)').text();
                let status = row.find('td:eq(5)').text();

                $('#updateModal #id').val(id);
                $('#updateModal #fullName').val(fullName);
                $('#updateModal #email').val(email);
                $('#updateModal #phone').val(phone);
                $('#updateModal #leaveType').val(leaveType);
                $('#updateModal #status').val(status);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Clear form fields on modal close
            $('#createReportModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // Handle form submission
            $('#btnSubmitReport').click(function() {
                // Here you can add code to handle form submission via AJAX or other methods
                // $('#createReportModal').modal('hide');
                alert('Report submitted successfully!');
            });
        });
    </script>
</head>

<body>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createReportModal">
            Apply Leave
        </button>
    </div>

    <!-- Create Report Modal -->
    <div class="modal fade" id="createReportModal" tabindex="-1" aria-labelledby="createReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createReportModalLabel">Create Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="fullName" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>" name="fullName"> <!-- Hidden Full Name Field -->
                        <div class="mb-3">
                            <label for="leaveType" class="form-label">Leave Type</label>
                            <select class="form-select" id="leaveType" name="leaveType">
                                <?php
                                foreach ($leaveArray as $leaveType) {
                                    echo "<option value='" . $leaveType['type'] . "'>" . $leaveType['type'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date">
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea class="form-control" id="reason" rows="3" name="reason"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitReport" data-bs-dismiss="modal">Submit Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Data Table</div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Leave Type</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // SQL query to fetch data from leave_report
                        $sql_leave_report = "SELECT id, employee_id, leave_type, reason, status FROM leave_report";
                        $result_leave_report = $conn->query($sql_leave_report);

                        if ($result_leave_report->num_rows > 0) {
                            // Output data of each row
                            while ($row_leave_report = $result_leave_report->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row_leave_report["id"] . "</td>";

                                // Fetch user data based on employee_id
                                $employee_id = $row_leave_report['employee_id'];
                                $sql_users = "SELECT full_name, email, phone FROM users WHERE id = ?";
                                $stmt = $conn->prepare($sql_users);
                                $stmt->bind_param("i", $employee_id);
                                $stmt->execute();
                                $result_users = $stmt->get_result();

                                if ($result_users->num_rows > 0) {
                                    // Assuming only one user per employee_id for simplicity
                                    $user = $result_users->fetch_assoc();
                                    echo "<td>" . $user["full_name"] . "</td>";
                                    echo "<td>" . $user["email"] . "</td>";
                                    echo "<td>" . $user["phone"] . "</td>";
                                } else {
                                    echo "<td colspan='3'>User not found</td>";
                                }

                                echo "<td>" . $row_leave_report["leave_type"] . "</td>";
                                echo "<td>" . $row_leave_report["reason"] . "</td>";
                                echo "<td>" . $row_leave_report["status"] . "</td>";

                                echo "<td>
                <button type='button' class='btn btn-warning update-btn' 
                    data-bs-toggle='modal' 
                    data-bs-target='#updateModal' 
                    data-id='" . $row_leave_report["id"] . "'>Update</button>";

                                echo "<form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' style='display: inline;' onsubmit='return confirmDelete();'>
                <button type='submit' name='delete' class='btn btn-danger delete-btn' value='" . $row_leave_report['id'] . "'>Delete</button>
            </form>
            </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data found</td></tr>";
                        }
                        ?>
                    </tbody>

                    <script>
                        function confirmDelete() {
                            return confirm("Are you sure you want to delete this item?");
                        }
                    </script>


                </table>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="updateid" value="" name="updateid"> <!-- Hidden Full Name Field -->

                        <div class="mb-3">
                            <label for="updateleaveTypes" class="form-label">Leave Type</label>
                            <select class="form-select" id="updateleaveTypes" name="updateleaveTypes">
                                <?php
                                foreach ($leaveArray as $leaveType) {
                                    echo "<option value='" . $leaveType['type'] . "'>" . $leaveType['type'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="updatestatus" class="form-label">Status</label>
                            <select class="form-select" name="updatestatus" id="updatestatus">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.update-btn').click(function() {
                var id = $(this).data('id'); // Get the id from data attribute
                $('#updateid').val(id); // Set the value of the hidden input field
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>