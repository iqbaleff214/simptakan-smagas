
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php if(hasMessage()): ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
          <?= getMessage(); ?>
        </div>
        <?php endif; ?>

        <div class="box box-primary">
            <div class="box-header">
              <?php if(isJabatan('Petugas')): ?>
              <h3 class="box-title">
                <a href="<?= base_url('siswa/baru'); ?>" class="btn btn-primary">Tambah Data</a>
              </h3>
              <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <?php if(isJabatan('Petugas')): ?>
                        <th style="width: 150px;" class="notexport">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?= $item['nis']; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <td><?= $item['kelas']; ?></td>
                        <td><?= $item['alamat']; ?></td>
                        <td><?= $item['email']; ?></td>
                        <?php if(isJabatan('Petugas')): ?>
                        <td>
                          <a href="<?= base_url("siswa/{$item['nis']}"); ?>" class="btn btn-success btn-sm">Lihat</a>
                          <a href="<?= base_url("siswa/{$item['nis']}/edit"); ?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="<?= base_url("siswa/{$item['nis']}/hapus"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->