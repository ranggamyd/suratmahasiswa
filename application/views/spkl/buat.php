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
            <li class="breadcrumb-item active"><a href="<?= base_url('spkl') ?>">SPKL</a></li>
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
          <a href="<?= base_url('spkl') ?>" class="btn btn-primary btn-block mb-3"><i class="fas fa-arrow-left mr-2"></i>Kembali ke daftar SPKL</a>

          <div class="card">
            <div class="card-header">
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
                  <a href="<?= base_url('spkl') ?>" class="nav-link">
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
          <div class="card">
            <div class="card-header">
              <!-- <a href="<?= base_url('spkl/buat') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Buat SPKL</a> -->
              <h3 class="card-title">Buat Surat Praktek Kerja Lapangan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('spkl/proses_buat') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="no_surat">No. Surat</label>
                  <input type="text" name="no_surat" value="<?= $no_surat ?>" class="form-control bg-light" id="no_surat" placeholder="No. Surat :" readonly required>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="nim_mhs">Mahasiswa</label>
                    <select name="nim_mhs" class="form-control bg-light" id="nim_mhs" required>
                      <option value="">== Pilih Mahasiswa ==</option>
                      <?php foreach ($mhs as $item) : ?>
                        <option value="<?= $item['nim'] ?>" data-nama_mhs="<?= $item['nama_mhs'] ?>" data-semester="<?= $item['semester'] ?>" data-no_telp="<?= $item['no_telp'] ?>" data-nama_prodi="<?= $item['nama_prodi'] ?>" data-gelar="<?= $item['gelar_kelulusan'] ?>">
                          <?= $item['nama_prodi'] ?> - <?= $item['nim'] ?> - <?= $item['nama_mhs'] ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nidn_dekan">Dekan</label>
                    <select name="nidn_dekan" class="form-control bg-light" id="nidn_dekan" readonly required>
                      <option value="">== Pilih Dekan ==</option>
                      <?php foreach ($dekan as $item) : ?>
                        <option value="<?= $item['nidn'] ?>" data-nama_dekan="<?= $item['nama_dekan'] ?>" <?= ($format_default->nidn_dekan_default == $item['nidn']) ? 'selected' : '' ?>><?= $item['nama_dekan'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="nama_instansi">Nama Instansi</label>
                    <input type="text" name="nama_instansi" class="form-control bg-light" id="nama_instansi" placeholder="Nama Instansi :" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="alamat_instansi">Alamat Instansi</label>
                    <input type="text" name="alamat_instansi" class="form-control bg-light" id="alamat_instansi" placeholder="Alamat Instansi :" required>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tgl_surat">Tanggal Surat</label>
                    <input type="date" name="tgl_surat" value="<?= date('Y-m-d') ?>" class="form-control bg-light" id="tgl_surat" placeholder="Tanggal Surat :" readonly required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="perihal">Perihal</label>
                  <textarea name="perihal" class="form-control bg-light" id="perihal" rows="2" placeholder="Perihal :" required><?= $format_default->perihal_default ?></textarea>
                </div>
                <div class="form-group">
                  <label for="summernote">Body Surat</label>
                  <textarea name="body_surat" id="summernote" class="form-control bg-light" style="height: 300px" required><?= $format_default->template ?></textarea>
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