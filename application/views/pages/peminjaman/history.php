
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
                    <a href="<?= base_url('peminjaman'); ?>" class="btn btn-default">Kembali</a>
                  <?php else: ?>
                    <a href="<?= base_url('laporan-peminjaman-hari-ini'); ?>" class="btn btn-primary">Hari ini</a>
                    <a href="<?= base_url('laporan-peminjaman'); ?>" class="btn btn-success">Semua</a>
                  <?php endif; ?>
                  <div class="form-group">
                    <br>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation">
                    </div>
                    <!-- /.input group -->
                  </div>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 20px;">Nomor</th>
                        <th>Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Dipinjam</th>
                        <th>Tenggat</th>
                        <th>Pengembalian</th>
                        <th>Denda</th>
                        <th>Status</th>
                        <?php if(isJabatan('Petugas')): ?>
                        <th>Bukti</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <?php $pinjam = strtotime($item['tanggal_pinjam']) ; ?>
                        <?php $tenggat = strtotime($item['tanggal_tenggat']) ; ?>
                        <td><?= $item['no_peminjaman']; ?></td>
                        <td><?= $item['nama'] ?: '-'; ?></td>
                        <td><?= $item['judul'] ?: '-'; ?></td>
                        <td><?= date('d/m/Y', $pinjam); ?></td>
                        <td><?= date('d/m/Y', $tenggat); ?></td>
                        <td><?= $item['tanggal_kembali'] ? date('d/m/Y', strtotime($item['tanggal_kembali'])) : '-'; ?></td>
                        <td>Rp<?= time() > $tenggat ? number_format(floor((time()-$tenggat) / 60 / 60 / 24) * 500,2,",",".") : '0'; ?></td>
                        <td><?= $item['tanggal_kembali'] ? 'Dikembalikan' : 'Dipinjam'; ?></td>
                        <?php if(isJabatan('Petugas')): ?>
                        <td>
                            <a href="<?= base_url("bukti-pinjam-buku/{$item['id_peminjaman']}"); ?>" target="_blank" class="btn btn-primary btn-sm">Cetak</a>
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