
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
        <form class="form-horizontal">
            <div class="box-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group <?= isInvalid('tanggal') ?>">
                            <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Judul" value="<?= set_value('tanggal', $item['tanggal'] ?: '-'); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('judul') ?>">
                            <label for="judul" class="col-sm-2 control-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" value="<?= set_value('judul', $item['judul']); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('isbn') ?>">
                            <label for="isbn" class="col-sm-2 control-label">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="isbn" name="isbn" placeholder="-" value="<?= set_value('isbn', $item['isbn']); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('pengarang') ?>">
                            <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="pengarang" name="pengarang" placeholder="-" value="<?= set_value('pengarang', $item['pengarang'] ?: '-'); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('tahun') ?>">
                            <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" disabled min="1000" max="2030" class="form-control" id="tahun" name="tahun" placeholder="-" value="<?= set_value('tahun', $item['tahun']); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('penerbit') ?>">
                            <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Tahun terbit" value="<?= set_value('penerbit', $item['penerbit'] ?: '-'); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('rak') ?>">
                            <label for="rak" class="col-sm-2 control-label">Rak Buku</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="rak" name="rak" placeholder="Masukkan Tahun terbit" value="<?= set_value('rak', $item['rak'] ?: '-'); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('kategori') ?>">
                            <label for="kategori" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="kategori" name="kategori" placeholder="Masukkan Tahun terbit" value="<?= set_value('kategori', $item['kategori'] ?: '-'); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('klasifikasi') ?>">
                            <label for="klasifikasi" class="col-sm-2 control-label">Klasifikasi</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="klasifikasi" name="klasifikasi" placeholder="Masukkan Tahun terbit" value="<?= set_value('klasifikasi', $item['klasifikasi'] ?: '-'); ?>">
                            </div>
                        </div>
                        <div class="form-group <?= isInvalid('jumlah') ?>">
                            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-10">
                                <input type="number" disabled class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" value="<?= set_value('jumlah', $item['jumlah']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="<?= $item['foto'] ? upload($item['foto']) : asset('img/book.png'); ?>"
                          class="img-fluid mb-2 img-thumbnail img-preview"
                          alt="Gambar Berita" width="100%"/>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->