<?php
$server_name = $_SERVER['SERVER_NAME'];
$base_url = "http://" . $server_name . "/leave-management-system";
// include('../include/db-connection.php');
define('ROOT_PATH', dirname(__DIR__) . '/');
include(ROOT_PATH . '/include/db-connection.php');
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Leave Management System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo $base_url; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo $base_url; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CNunito:300,300i,400,400i,600,600i,700,700i%7CPoppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo $base_url; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo $base_url; ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo $base_url; ?>/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css">
  <script src="<?php echo $base_url; ?>/assets/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    

