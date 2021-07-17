
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

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
            <a href="<?= base_url('klasifikasi'); ?>" class="btn btn-default">Kembali</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>">
            <div class="box-body">
                <div class="form-group <?= isInvalid('kode_klasifikasi') ?>">
                    <label for="kode_klasifikasi" class="col-sm-2 control-label">Kode Klasifikasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_klasifikasi" name="kode_klasifikasi" placeholder="Masukkan Kode" value="<?= set_value('kode_klasifikasi'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('klasifikasi') ?>">
                    <label for="klasifikasi" class="col-sm-2 control-label">Klasifikasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Masukkan Kategori" value="<?= set_value('klasifikasi'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('keterangan') ?>">
                    <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" value="<?= set_value('keterangan'); ?>">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-default pull-right">Ulangi</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->