<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APDN PLN Lhoksukon - <?php echo $title ?></title>
    <meta name="description" content="aplikasi data pergantian angka meteran PLN Lhoksukon">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/images/logo/icon.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/magnific/magnific.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/toastify/toastify.css">


    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/app.css">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?php echo base_url('page')?>"><img src="<?php echo base_url()?>assets/images/logo/logo.png"  alt="Logo"  srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                            <li class="sidebar-title text-dark">Menu</li>
                            <li class="sidebar-item  <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/dashboard')){ echo 'active';} ?>">
                                <a href="<?php echo site_url('page/dashboard') ?>" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item  <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/pencatatan')){ echo 'active';} ?>">
                            <a href="<?php echo site_url('page/pencatatan') ?>" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Pencatatan</span>
                            </a>
                            </li>
                            <li class="sidebar-item  <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/laporan')){ echo 'active';} ?>">
                            <a href="<?php echo site_url('page/laporan') ?>" class='sidebar-link'>
                                <i class="bi bi-journal"></i>
                                <span>Laporan</span>
                            </a>
                            </li>
                            <?php if($this->session->userdata('level') == 1){ ?>
                                <li class="sidebar-item  <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/rekap')){ echo 'active';} ?>">
                                <a href="<?php echo site_url('page/rekap') ?>" class='sidebar-link'>
                                    <i class="bi bi-journal-check"></i>
                                    <span>Rekap Laporan</span>
                                </a>
                                </li>
                                <li class="sidebar-item   <?php if(($_SERVER['PHP_SELF']) == ($_SERVER['SCRIPT_NAME'].'/page/user')){ echo 'active';} ?>">
                                    <a href="<?php echo site_url('page/user') ?>" class='sidebar-link'>
                                    <i class="bi bi-person-fill"></i>
                                        <span>User</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="sidebar-item  ">
                                    <a href="<?php echo site_url('auth/logout') ?>" class='sidebar-link'>
                                    <i class="bi bi-box-arrow-in-left"></i>
                                        <span>Logout</span>
                                    </a>
                            </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="dropdown ms-auto">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $this->session->userdata('nama') ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?php if($this->session->userdata('level') == 1){ echo'admin'; }elseif($this->session->userdata('level') == 2){ echo'Petugas'; } ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo base_url()?>assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo $this->session->userdata('nama') ?>!</h6>
                                    </li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content" style="margin-top: -50px;">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3><?php echo $title ?></h3>
                                <p class="text-subtitle text-muted"><?php echo  $desk ?></p>
                            </div>
                        </div>
                    </div>