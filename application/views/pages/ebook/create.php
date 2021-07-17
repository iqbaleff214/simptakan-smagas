
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
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group <?= isInvalid('judul') ?>">
                    <label for="judul" class="col-sm-2 control-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" value="<?= set_value('judul'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('isbn') ?>">
                    <label for="isbn" class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan Nomor ISBN" value="<?= set_value('isbn'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('pengarang') ?>">
                    <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang" value="<?= set_value('pengarang'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('tahun') ?>">
                    <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="number" min="1000" max="2030" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun terbit" value="<?= set_value('tahun', 2021); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('foto') ?>">
                    <label for="foto" class="col-sm-2 control-label">Berkas</label>
                    <div class="col-sm-10 row">
                      <div class="col-md-6 col-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto">
                          <label class="custom-file-label" for="foto" data-browse="Cari">Pilih Gambar (maks: 2048KB)</label>
                        </div>
                        <img src="<?= asset('img/book.png') ?>"
                          class="img-fluid mb-2 img-thumbnail img-preview"
                          alt="Gambar Berita" width="100%"/>
                      </div>
                      <div class="col-6 col-md-6 mt-3 mt-md-0">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input-pdf" id="berkas" name="berkas">
                          <label class="custom-file-label-pdf" for="berkas" data-browse="Cari">Pilih PDF (maks: 2048KB)</label>
                        </div>
                        <iframe src="" class="pdf-preview" width="100%" height="500"></iframe>
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
        </form>
    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->