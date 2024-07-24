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
              <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <!-- About Me Box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Informasi Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline pt-3 h-100">
                      <div class="card-body box-profile d-flex align-items-center justify-content-around flex-column">
                        <div class="text-center"><img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets') ?>/dist/img/user1-128x128.jpg" alt="User profile picture" style="width: 200px;"></div>
                        <div>
                          <h3 class="profile-username text-center mt-4"><?= $user->nama_user ?></h3>
                          <p class="text-muted text-center"><?= $user->level ?></p>
                        </div>
                        <?php if ($user->level == 'Administrator') : ?>
                          <a href="<?= base_url('user/edit/') . $user->id ?>" class="btn btn-block btn-primary"><i class="fas fa-edit mr-2"></i>Edit Akun</a>
                        <?php endif ?>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <div class="col-md-9 pl-3 d-flex flex-column justify-content-around pt-3">
                    <?php if ($user->level == 'Dekan') : ?>
                      <?php $dekan = $this->db->get_where('dekan', ['nidn' => $user->nidn_dekan])->row(); ?>
                      <strong>Nama Dekan</strong>
                      <p class="text-muted"><?= $dekan->nama_dekan ?></p>
                      <hr class="divider">
                      <strong>NIK/NIDN</strong>
                      <p class="text-muted"><?= $dekan->nidn ?></p>
                      <hr class="divider">
                      <strong>E-Mail</strong>
                      <p class="text-muted"><?= $dekan->email ?></p>
                      <hr class="divider">
                      <strong>No. Telepon</strong>
                      <p class="text-muted"><?= $dekan->no_telp ?></p>
                      <hr class="divider">
                      <a href="<?= base_url('dekan/edit/') . $dekan->nidn ?>" class="btn btn-block btn-primary"><i class="fas fa-edit mr-2"></i>Perbarui Informasi Dekan</a>
                    <?php elseif ($user->level == 'Kaprodi') : ?>
                      <?php $kaprodi = $this->db->get_where('kaprodi', ['nidn' => $user->nidn_kaprodi])->row(); ?>
                      <strong>Nama Kaprodi</strong>
                      <p class="text-muted"><?= $kaprodi->nama_kaprodi ?></p>
                      <hr class="divider">
                      <strong>NIK/NIDN</strong>
                      <p class="text-muted"><?= $kaprodi->nidn ?></p>
                      <hr class="divider">
                      <strong>Kepala Prodi</strong>
                      <p class="text-muted"><?= $this->db->get_where('prodi', ['id' => $kaprodi->id_prodi])->row('nama_prodi'); ?></p>
                      <hr class="divider">
                      <strong>E-Mail</strong>
                      <p class="text-muted"><?= $kaprodi->email ?></p>
                      <hr class="divider">
                      <strong>No. Telepon</strong>
                      <p class="text-muted"><?= $kaprodi->no_telp ?></p>
                      <hr class="divider">
                      <a href="<?= base_url('kaprodi/edit/') . $kaprodi->nidn ?>" class="btn btn-block btn-primary"><i class="fas fa-edit mr-2"></i>Perbarui Informasi Kaprodi</a>
                    <?php elseif ($user->level == 'Mahasiswa') : ?>
                      <?php $mhs = $this->db->get_where('mhs', ['nim' => $user->nim_mhs])->row(); ?>
                      <strong>Nama Mahasiswa</strong>
                      <p class="text-muted"><?= $mhs->nama_mhs ?></p>
                      <hr class="divider">
                      <strong>NIM</strong>
                      <p class="text-muted"><?= $mhs->nim ?></p>
                      <hr class="divider">
                      <strong>Prodi</strong>
                      <p class="text-muted"><?= $this->db->get_where('prodi', ['id' => $mhs->id_prodi])->row('nama_prodi'); ?></p>
                      <hr class="divider">
                      <strong>Tingkat / Semester</strong>
                      <p class="text-muted"><?= $mhs->tingkat . ' / ' . $mhs->semester ?></p>
                      <hr class="divider">
                      <strong>Tahun Masuk</strong>
                      <p class="text-muted"><?= $mhs->thn_masuk ?></p>
                      <hr class="divider">
                      <a href="<?= base_url('mahasiswa/edit/') . $mhs->nim ?>" class="btn btn-block btn-primary"><i class="fas fa-edit mr-2"></i>Perbarui Informasi Mahasiswa</a>
                    <?php elseif ($user->level == 'Administrator') : ?>
                      <strong>Nama Administrator</strong>
                      <p class="text-muted"><?= $user->nama_user ?></p>
                      <hr class="divider">
                      <strong>Username</strong>
                      <p class="text-muted"><?= $user->username ?></p>
                      <hr class="divider">
                      <strong>Level</strong>
                      <p class="text-muted"><?= $user->level ?></p>
                      <hr class="divider">
                    <?php endif ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->