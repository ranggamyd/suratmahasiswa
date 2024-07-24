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
            <li class="breadcrumb-item active"><a href="<?= base_url('dekan') ?>">Dekan</a></li>
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
              <!-- <a href="<?= base_url('dekan/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah Dekan</a> -->
              <h3 class="card-title">Tambah Dekan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('dekan/proses_tambah') ?>" method="post">
              <div class="card-body ">
                <div class="form-group">
                  <label for="nidn">Nomor Induk Dosen Nasional</label>
                  <input type="text" name="nidn" class="form-control  bg-light" id="nidn" placeholder="Tuliskan Nomor Induk Dosen Nasional" required>
                </div>
                <div class="form-group">
                  <label for="nama_dekan">Nama Lengkap</label>
                  <input type="text" name="nama_dekan" class="form-control  bg-light" id="nama_dekan" placeholder="Tuliskan Nama Dekan" required>
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="email" name="email" class="form-control  bg-light" id="email" placeholder="Tuliskan E-Mail" required>
                </div>
                <div class="form-group">
                  <label for="no_telp">No. Telepon</label>
                  <input type="number" name="no_telp" class="form-control  bg-light" id="no_telp" placeholder="Tuliskan No. Telepon" required>
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