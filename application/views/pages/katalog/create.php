

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
    
     
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>">
            <!-- Main content -->
            <section class="content">
            <?php if(hasMessage()): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
                <?= getMessage(); ?>
            </div>
            <?php endif; ?>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Peminjam</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nis" class="col-sm-2 control-label">NIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $_SESSION['nis']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" value="<?= $_SESSION['nama']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pinjam" class="col-sm-2 control-label">Pinjam</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal_pinjam" value="<?= set_value('tanggal_pinjam', date('Y-m-d')); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group <?= isInvalid('tanggal_tenggat') ?>">
                                    <label for="tanggal_tenggat" class="col-sm-2 control-label">Tenggat</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal_tenggat" name="tanggal_tenggat" placeholder="Masukkan tenggat" value="<?= set_value('tanggal_tenggat', date('Y-m-d', time()+(60*60*24*3))); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group <?= isInvalid('keterangan') ?>">
                                    <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" value="<?= set_value('keterangan'); ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Pinjam</button>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <div class="col-lg-6">
                                
                        <!-- Default box -->
                        <div class="box">
                            <div class="box-header with-border">
                            <h3 class="box-title">Buku</h3>
                            </div>
                            <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="id_buku[]">
                                        <option value="-">-- Belum dipilih --</option>
                                        <?php foreach($buku as $item): ?>
                                            <option value="<?= $item['id_buku']; ?>"><?= $item['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="id_buku[]">
                                        <option value="-">-- Belum dipilih --</option>
                                        <?php foreach($buku as $item): ?>
                                            <option value="<?= $item['id_buku']; ?>"><?= $item['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="id_buku[]">
                                        <option value="-">-- Belum dipilih --</option>
                                        <?php foreach($buku as $item): ?>
                                            <option value="<?= $item['id_buku']; ?>"><?= $item['judul']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </form>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->