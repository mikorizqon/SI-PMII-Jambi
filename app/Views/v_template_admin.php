<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SI PMII Jambi | <?= $judul ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">


  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
  
  <!-- Tambahkan custom CSS -->
  <style>
    :root {
      --primary-blue: #1a237e;
      --secondary-blue: #283593;
      --primary-yellow: #ffd700;
      --secondary-yellow: #ffeb3b;
    }

    .main-header {
      background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue)) !important;
    }

    .main-header .navbar-light .navbar-nav .nav-link {
      color: white !important;
    }

    .main-sidebar {
      background: linear-gradient(180deg, var(--primary-blue), var(--secondary-blue)) !important;
    }

    .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
      background-color: var(--primary-yellow) !important;
      color: var(--primary-blue) !important;
      box-shadow: 0 1px 3px rgba(0,0,0,0.12);
    }

    .nav-sidebar .nav-item .nav-link {
      color: white !important;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .nav-sidebar .nav-item .nav-link:hover {
      background-color: var(--secondary-yellow) !important;
      color: var(--primary-blue) !important;
    }

    .brand-link {
      background: var(--primary-blue) !important;
      color: white !important;
      border-bottom: 2px solid var(--primary-yellow) !important;
    }

    .brand-text {
      color: var(--primary-yellow) !important;
      font-weight: bold !important;
    }

    .content-wrapper {
      background-color: #f4f6f9 !important;
    }

    .content-header h1 {
      color: var(--primary-blue);
      font-weight: bold;
    }

    .breadcrumb-item.active {
      color: var(--secondary-blue);
    }

    .breadcrumb-item a {
      color: var(--primary-blue);
    }

    /* Tambahkan style untuk icon sidebar */
    .nav-sidebar .nav-item .nav-link i {
        width: 25px;
        margin-right: 10px;
        text-align: center;
        font-size: 1.1rem;
    }

    .nav-sidebar .nav-item .nav-link {
        padding: 10px 10px;
        display: flex;
        align-items: center;
    }

    .nav-sidebar .nav-item .nav-link p {
        margin: 0;
        margin-left: 5px;
    }

    /* Memperbaiki padding untuk dashboard icon */
    .nav-sidebar .nav-item .nav-link .nav-icon {
        width: 25px;
        margin-right: 10px;
        text-align: center;
        font-size: 1.1rem;
    }

    /* Memberikan hover effect yang lebih smooth */
    .nav-sidebar .nav-item .nav-link:hover i {
        transform: translateX(3px);
        transition: transform 0.2s ease;
    }

    .welcome-message {
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        background: rgba(255,255,255,0.1);
        margin-right: 15px;
        font-size: 0.9rem;
    }

    .welcome-message i {
        color: var(--primary-yellow);
        margin-right: 5px;
    }

    .welcome-dropdown {
        position: relative;
        cursor: pointer;
    }

    .welcome-message:hover {
        background: rgba(255,255,255,0.2);
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        display: none;
    }

    .welcome-dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu a {
        display: block;
        padding: 8px 15px;
        color: var(--primary-blue);
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .dropdown-menu a:hover {
        background: var(--primary-yellow);
    }

    .dropdown-menu i {
        margin-right: 8px;
        color: var(--primary-blue);
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item welcome-dropdown">
        <div class="welcome-message">
          <i class="fas fa-user-circle"></i>
          Selamat Datang Sahabat <?= session()->get('nama_user') ?>
          <i class="fas fa-chevron-down ml-2" style="font-size: 0.8rem;"></i>
        </div>
        <div class="dropdown-menu">
          <a href="<?= base_url('Home')?>">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="<?= base_url('assets') ?>/logopmii.png" class="brand-image">
      <span class="brand-text">PMII Jambi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
            <li class="nav-item">
              <a href="<?= base_url('DashboardAdmin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
            <a href="<?= base_url('datamapaba') ?>" class="nav-link <?= $submenu == 'datamapaba' ? 'active' : '' ?>">
            <i class="fas fa-database"></i>
                <p>DATA MAPABA</p>
                </a>
              </li>
              
              <li class="nav-item">
              <a href="<?= base_url('datapkd') ?>" class="nav-link <?= $submenu == 'datapkd' ? 'active' : '' ?>">
              <i class="fas fa-th-list"></i>
                  <p>DATA PKD</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('datapkl') ?>" class="nav-link <?= $submenu == 'datapkl' ? 'active' : '' ?>">
              <i class="fas fa-server"></i>
                  <p>DATA PKL</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('datapkn') ?>" class="nav-link <?= $submenu == 'datapkn' ? 'active' : '' ?>">
              <i class="fas fa-table"></i>
                  <p>DATA PKN</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('dataalumni') ?>" class="nav-link <?= $submenu == 'dataalumni' ? 'active' : '' ?>">
              <i class="fas fa-user-tie"></i>
                  <p>DATA ALUMNI</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('datauser') ?>" class="nav-link <?= $submenu == 'dataalumni' ? 'active' : '' ?>">
              <i class="fas fa-user-friends"></i>
                  <p>DATA PENGGUNA SISTEM</p>
                </a>
              </li>

      </nav>
      <!-- /.sidebar-menu -->
    </ul>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $subjudul ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
              <li class="breadcrumb-item active"><?= $subjudul ?></li>
            </ol>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

            <?php if ($page) {
                echo view($page);
            } ?>

