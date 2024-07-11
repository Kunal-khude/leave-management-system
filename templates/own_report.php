<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Leave Applications</title>
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
</head>

<body>
    <!-- Add Report Button -->
    <div class="container mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReportModal">
            Add Report
        </button>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Your Leave Applications</div>
            <div class="card-body">
                <div class="table-responsive"> <!-- Added to make the table scroll on small screens -->
                    <table id="datatable" class="table table-striped table-bordered h-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    
                            $currentUserId = $_SESSION['user_id']; // Adjust according to your session variable structure
    
                            // Handle form submissions (delete)
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (isset($_POST['delete'])) {
                                    $id_to_delete = $_POST['delete'];
                                    $sql_delete = "DELETE FROM leave_report WHERE id = ?";
                                    $stmt = $conn->prepare($sql_delete);
                                    $stmt->bind_param("i", $id_to_delete);
                                    if ($stmt->execute()) {
                                        echo '<div class="alert alert-success" role="alert">Leave application deleted successfully.</div>';
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Error deleting leave application: ' . $conn->error . '</div>';
                                    }
                                } elseif (isset($_POST['btnSubmitReport'])) {
                                    // Process form submission for adding a new report
                                    $leaveType = $_POST['leaveType'];
                                    $startDate = $_POST['start_date'];
                                    $endDate = $_POST['end_date'];
                                    $reason = $_POST['reason'];
    
                                    $sql_insert = "INSERT INTO leave_report (employee_id, leave_type, start_date, end_date, reason, status)
                                        VALUES (?, ?, ?, ?, ?, 'pending')";
                                    $stmt = $conn->prepare($sql_insert);
                                    $stmt->bind_param("issss", $currentUserId, $leaveType, $startDate, $endDate, $reason);
                                    
                                    if ($stmt->execute()) {
                                        echo '<div class="alert alert-success" role="alert">Leave application added successfully.</div>';
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Error adding leave application: ' . $conn->error . '</div>';
                                    }
                                }
                            }
    
                            // SQL query to fetch leave applications for the current user
                            $sql_leave_report = "SELECT id, leave_type, start_date, end_date, reason, status FROM leave_report WHERE employee_id = ?";
                            $stmt = $conn->prepare($sql_leave_report);
                            $stmt->bind_param("i", $currentUserId);
                            $stmt->execute();
                            $result_leave_report = $stmt->get_result();
    
                            if ($result_leave_report->num_rows > 0) {
                                while ($row_leave_report = $result_leave_report->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row_leave_report["id"] . "</td>";
                                    echo "<td>" . $row_leave_report["leave_type"] . "</td>";
                                    echo "<td>" . $row_leave_report["start_date"] . "</td>";
                                    echo "<td>" . $row_leave_report["end_date"] . "</td>";
                                    echo "<td>" . $row_leave_report["reason"] . "</td>";
                                    echo "<td>" . $row_leave_report["status"] . "</td>";
                                    echo "<td>
                                        <form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' style='display: inline;' onsubmit='return confirmDelete();'>
                                            <button type='submit' name='delete' class='btn btn-danger delete-btn' value='" . $row_leave_report['id'] . "'  onsubmit='return confirmDelete();'>Delete</button>
                                        </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No leave applications found</td></tr>";
                            }
    
                            // Close database connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Report Modal -->
    <div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">Add Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="leaveType" class="form-label">Leave Type</label>
                            <select class="form-select" id="leaveType" name="leaveType">
                                <option value="Vacation">Vacation</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea class="form-control" id="reason" rows="3" name="reason" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnSubmitReport">Submit Report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();

            // Function to confirm delete action
            function confirmDelete() {
                return confirm("Are you sure you want to delete this item?");
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>

</html>
