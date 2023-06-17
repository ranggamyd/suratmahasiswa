<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Surat Mahasiswa - <?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/toastr/toastr.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/summernote/summernote-bs4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?= base_url('assets') ?>/dist/img/user1-128x128.jpg" class="user-image img-circle elevation-2" alt="User Image">
            <span class="hidden-xs"><?= $this->session->userdata('nama_user') ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= base_url('assets') ?>/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
              <p>
                <?= $this->session->userdata('nama_user') ?>
                <small><?= $this->session->userdata('level') ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-block btn-flat">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url() ?>" class="brand-link d-flex justify-content-start align-items-center">
        <i class="fas fa-envelope text-xl brand-image elevation-2 mr-3"></i>
        <!-- <img src="<?= base_url('assets') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-bold">Surat Mahasiswa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('assets') ?>/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?= base_url('user/profil') ?>" class="d-block"><?= $this->session->userdata('nama_user') ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url() ?>" class="nav-link <?= ($this->uri->segment(1) == 'dashboard') || ($this->uri->segment(1) == NULL) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <?php if ($this->session->userdata('level') === 'Administrator') : ?>
              <li class="nav-header">MASTER DATA</li>
              <li class="nav-item">
                <a href="<?= base_url('prodi') ?>" class="nav-link <?= ($this->uri->segment(1) == 'prodi') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-school"></i>
                  <p>Prodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dekan') ?>" class="nav-link <?= ($this->uri->segment(1) == 'dekan') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>Dekan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('kaprodi') ?>" class="nav-link <?= ($this->uri->segment(1) == 'kaprodi') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>Kaprodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa') ?>" class="nav-link <?= ($this->uri->segment(1) == 'mahasiswa') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('user') ?>" class="nav-link <?= ($this->uri->segment(1) == 'user') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p>User</p>
                </a>
              </li>
            <?php elseif ($this->session->userdata('level') === 'Kaprodi' || $this->session->userdata('level') === 'Dekan') : ?>
              <li class="nav-header">MASTER DATA</li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa') ?>" class="nav-link <?= ($this->uri->segment(1) == 'mahasiswa') ? 'active' : ''; ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
            <?php endif; ?>
            <?php if ($this->session->userdata('level') === 'Administrator' || $this->session->userdata('level') === 'Mahasiswa') : ?>
            <li class="nav-header">SURAT MAHASISWA</li>
            <li class="nav-item">
              <a href="<?= base_url('skl') ?>" class="nav-link <?= ($this->uri->segment(1) == 'skl') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Keterangan Lulus</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('sps') ?>" class="nav-link <?= ($this->uri->segment(1) == 'sps') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Penelitian Skripsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('sokp') ?>" class="nav-link <?= ($this->uri->segment(1) == 'sokp') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Observasi KP</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('sak') ?>" class="nav-link <?= ($this->uri->segment(1) == 'sak') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Aktif Kuliah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('spkl') ?>" class="nav-link <?= ($this->uri->segment(1) == 'spkl') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat PKL</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('sc') ?>" class="nav-link <?= ($this->uri->segment(1) == 'sc') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Cuti</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('spk') ?>" class="nav-link <?= ($this->uri->segment(1) == 'spk') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Pindah Kelas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('spp') ?>" class="nav-link <?= ($this->uri->segment(1) == 'spp') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>Surat Pindah Prodi</p>
              </a>
            </li>
            <!-- <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
              <a href="<?= base_url('laporan') ?>" class="nav-link <?= ($this->uri->segment(1) == 'laporan') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-bars"></i>
                <p>Laporan</p>
              </a>
            </li> -->
            <?php endif; ?>
            <li class="nav-header">LAINNYA</li>
            <li class="nav-item">
              <a href="<?= base_url('user/profil') ?>" class="nav-link <?= ($this->uri->segment(2) == 'profil') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>Profil Saya</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url('user/edit_profil') ?>" class="nav-link <?= ($this->uri->segment(2) == 'edit_profil') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-user-edit"></i>
                <p>Edit Profil</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt fa-flip-horizontal"></i>
                <p>Keluar</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>