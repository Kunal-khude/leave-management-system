<style>
    body {
      background-color: #f8f9fa; /* Light gray background */
      font-family: 'Arial', sans-serif; /* Set a common font family */
    }
    .card {
      background-color: #ffffff; /* White background for cards */
      border: none; /* Remove default border */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow */
      transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth animations */
    }
    .card:hover {
      transform: translateY(-5px); /* Lift up on hover */
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2); /* Slightly stronger shadow on hover */
    }
    .card-title {
      color: #333333; /* Dark text color for card titles */
    }
    .card-text {
      color: #666666; /* Medium gray text color for card content */
    }
    .btn-primary {
      background-color: #007bff; /* Blue primary button color */
      border-color: #007bff; /* Matching border color */
    }
    .btn-primary:hover {
      background-color: #0069d9; /* Darker blue on hover */
      border-color: #0062cc; /* Darker border on hover */
    }
    .btn-primary:focus, .btn-primary.focus {
      box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5); /* Light focus shadow */
    }
</style>
</head>
<body>
    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Department List -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-building me-2"></i>Department List
                        </h5>
                        <p class="card-text">Here you can list all departments and manage them.</p>
                        <a href="./manage_departments.php" class="btn btn-primary">View Departments</a>
                    </div>
                </div>
            </div>
            <!-- Leave Type List -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-calendar-alt me-2"></i>Leave Type List
                        </h5>
                        <p class="card-text">Manage different types of leave and their policies.</p>
                        <a href="./manage_leave_types.php" class="btn btn-primary">View Leave Types</a>
                    </div>
                </div>
            </div>
            <!-- Employees List -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-users me-2"></i>Employees List
                        </h5>
                        <p class="card-text">View and manage all employees in your organization.</p>
                        <a href="./manage_staff.php" class="btn btn-primary">View Employees</a>
                    </div>
                </div>
            </div>
            <!-- Role Management -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-user me-2"></i>Role Management
                        </h5>
                        <p class="card-text">Manage user roles and permissions across the system.</p>
                        <a href="./manage_role.php" class="btn btn-primary">Manage Roles</a>
                    </div>
                </div>
            </div>
            <!-- Leave Reports -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-file-alt me-2"></i>Leave Reports
                        </h5>
                        <p class="card-text">Manage leave reports and approvals.</p>
                        <a href="./manage_leave.php" class="btn btn-primary">Manage Leave</a>
                    </div>
                </div>
            </div>
            <!-- My Applications -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-cogs me-2"></i>My Applications
                        </h5>
                        <p class="card-text">Explore and manage your applications.</p>
                        <a href="./manage_applications.php" class="btn btn-primary">Manage Applications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
