<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

  <style>
    .card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border: none;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }

    .form-control {
      background: rgba(255, 255, 255, 0.8);
      border: 1px solid #ced4da;
    }

    .form-control:focus {
      background: rgba(255, 255, 255, 0.95);
    }

    .btn-primary {
      background: #007bff;
      border: none;
      transition: all 0.3s;
    }

    .btn-primary:hover {
      background: #0056b3;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .card-header {
      border-bottom: none;
      padding-top: 25px;
    }

    .login-box-msg {
      color: #666;
      font-size: 16px;
      margin-bottom: 2px;
      padding: 0;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box" style="width: 350px; margin: 0 auto;">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="<?= base_url('assets/' . $web['logo_pmii']) ?>" width="20%">
        <p class="mt-2 mb-2" style="color: #000; font-size: 20px;">Selamat Datang Sahabat Pergerakan</p>
        <h4><b><?= $web['nama'] ?></b></h4>
        <b>DATA KADERISASI</b>

      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Login</p>
        <?php
        session();
        $validasi = \Config\Services::validation();
        if (session()->get('pesan')) {
          echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>';
          echo session()->get('pesan');
          echo '</div>';
        }
        ?>

        <?php echo form_open('Auth/CekLogin') ?>
        <div class="form-group">
          <label><i class="fas fa-user mr-2"></i>Username</label>
          <input name="username" class="form-control" placeholder="Masukkan username">
          <p class="text-danger"><?= $validasi->getError('username') ?></p>
        </div>

        <div class="form-group">
          <label><i class="fas fa-lock mr-2"></i>Password</label>
          <input name="password" type="password" class="form-control" placeholder="Masukkan password">
          <p class="text-danger"><?= $validasi->getError('password') ?></p>
        </div>

        <div class="form-group">
          <label><i class="fas fa-users-cog mr-2"></i>Level</label>
          <select name="level" class="form-control">
            <option value="">--Pilih Login Sebagai--</option>
            <option value="1">PKC PMII</option>
            <option value="2">PC PMII</option>
          </select>
          <p class="text-danger"><?= $validasi->getError('level') ?></p>
        </div>
        <br>
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" style="width: 120px;">Login</button>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>