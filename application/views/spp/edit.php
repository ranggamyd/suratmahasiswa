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
            <li class="breadcrumb-item active"><a href="<?= base_url('spp') ?>">SPP</a></li>
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
        <div class="col-md-3">
          <a href="<?= base_url('spp') ?>" class="btn btn-primary btn-block mb-3"><i class="fas fa-arrow-left mr-2"></i>Kembali ke daftar SPP</a>

          <div class="card bg-gradient-primary">
            <div class="card-header bg-gradient-primary">
              <h3 class="card-title">Jenis Surat</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="<?= base_url('skl') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Keterangan Lulus
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('sps') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Penelitian Skripsi
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('sokp') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Observasi Kunjungan Perusahaan
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('sak') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Aktif Kuliah
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('sppl') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Praktek Kerja Lapangan
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('sc') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Cuti
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('spk') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Pindah Kelas
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('spp') ?>" class="nav-link">
                    <i class="fas fa-envelope-open-text mr-2"></i> Surat Pindah Prodi
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card bg-gradient-primary">
            <div class="card-header bg-gradient-primary">
              <!-- <a href="<?= base_url('spp/edit') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Edit SPP</a> -->
              <h3 class="card-title">Edit Surat Cuti</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('spp/proses_edit') ?>" method="post">
              <input type="hidden" name="id" value="<?= $spp->id_spp ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="no_surat">No. Surat</label>
                  <input type="text" name="no_surat" value="<?= $spp->no_surat ?>" class="form-control bg-light" id="no_surat" placeholder="No. Surat :" readonly required>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="nim_mhs">Mahasiswa</label>
                    <select name="nim_mhs" class="form-control bg-light" id="nim_mhs" required>
                      <option value="">== Pilih Mahasiswa ==</option>
                      <?php foreach ($mhs as $item) : ?>
                        <option value="<?= $item['nim'] ?>" data-nama_mhs="<?= $item['nama_mhs'] ?>" data-semester="<?= $item['semester'] ?>" data-nama_prodi="<?= $item['nama_prodi'] ?>" data-gelar="<?= $item['gelar_kelulusan'] ?>" <?= ($item['nim'] == $spp->nim_mhs) ? 'selected' : '' ?>>
                          <?= $item['nama_prodi'] ?> - <?= $item['nim'] ?> - <?= $item['nama_mhs'] ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="nidn_dekan">Dekan</label>
                    <select name="nidn_dekan" class="form-control bg-light" id="nidn_dekan" readonly required>
                      <option value="">== Pilih Dekan ==</option>
                      <?php foreach ($dekan as $item) : ?>
                        <option value="<?= $item['nidn'] ?>" data-nama_dekan="<?= $item['nama_dekan'] ?>" <?= ($item['nidn'] == $spp->nidn_dekan) ? 'selected' : '' ?>><?= $item['nama_dekan'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="nidn_kaprodi">Kaprodi</label>
                    <select name="nidn_kaprodi" class="form-control bg-light" id="nidn_kaprodi" readonly required>
                      <option value="">== Pilih Kaprodi ==</option>
                      <?php foreach ($kaprodi as $item) : ?>
                        <option value="<?= $item['nidn'] ?>" data-nama_kaprodi="<?= $item['nama_kaprodi'] ?>" data-nama_prodi="<?= $item['nama_prodi'] ?>" <?= ($item['nidn'] == $spp->nidn_kaprodi) ? 'selected' : '' ?>><?= $item['nama_kaprodi'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" name="tujuan" value="<?= $spp->tujuan ?>" class="form-control bg-light" id="tujuan" placeholder="Tujuan :" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="instansi">Instansi</label>
                    <input type="text" name="instansi" value="<?= $spp->instansi ?>" class="form-control bg-light" id="instansi" placeholder="Instansi :" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tgl_surat">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" value="<?= $spp->tgl_surat ?>" class="form-control bg-light" id="tgl_surat" placeholder="Tanggal Surat :" readonly required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="perihal">Perihal</label>
                  <textarea name="perihal" class="form-control bg-light" id="perihal" rows="2" placeholder="Perihal :" required><?= $spp->perihal ?></textarea>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="prodi_asal">Prodi Asal</label>
                    <input type="text" name="prodi_asal" value="<?= $spp->prodi_asal ?>" class="form-control bg-light" id="prodi_asal" placeholder="Prodi Asal :" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="prodi_tujuan">Prodi Tujuan</label>
                    <input type="text" name="prodi_tujuan" value="<?= $spp->prodi_tujuan ?>" class="form-control bg-light" id="prodi_tujuan" placeholder="Prodi Tujuan :" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="alasan">Alasan</label>
                    <input type="text" name="alasan" value="<?= $spp->alasan ?>" class="form-control bg-light" id="alasan" placeholder="Alasan :" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="summernote">Body Surat</label>
                  <textarea name="body_surat" id="summernote" class="form-control bg-light" style="height: 300px" required><?= $spp->body_surat ?></textarea>
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