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
            <li class="breadcrumb-item active"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
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
              <!-- <a href="<?= base_url('mahasiswa/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah Mahasiswa</a> -->
              <h3 class="card-title">Edit Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('mahasiswa/proses_edit') ?>" method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="nim">Nomor Induk Mahasiswa</label>
                      <input type="text" name="nim" value="<?= $mahasiswa->nim ?>" class="form-control" id="nim" placeholder="Tuliskan Nomor Induk Mahasiswa" readonly required>
                    </div>
                    <div class="form-group">
                      <label for="nama_mhs">Nama Lengkap</label>
                      <input type="text" name="nama_mhs" value="<?= $mahasiswa->nama_mhs ?>" class="form-control" id="nama_mhs" placeholder="Tuliskan Nama Mahasiswa" required>
                    </div>
                    <div class="form-group">
                      <label for="id_prodi">Prodi</label>
                      <select name="id_prodi" class="form-control" id="id_prodi" required>
                        <option selected disabled>== Pilih Prodi ==</option>
                        <?php foreach ($prodi as $item) : ?>
                          <option value="<?= $item['id'] ?>" <?= ($item['id'] == $mahasiswa->id_prodi ? 'selected' : '') ?>><?= $item['nama_prodi'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tingkat">Tingkat</label>
                      <input type="number" name="tingkat" value="<?= $mahasiswa->tingkat ?>" min="1" class="form-control" id="tingkat" placeholder="Tuliskan Tingkat" required>
                    </div>
                    <div class="form-group">
                      <label for="semester">Semester</label>
                      <input type="number" name="semester" value="<?= $mahasiswa->semester ?>" min="1" class="form-control" id="semester" placeholder="Tuliskan Semester" required>
                    </div>
                    <div class="form-group">
                      <label for="thn_masuk">Tahun Masuk</label>
                      <input type="number" name="thn_masuk" value="<?= $mahasiswa->thn_masuk ?>" min="2000" max="2100" class="form-control" id="thn_masuk" placeholder="Tuliskan Tahun Masuk" required>
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select name="status" class="form-control" id="status" required>
                        <option value="Aktif" <?= ('Aktif' == $mahasiswa->status ? 'selected' : '') ?>>Aktif</option>
                        <option value="Nonaktif" <?= ('Nonaktif' == $mahasiswa->status ? 'selected' : '') ?>>Nonaktif</option>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="nama_ortu">Nama Orang Tua</label>
                      <input type="text" name="nama_ortu" value="<?= $mahasiswa->nama_ortu ?>" class="form-control" id="nama_ortu" placeholder="Tuliskan Nama Orang Tua" required>
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input type="text" name="nip" value="<?= $mahasiswa->nip ?>" class="form-control" id="nip" placeholder="Tuliskan NIP" required>
                    </div>
                    <div class="form-group">
                      <label for="pangkat">Pangkat</label>
                      <input type="text" name="pangkat" value="<?= $mahasiswa->pangkat ?>" class="form-control" id="pangkat" placeholder="Tuliskan Nama Orang Tua" required>
                    </div>
                    <div class="form-group">
                      <label for="golongan">Golongan</label>
                      <input type="text" name="golongan" value="<?= $mahasiswa->golongan ?>" class="form-control" id="golongan" placeholder="Tuliskan Golongan" required>
                    </div>
                    <div class="form-group">
                      <label for="tempat_kerja">Tempat Kerja</label>
                      <input type="text" name="tempat_kerja" value="<?= $mahasiswa->tempat_kerja ?>" class="form-control" id="tempat_kerja" placeholder="Tuliskan Tempat Kerja" required>
                    </div>
                    <div class="form-group">
                      <label for="alamat_rumah">Alamat Rumah</label>
                      <input type="text" name="alamat_rumah" value="<?= $mahasiswa->alamat_rumah ?>" class="form-control" id="alamat_rumah" placeholder="Tuliskan Alamat Rumah" required>
                    </div>
                  </div>
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