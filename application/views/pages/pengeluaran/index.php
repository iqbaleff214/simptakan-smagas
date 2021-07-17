
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

      <form class="form-horizontal" method="POST" action="<?= current_url(); ?>">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Buku Keluar
                        <br>
                        <br>
                        <a href="<?= base_url('riwayat-pengeluaran'); ?>" class="btn btn-primary">Riwayat</a>
                    </h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                      <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-10">
                          <input type="date" class="form-control" id="tanggal" value="<?= set_value('tanggal', date('Y-m-d')); ?>" disabled>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="id_buku" class="col-sm-2 control-label">Buku</label>
                      <div class="col-sm-10">
                          <select class="form-control select2" name="id_buku" id="id_buku">
                              <?php foreach($buku as $item): ?>
                                <option value="<?= $item['id_buku']; ?>"><?= $item['judul']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                  </div>
                  <div class="form-group <?= isInvalid('jumlah') ?>">
                      <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                      <div class="col-sm-10">
                          <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" value="<?= set_value('jumlah', 1); ?>">
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
                    <button type="submit" class="btn btn-primary">Keluarkan</button>
                    <button type="reset" class="btn btn-default pull-right">Ulangi</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->