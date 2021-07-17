
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
            <a href="<?= base_url('penerbit'); ?>" class="btn btn-default">Kembali</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>">
            <div class="box-body">
                <div class="form-group <?= isInvalid('penerbit') ?>">
                    <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit" value="<?= set_value('penerbit'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('no_telp') ?>">
                    <label for="no_telp" class="col-sm-2 control-label">No. Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" value="<?= set_value('no_telp'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('alamat') ?>">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat'); ?>">
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