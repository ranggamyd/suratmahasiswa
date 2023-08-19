<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('sc') ?>">SC</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="<?= base_url('sc') ?>" class="btn btn-primary btn-block mb-3"><i class="fas fa-arrow-left mr-2"></i>Kembali ke daftar SC</a>

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
        <div class="card bg-gradient-primary">
          <div class="card-header bg-gradient-primary">
            <h3 class="card-title"><?= $title ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="mailbox-read-info">
              <h5><?= $sc->nama_mhs ?></h5>
              <h6><?= $sc->nim ?>
                <span class="mailbox-read-time float-right"><?= date('d M Y', strtotime($sc->tgl_surat)) ?></span>
              </h6>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-controls with-border text-center">
              <!-- /.btn-group -->
							<?php if ($this->session->userdata('level') != 'Mahasiswa') : ?>
              <button type="button" onclick="cetak_sc('<?= base_url('sc') ?>/cetak_pdf/<?= $sc->id_sc ?>')" class="btn btn-default btn-sm" title="Print">
                <i class="fas fa-print mr-2"></i>Cetak Surat
              </button>
							<?php endif ?>
              <a href="<?= base_url('sc/download_pdf/') . $sc->id_sc ?>" target="__blank" class="btn btn-default btn-sm" title="Download PDF">
                <i class="far fa-file-pdf mr-2"></i>Download PDF
              </a>
            </div>
            <!-- /.mailbox-read-info -->
            <div class="mailbox-read-message">
              <?= $sc->body_surat ?>
            </div>
            <!-- /.mailbox-read-message -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer"></div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  <script>
    function cetak_sc(pdfUrl) {
      var win = window.open(pdfUrl, "_blank");
      win.onload = function() {
        win.print();
      };
    }
  </script>
