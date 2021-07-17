
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
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Pengadaan Buku
                        <br>
                        <br>
                        <a href="<?= base_url('riwayat-pengadaan'); ?>" class="btn btn-primary">Riwayat</a>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal" value="<?= set_value('tanggal', date('Y-m-d')); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sumber" class="col-sm-2 control-label">Sumber</label>
                                <div class="col-sm-10">
                                    <?php $sumber = ['Sumbangan', 'Pembelian']; ?>
                                    <select class="form-control" name="sumber" id="sumber">
                                        <?php foreach($sumber as $item): ?>
                                            <option value="<?= $item; ?>"><?= $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-6">
                            <div class="form-group <?= isInvalid('pemasok') ?>">
                                <label for="pemasok" class="col-sm-2 control-label">Pemasok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pemasok" name="pemasok" placeholder="Masukkan pemasok" value="<?= set_value('pemasok'); ?>">
                                </div>
                            </div>
                            <div class="form-group <?= isInvalid('keterangan') ?>">
                                <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" value="<?= set_value('keterangan'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-default pull-right">Ulangi</button>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->


        <div class="box box-primary">
            <div class="box-header">
              <?php if(isJabatan('Petugas')): ?>
              <h3 class="box-title">
                <button type="button" class="btn btn-primary pengadaan-tr-button">Tambah Buku</button>
              </h3>
              <?php endif; ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>ISBN</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="pengadaan-tr">
                        <td>
                            <input type="text" class="form-control" name="judul[]" placeholder="Judul" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="isbn[]" placeholder="ISBN" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="pengarang[]" placeholder="Pengarang" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="tahun[]" placeholder="Tahun" value="2021">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah" value="0">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="harga[]" placeholder="Harga" value="0">
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </form>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->