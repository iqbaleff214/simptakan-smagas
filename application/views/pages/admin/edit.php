
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
            <a href="<?= base_url('buku'); ?>" class="btn btn-default">Kembali</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>">
            <div class="box-body">
                <div class="form-group <?= isInvalid('kode_buku') ?>">
                    <label for="kode_buku" class="col-sm-2 control-label">Kode Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukkan Rak" value="<?= set_value('kode_buku', $item['kode_buku']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rak" class="col-sm-2 control-label">Rak Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="rak" id="rak">
                            <?php foreach($data['rak'] as $dt): ?>
                              <option <?= selected($item['rak'], $dt['id_rak']); ?> value="<?= $dt['id_rak']; ?>"><?= $dt['rak']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_penerbit" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_penerbit" id="id_penerbit">
                            <?php foreach($data['penerbit'] as $dt): ?>
                              <option <?= selected($item['id_penerbit'], $dt['id_penerbit']); ?> value="<?= $dt['id_penerbit']; ?>"><?= $dt['penerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
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