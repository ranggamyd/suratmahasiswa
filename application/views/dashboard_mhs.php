<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid p-4"><!-- Info boxes -->
      <h2 class="text-center">Sistem Informasi Pelayanan Surat Mahasiswa</h2>
      <h4 class="text-center mb-4">Fakultas Teknik Universitas Muhammadiyah Cirebon</h4>
      <div class="row">
        <div class="col text-center">
          <!-- Widget: user widget style 1 -->
          <div class="card card-widget widget-user bg-gradient-primary">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-light vh-80" style="background: url('<?= base_url('assets') ?>/dist/img/photo1.png') center top; height: 45vh; filter: brightness(.7);">
              <div class="p-3" style="position: absolute; bottom: 10px; right: 10px; backdrop-filter: blur(10px); border-radius: 5px">
                <h3 class="widget-user-username text-right"><?= $user->nama_user ?></h3>
                <h5 class="widget-user-desc text-right"><?= $user->level ?></h5>
              </div>
            </div>
            <div class="widget-user-image" style="top: 62.5%">
              <img class="img-circle" src="<?= base_url('assets') ?>/dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="card-footer">
              <div class="row d-flex justify-content-between">
                <div class="col-sm-2 border-right">
                  <a href="<?= base_url('skl') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SKL</h5>
                      <span class="description-text"><?= $total_skl ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-1 border-right">
                  <a href="<?= base_url('sps') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SPS</h5>
                      <span class="description-text"><?= $total_sps ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-1 border-right">
                  <a href="<?= base_url('sokp') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SOKP</h5>
                      <span class="description-text"><?= $total_sokp ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-2 border-right">
                  <a href="<?= base_url('sak') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SAK</h5>
                      <span class="description-text"><?= $total_sak ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-2 border-right">
                  <a href="<?= base_url('spkl') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SPKL</h5>
                      <span class="description-text"><?= $total_spkl ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-1 border-right">
                  <a href="<?= base_url('sc') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SC</h5>
                      <span class="description-text"><?= $total_sc ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-1 border-right">
                  <a href="<?= base_url('spk') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SPK</h5>
                      <span class="description-text"><?= $total_spk ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
                <div class="col-sm-2">
                  <a href="<?= base_url('spp') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">SPP</h5>
                      <span class="description-text"><?= $total_spp ?> Surat</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
          <!-- <h1>SELAMAT DATANG SISTEM INFORMASI SURAT MAHASISWA</h1>
          <h2>Fakultas Teknik Universitas Muhammadiyah Cirebon</h2> -->
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->