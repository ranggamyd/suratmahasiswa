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
        <a href="<?= base_url('sc/buat') ?>" class="btn btn-primary btn-block mb-3"><i class="fas fa-pen mr-2"></i>Buat Surat SC Baru</a>

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
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"><?= $title ?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable" class="table table-hover table-striped">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>No. Surat</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($sc as $item) :
                  ?>
                    <tr>
                      <th class="text-center"><?= $i++ ?></th>
                      <td class="text-center"><?= $item['no_surat'] ?></td>
                      <td><?= $item['nama_mhs'] ?></td>
                      <td class="text-center"><?= $item['nim_mhs'] ?></td>
                      <td class="text-center"><?= date('d-m-Y', strtotime($item['tgl_surat'])) ?></td>
                      <td class="text-center">
                        <?php if ($item['status_surat'] == 'Menunggu') : ?>
                          <div class="dropdown">
                            <button class="btn btn-primary btn-sm dropdown-toggle <?= $this->session->userdata('level') != 'Administrator' ? 'disabled' : '' ?>" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?= $item['status_surat'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('sc/terima/') . $item['id_sc'] ?>">Konfirmasi</a>
                              <a class="dropdown-item" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('sc/tolak/') . $item['id_sc'] ?>">Tolak Surat</a>
                            </div>
                          </div>
                        <?php elseif ($item['status_surat'] == 'Dikonfirmasi') : ?>
                          <div class="dropdown">
                            <button class="btn btn-success btn-sm dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?= $item['status_surat'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('sc/terima/') . $item['id_sc'] ?>">Konfirmasi</a>
                              <a class="dropdown-item" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('sc/tolak/') . $item['id_sc'] ?>">Tolak Surat</a>
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="dropdown">
                            <button class="btn btn-danger btn-sm dropdown-toggle disabled" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?= $item['status_surat'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('sc/terima/') . $item['id_sc'] ?>">Konfirmasi</a>
                              <a class="dropdown-item" onclick="return confirm('Apakah anda yakin?')" href="<?= base_url('sc/tolak/') . $item['id_sc'] ?>">Tolak Surat</a>
                            </div>
                          </div>
                        <?php endif ?>
                      </td>
                      <td class="text-center">
                        <a href="<?= base_url('sc/detail/') . $item['id_sc'] ?>" class="btn btn-info"><i class="fas fa-eye mr-2"></i>Lihat</a>
                        <a href="<?= base_url('sc/edit/') . $item['id_sc'] ?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Edit</a>
                        <a href="<?= base_url('sc/hapus/') . $item['id_sc'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>No</th>
                    <th>No. Surat</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </tfoot>
              </table>
              <!-- /.table -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->