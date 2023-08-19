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
          <div class="card bg-gradient-primary">
            <div class="card-header bg-gradient-primary">
              <a href="<?= base_url('kaprodi/tambah') ?>" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambah Kaprodi</a>
              <!-- <h3 class="card-title">Daftar Kaprodi</h3> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body bg-gradient-info">
              <table id="datatable" class="table table-bordered table-striped">
                <thead class="text-center bg-gradient-primary">
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIDN</th>
                    <th>Prodi</th>
                    <th>E-Mail</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class=" bg-gradient-info">
                  <?php
                  $i = 1;
                  foreach ($kaprodi as $item) :
                  ?>
                    <tr>
                      <th class="text-center"><?= $i++ ?></th>
                      <td><?= $item['nama_kaprodi'] ?></td>
                      <td class="text-center"><?= $item['nidn'] ?></td>
                      <td><?= $item['nama_prodi'] ?></td>
                      <td><?= $item['email'] ?></td>
                      <td class="text-center"><?= $item['no_telp'] ?></td>
                      <td class="text-center">
                        <!-- <a href="<?= base_url('kaprodi/detail/') . $item['nidn'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                        <a href="<?= base_url('kaprodi/edit/') . $item['nidn'] ?>" class="btn btn-success"><i class="fas fa-edit mr-2"></i>Edit</a>
                        <a href="<?= base_url('kaprodi/hapus/') . $item['nidn'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot class="text-center bg-gradient-primary">
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>NIDN</th>
                    <th>Prodi</th>
                    <th>E-Mail</th>
                    <th>No. Telepon</th>
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