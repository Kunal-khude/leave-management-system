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
                <div class="modal-body">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="fullName" value="<?php echo $_SESSION['user_id']; ?>"> <!-- Hidden Full Name Field -->
                        <div class="mb-3">
                            <label for="leaveType" class="form-label">Leave Type</label>
                            <select class="form-select" id="leaveType">
                                <?php
                                foreach ($leaveArray as $leaveType) {
                                    echo "<option value='" . $leaveType['type'] . "'>" . $leaveType['type'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date">
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date">
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea class="form-control" id="reason" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitReport" data-bs-dismiss="modal">Submit Report</button>
                </div>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>4</td>
                            <td>Admin</td>
                            <td>admin@example.com</td>
                            <td>123-456-7890</td>
                            <td>Sick Leave</td>
                            <td>Active</td>
                            <td>
                                <button type="button" class="btn btn-warning update-btn" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                                <button type="button" class="btn btn-danger delete-btn">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Principal</td>
                            <td>principal@example.com</td>
                            <td>098-765-4321</td>
                            <td>Annual Leave</td>
                            <td>Active</td>
                            <td>
                                <button type="button" class="btn btn-warning update-btn" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                                <button type="button" class="btn btn-danger delete-btn">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>HOD</td>
                            <td>hod@example.com</td>
                            <td>555-123-4567</td>
                            <td>Personal Leave</td>
                            <td>Active</td>
                            <td>
                                <button type="button" class="btn btn-warning update-btn" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                                <button type="button" class="btn btn-danger delete-btn">Delete</button>
                            </td>
                        </tr>
                    </tbody>
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
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="leaveType" class="form-label">Leave Type</label>
                            <input type="text" class="form-control" id="leaveType">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>