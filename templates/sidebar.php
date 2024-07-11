<style>
  body {
    overflow-x: hidden;
  }

  #sidebar {
    min-width: 250px;
    max-width: 250px;
    background-color: #2596be;
    color: #fff;
    transition: all 0.3s;
    text-align: center;
    height: 100%;
  }

  #sidebar.active {
    margin-left: -250px;
  }

  #sidebar .sidebar-header {
    padding: 20px;
    background-color: #2596be;
    display: flex;
    align-items: center;
  }

  #sidebar .sidebar-header img {
    width: 30px;
    height: 30px;
    margin-right: 10px;
  }

  #sidebar .sidebar-header span {
    font-size: 1.2em;
  }

  #sidebar ul.components {
    padding: 0;
    list-style: none;
    background-color: #2596be;
    border-top: 1px solid white;

  }

  #sidebar ul li {
    padding: 10px;
  }

  #sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px;
    transition: background 0.3s;

  }

  #sidebar ul li a:hover {
    background-color: #77d3f4;
  }

  #sidebar ul li a i {
    margin-right: 10px;
  }

  #content {
    transition: all 0.3s;
    width: calc(100% - 250px);
  }

  #sidebar.active+#content {
    width: 100%;
  }

  #sidebarCollapse {
    background: none;
    border: none;
    color: #fff;
    cursor: pointer;
    font-size: 20px;
    position: absolute;
    top: 15px;
    left: 15px;
  }
</style>
</head>

<body>
  <!-- Sidebar -->
  <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar p-0">
    <div class="sidebar-header">
      <a href="../admin/index.php" class="d-flex align-items-center text-white text-decoration-none">
        <img src="../assets/images/SGI_logo.png" alt="Logo" style="width: 50px; height: 50px;" class="me-2">
        <span class="fs-4">Sanjay Ghodawat</span>
      </a>
    </div>
    <ul class="nav flex-column components">
      <li class="nav-item">
        <a href="./index.php" class="nav-link text-white">
          <i class="fas fa-tachometer-alt me-2"></i>Dashboard
        </a>
      </li>
      <li>
        <a href="./manage_departments.php" class="nav-link text-white">
          <i class="fas fa-building me-2"></i>Department List
        </a>
      </li>
      <li>
        <a href="./manage_leave_types.php" class="nav-link text-white">
          <i class="fas fa-calendar-alt me-2"></i>Leave Type List
        </a>
      </li>
      <li>
        <a href="./manage_staff.php" class="nav-link text-white">
          <i class="fas fa-users me-2"></i>Employees List
        </a>
      </li>
      
      <li>
        <a href="./manage_role.php" class="nav-link text-white">
          <i class="fas fa-id-badge me-2"></i>Role Management
        </a>
      </li>
      <li>
        <a href="./leave_report.php" class="nav-link text-white">
          <i class="fas fa-chart-bar me-2"></i>Leave Reports
        </a>
      </li>
  
      <li>
        <a href="#application-list" class="nav-link text-white">
          <i class="fas fa-file-alt me-2"></i>My Applications
        </a>
      </li>

      <li>
        <a href="#settings" class="nav-link text-white">
          <i class="fas fa-cog me-2"></i>Settings
        </a>
      </li>
    </ul>
  </nav>


  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script>
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('expanded');
      });
    });
  </script>