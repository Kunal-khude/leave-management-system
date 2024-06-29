<?php
$server_name = $_SERVER['SERVER_NAME'];
$base_url = "http://" . $server_name . "/leave-management-system";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave management System</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css">
    <script src="<?php echo $base_url; ?>/assets/js/bootstrap.bundle.min.js"></script>
</head>

<body>