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

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
  
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: url('<?= base_url() ?>/assets/bgpmii.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }
    
    /* Overlay untuk background */
    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6); /* Overlay gelap untuk membuat konten lebih terbaca */
      z-index: -1;
    }
    
    .navbar-custom {
      background: linear-gradient(135deg, #0056b3 0%, #007bff 100%);
      padding: 1rem 0;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      border: none;
    }
    
    .main-header {
      border-bottom: none !important;
    }

    .main-header.navbar {
      margin-left: 0;
      border: none;
    }
    
    .navbar-brand {
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 12px; /* Jarak antara logo dan teks */
    }
    
    .brand-text {
      color: #ffc107 !important;
      font-size: 1.4rem;
      margin-left: 10px;
    }
    
    .navbar-dark .navbar-toggler {
      border-color: rgba(255,255,255,0.5);
    }
    
    .content {
      background-color: rgba(255, 255, 255, 0.95); /* Semi transparan */
      min-height: 80vh;
      padding: 2rem 0;
      margin: 20px 0;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    
    .footer {
      background: linear-gradient(135deg, #0056b3 0%, #007bff 100%);
      color: white;
      padding: 1rem 0;
      position: relative;
      margin-top: auto;
    }
    
    .footer a {
      color: #ffc107;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    .footer a:hover {
      color: #ffdb4d;
      transform: scale(1.05);
    }

    .wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Animasi untuk social media icons */
    .social-icons a {
      display: inline-block;
      margin: 0 10px;
      transition: transform 0.3s ease;
    }

    .social-icons a:hover {
      transform: translateY(-3px);
    }

    .brand-image {
      width: 35px; /* Memperbesar ukuran logo */
      height: auto;
      filter: drop-shadow(0 0 5px rgba(0,0,0,0.3)); /* Menambah shadow di belakang logo */
      transition: transform 0.3s ease;
    }

    .brand-image:hover {
      transform: scale(1.05); /* Efek hover sedikit membesar */
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-custom border-bottom-0">
    <div class="container">
      <a href="<?= base_url() ?>" class="navbar-brand">
        <img src="<?= base_url() ?>/assets/logopmii.png" alt="PMII Logo" class="brand-image">
        <span class="brand-text">SI PMII JAMBI</span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
<br>
  <!-- Content -->
      <div class="row justify-content-center">
        <?php if ($page) {
            echo view($page);
        } ?>
      </div>
<br>
  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="social-icons">
            <a href="https://instagram.com/pmii.jambi" target="_blank">
              <i class="fab fa-instagram fa-lg"> </i>
            </a>
            <a href="https://facebook.com/pmiijambi" target="_blank" class="mx-3">
              <i class="fab fa-facebook fa-lg"></i>
            </a>
            <a href="https://twitter.com/pmiijambi" target="_blank">
              <i class="fab fa-twitter fa-lg"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
</div>

<!-- REQUIRED SCRIPTS -->
<script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

</body>
</html>
