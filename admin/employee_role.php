<?php
// Example: Check user's role/permission level
$userRole = $_SESSION['role'];

// Example: Restrict access based on role
if ($userRole === 'Employee') {
    // Redirect or show an error page for unauthorized access
    echo "You are not authorized to access this page.";
    header("Location: http://localhost/Leave-Management-System/admin/own_reports.php");
    exit;
}
