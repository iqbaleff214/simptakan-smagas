
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
            <a href="<?= base_url('ebook'); ?>" class="btn btn-default">Kembali</a>
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
                        <div class="form-group <?= isInvalid('foto') ?>">
                            <label for="foto" class="col-sm-2 control-label">Cover</label>
                            <div class="col-sm-10">
                                <img src="<?= $item['foto'] ? upload($item['foto']) : asset('img/book.png'); ?>"
                                    class="img-fluid mb-2 img-thumbnail img-preview"
                                    id="foto"
                                    alt="Gambar Berita" width="100%"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <iframe src="<?= upload($item['berkas']) ?>" width="100%" height="800"></iframe>
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