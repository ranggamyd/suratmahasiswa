<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Surat Mahasiswa - <?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Selamat Datang!</b>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Surat Mahasiswa Fakultas Teknik UMC</p>

        <form action="<?= base_url('auth/login') ?>" method="post">
          <label for="username">Username</label>
          <div class="input-group mb-3">
            <input type="username" name="username" class="form-control" id="username" placeholder="Tuliskan Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <label for="password">Password</label>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Tuliskan Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk<i class="fas fa-sign-in-alt ml-2"></i></button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets') ?>/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets') ?>/dist/js/adminlte.js"></script>

  <script>
    $(function() {
      <?php if ($this->session->flashdata('sukses')) : ?>
        toastr.success('<?= $this->session->flashdata('sukses'); ?>')
      <?php elseif ($this->session->flashdata('gagal')) : ?>
        toastr.error('<?= $this->session->flashdata('gagal'); ?>')
      <?php endif ?>
    });
  </script>
</body>

</html>