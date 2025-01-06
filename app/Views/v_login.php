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
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <img src="<?= base_url('assets/' . $web['logo_pmii']) ?>" width="40%">
        <h4><b><?= $web['nama'] ?><b><h4>
      <a href="<?= base_url('') ?>" class="h6"><b>DATA KADERISASI</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login</p>
      <?php 
      session();
      $validasi = \Config\Services::validation();
      if (session()->get('pesan')) {
        echo '<div class="alert alert-danger">';
        echo session()->get('pesan');
        echo '</div>';
      }
      ?>
      <?php echo form_open('Auth/CekLogin') ?>
      <div class="form-group">
            <label>Username</label>
          <input name="username" class="form-control" placeholder="username">
          <p class="text-danger"><?= $validasi->getError('username') ?></p>
        </div>
        <div class="form-group">
        <label>Level</label>
          <select name="level" class="form-control">
            <option value="">--pilih--</option>
            <option value="1">Admin</option>
            <option value="2">PC PMII Kota Jambi</option>
            <option value="3">PC PMII Batang Hari</option>
            <option value="4">PC PMII Tebo</option>
            <option value="5">PC PMII Sarolangun</option>
            <option value="6">PC PMII Bungo</option>
            <option value="7">PC PMII Merangin</option>
            <option value="8">PC PMII Kerinci</option>
            <option value="9">PC PMII Tanjung Jabung Barat</option>
            <option value="10">PC PMII Tanjung Jabung Timur</option>
          </select>
          <p class="text-danger"><?= $validasi->getError('level') ?></p>
        </div>
        <div class="form-group">
        <label>Password</label>
          <input name="password" type="password" class="form-control" placeholder="password">
          <p class="text-danger"><?= $validasi->getError('password') ?></p>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <?php echo form_close() ?>

      
    <!-- /.card-body -->
  </div>
  </div>
  </div>

  
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>
</html>
