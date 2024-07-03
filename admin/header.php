<?php
include '../templates/header.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<title>Bootstrap Example</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<nav class="navbar" style="background-color: #2596be; position:absolute; width:100%; ">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler" type="button" id="sidebarCollapse" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>
            <!-- <button class="navbar-toggler" id="sidebarCollapse" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i> <!-- Font Awesome hamburger icon -->
            <!-- </button> -->
            <a class="navbar-brand text-white ms-2 px-5" href="#">Online Leave Management System - PHP - Admin</a>
        </div>
        <div class="dropdown px-2" style="position: absolute; right: 30px;">
            <button class="btn btn-light dropdown-toggle bttn rounded-pill" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../assets/images/585e4bcdcb11b227491c3396.png" alt="" width="25" height="25" class="rounded-circle">
                Administator Admin
            </button>
            <ul class="dropdown-menu border-1" aria-labelledby="dropdownMenuLink">
                <li class="row align-items-center justify-content-center border-2">
                    <div class="col-2 text-center ">
                        <i class="fa fa-user" style="font-size: 20px; padding-left: 15px;"></i>
                    </div>
                    <div class="col-10 text-start">
                        <a class="dropdown-item" href="#">Profile</a>
                    </div>
                </li>
                <li class="row align-items-center justify-content-center border-2">
                    <div class="col-2 text-center text-dark">
                        <i class="fa fa-right-from-bracket" style="font-size: 20px; padding-left: 15px;"></i>
                    </div>
                    <div class="col-10 text-start">
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>