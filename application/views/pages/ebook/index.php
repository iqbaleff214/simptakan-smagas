
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
                <a href="<?= base_url('ebook/baru'); ?>" class="btn btn-primary">Tambah Data</a>
              </h3>
              <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 20px;">No.</th>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <?php if(isJabatan('Petugas')): ?>
                        <th style="width: 150px;" class="notexport">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['judul']; ?></td>
                        <td><?= $item['isbn'] ?: '-'; ?></td>
                        <td><?= $item['pengarang'] ?: '-'; ?></td>
                        <td><?= $item['tahun'] ?: '-'; ?></td>
                        <?php if(isJabatan('Petugas')): ?>
                        <td>
                          <a href="<?= base_url("ebook/{$item['id_ebook']}"); ?>" class="btn btn-success btn-sm">Lihat</a>
                          <a href="<?= base_url("ebook/{$item['id_ebook']}/edit"); ?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="<?= base_url("ebook/{$item['id_ebook']}/hapus"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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