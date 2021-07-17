
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
              <h3 class="box-title">
                <a href="<?= base_url('petugas/baru'); ?>" class="btn btn-primary">Tambah Data</a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telp</th>
                        <th>Alamat</th>
                        <th style="width: 150px;" class="notexport">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($items as $item): ?>
                    <?php if ($item['jabatan']=='Kepala') continue; ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['nip'] ?: '-'; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <td><?= $item['no_telp'] ?: '-'; ?></td>
                        <td><?= $item['alamat'] ?: '-'; ?></td>
                        <td>
                          <a href="<?= base_url("petugas/{$item['id_petugas']}"); ?>" class="btn btn-success btn-sm">Lihat</a>
                          <a href="<?= base_url("petugas/{$item['id_petugas']}/edit"); ?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="<?= base_url("petugas/{$item['id_petugas']}/hapus"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
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