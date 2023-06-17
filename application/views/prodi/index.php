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
              <a href="<?= base_url('prodi/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah Prodi</a>
              <!-- <h3 class="card-title">Daftar Prodi</h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatable" class="table table-bordered table-striped">
                <thead class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama Program Studi</th>
                    <th>Gelar Kelulusan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($prodi as $item) :
                  ?>
                    <tr>
                      <th class="text-center"><?= $i++ ?></th>
                      <td><?= $item['nama_prodi'] ?></td>
                      <th class="text-center"><?= $item['gelar_kelulusan'] ?></th>
                      <td class="text-center">
                        <!-- <a href="<?= base_url('prodi/detail/') . $item['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                        <a href="<?= base_url('prodi/edit/') . $item['id'] ?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Edit</a>
                        <a href="<?= base_url('prodi/hapus/') . $item['id'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama Program Studi</th>
                    <th>Status</th>
                    <th>Aksi</th>
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