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
              <?php if ($this->session->userdata('level') == 'Administrator') : ?>
                <a href="<?= base_url('mahasiswa/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah Mahasiswa</a>
              <?php endif ?>
              <!-- <h3 class="card-title">Daftar Mahasiswa</h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="datatable" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Tahun Masuk</th>
                    <th>Status</th>
                    <?php if ($this->session->userdata('level') == 'Administrator') : ?>
                      <th>Aksi</th>
                    <?php endif ?>
                  </tr>
                </thead>
                <tbody class=" ">
                  <?php
                  $i = 1;
                  foreach ($mahasiswa as $item) :
                  ?>
                    <tr>
                      <th class="text-center"><?= $i++ ?></th>
                      <td><?= $item['nama_mhs'] ?></td>
                      <td class="text-center"><?= $item['nim'] ?></td>
                      <td><?= $item['nama_prodi'] ?></td>
                      <td class="text-center"><?= $item['semester'] ?></td>
                      <td class="text-center"><?= $item['thn_masuk'] ?></td>
                      <td class="text-center">
                        <?php if ($item['status'] == 'Aktif') : ?>
                          <span class="badge badge-success"><?= $item['status'] ?></span>
                        <?php else : ?>
                          <span class="badge badge-danger"><?= $item['status'] ?></span>
                        <?php endif ?>
                      </td>
                      <?php if ($this->session->userdata('level') == 'Administrator') : ?>
                        <td class="text-center">
                          <!-- <a href="<?= base_url('mahasiswa/detail/') . $item['nim'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                          <a href="<?= base_url('mahasiswa/edit/') . $item['nim'] ?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Edit</a>
                          <a href="<?= base_url('mahasiswa/hapus/') . $item['nim'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</a>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Tahun Masuk</th>
                    <th>Status</th>
                    <?php if ($this->session->userdata('level') == 'Administrator') : ?>
                      <th>Aksi</th>
                    <?php endif ?>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
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