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
            <li class="breadcrumb-item active"><a href="<?= base_url('kaprodi') ?>">Kaprodi</a></li>
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
              <!-- <a href="<?= base_url('kaprodi/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah Kaprodi</a> -->
              <h3 class="card-title">Edit Kaprodi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('kaprodi/proses_edit') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="nidn">Nomor Induk Dosen Nasional</label>
                  <input type="text" name="nidn" value="<?= $kaprodi->nidn ?>" class="form-control" id="nidn" placeholder="Tuliskan Nomor Induk Dosen Nasional" readonly required>
                </div>
                <div class="form-group">
                  <label for="nama_kaprodi">Nama Lengkap</label>
                  <input type="text" name="nama_kaprodi" value="<?= $kaprodi->nama_kaprodi ?>" class="form-control" id="nama_kaprodi" placeholder="Tuliskan Nama Kaprodi" required>
                </div>
                <div class="form-group">
                  <label for="id_prodi">Prodi</label>
                  <select name="id_prodi" class="form-control" id="id_prodi" required>
                    <option>== Pilih Prodi ==</option>
                    <?php foreach ($prodi as $item) : ?>
                      <option value="<?= $item['id'] ?>" <?= ($item['id'] == $kaprodi->id_prodi ? 'selected' : '') ?>><?= $item['nama_prodi'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="email" name="email" value="<?= $kaprodi->email ?>" class="form-control" id="email" placeholder="Tuliskan E-Mail" required>
                </div>
                <div class="form-group">
                  <label for="no_telp">No. Telepon</label>
                  <input type="number" name="no_telp" value="<?= $kaprodi->no_telp ?>" class="form-control" id="no_telp" placeholder="Tuliskan No. Telepon" required>
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