
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
  
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('')?>">
        <i class="fas fa-sign-out-alt"></i> Log Out
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="<?= base_url('assets') ?>/logopmii.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PMII Jambi</span>
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
            <a href="<?= base_url('datamapaba') ?>" class="nav-link <?= $submenu == 'datamapaba' ? 'active' : '' ?>
                <i class="far fa-circle nav-icon"></i>
                <p>DATA MAPABA</p>
                </a>
              </li>
              
              <li class="nav-item">
              <a href="<?= base_url('datapkd') ?>" class="nav-link <?= $submenu == 'datapkd' ? 'active' : '' ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>DATA PKD</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('datapkl') ?>" class="nav-link <?= $submenu == 'datapkl' ? 'active' : '' ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>DATA PKL</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('datapkn') ?>" class="nav-link <?= $submenu == 'datapkn' ? 'active' : '' ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>DATA PKN</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="<?= base_url('dataalumni') ?>" class="nav-link <?= $submenu == 'dataalumni' ? 'active' : '' ?>
                  <i class="far fa-circle nav-icon"></i>
                  <p>DATA ALUMNI</p>
                </a>
              </li>

      </nav>
      <!-- /.sidebar-menu -->
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
