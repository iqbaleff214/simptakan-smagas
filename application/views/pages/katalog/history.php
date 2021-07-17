

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
    <form action="<?php in_array('buku', $sidebar) ? site_url('katalog') : site_url('katalog-ebook') ?>" method="get">
      <section class="content-header">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" name="q" placeholder="Pencarian..." class="form-control" value="<?= isset($_GET['q']) ? $_GET['q'] : ''; ?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Cari</button>
                      </span>
                </div>
            </div>
        </div>
      </section>
    </form>
    
     
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col">
                    <?php if(hasMessage()): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
                        <?= getMessage(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">Nomor</th>
                                        <th>Judul Buku</th>
                                        <th>Dipinjam</th>
                                        <th>Tenggat</th>
                                        <th>Pengembalian</th>
                                        <th>Denda</th>
                                        <th>Status</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($items as $item): ?>
                                    <tr>
                                        <?php $pinjam = strtotime($item['tanggal_pinjam']) ; ?>
                                        <?php $tenggat = strtotime($item['tanggal_tenggat']) ; ?>
                                        <td><?= $item['no_peminjaman']; ?></td>
                                        <td><?= $item['judul'] ?: '-'; ?></td>
                                        <td><?= date('d/m/Y', $pinjam); ?></td>
                                        <td><?= date('d/m/Y', $tenggat); ?></td>
                                        <td><?= $item['tanggal_kembali'] ? date('d/m/Y', strtotime($item['tanggal_kembali'])) : '-'; ?></td>
                                        <td>Rp<?= time() > $tenggat ? number_format(floor((time()-$tenggat) / 60 / 60 / 24) * 500,2,",",".") : '0'; ?></td>
                                        <td><?= $item['tanggal_kembali'] ? 'Dikembalikan' : 'Dipinjam'; ?></td>
                                        <td>
                                            <a href="<?= base_url("bukti-pinjam-buku/{$item['id_peminjaman']}"); ?>" target="_blank" class="btn btn-primary btn-sm">Cetak</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->