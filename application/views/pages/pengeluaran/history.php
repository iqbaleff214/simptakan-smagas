
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
                    <?php if(isJabatan('Petugas')): ?>
                    <a href="<?= base_url('pengeluaran'); ?>" class="btn btn-default">Kembali</a>
                    <?php endif; ?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 20px;">No.</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Jumlah Keluar</th>
                        <th>Jumlah Sisa</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d/m/Y', strtotime($item['tanggal'])); ?></td>
                        <td><?= $item['judul'] ?: '-'; ?></td>
                        <td><?= $item['jumlah'] ?: '-'; ?></td>
                        <td><?= $item['sisa'] ?: '-'; ?></td>
                        <td><?= $item['keterangan'] ?: '-'; ?></td>
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