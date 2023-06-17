<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <a href="<?= base_url('user/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah User</a> -->
              <h3 class="card-title">Tambah User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('user/proses_tambah') ?>" method="post">
              <div class="card-body">
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Informasi tambahan!</h5>
                  Selain akun berjenis Administrator, akun ditambahkan secara otomatis ketika menambah Mahasiswa, Dekan ataupun Kaprodi.
                </div>
                <div class="form-group">
                  <label for="nama_user">Nama Lengkap</label>
                  <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Tuliskan Nama User" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Tuliskan Username" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Tuliskan Password" required>
                </div>
                <div class="form-group">
                  <label for="level">Level</label>
                  <input type="text" name="level" value="Administrator" class="form-control" id="level" placeholder="Tuliskan Level" readonly required>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-right">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->