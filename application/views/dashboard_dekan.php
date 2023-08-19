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
                <div class="col border-right">
                  <a href="<?= base_url('mahasiswa') ?>" class="text-light">
                    <div class="description-block">
                      <h5 class="description-header">TOTAL MAHASISWA</h5>
                      <span class="description-text"><?= $total_mahasiswa ?> Total</span>
                    </div>
                  </a>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
      </div>
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->