
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
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>" enctype="multipart/form-data">
            <div class="box-body">
            <div class="form-group <?= isInvalid('judul') ?>">
                    <label for="judul" class="col-sm-2 control-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" value="<?= set_value('judul', $item['judul']); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('isbn') ?>">
                    <label for="isbn" class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan Nomor ISBN" value="<?= set_value('isbn', $item['isbn']); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('pengarang') ?>">
                    <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan Pengarang" value="<?= set_value('pengarang', $item['pengarang']); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('tahun') ?>">
                    <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                    <div class="col-sm-10">
                        <input type="number" min="1000" max="2030" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun terbit" value="<?= set_value('tahun', $item['tahun']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_penerbit" class="col-sm-2 control-label">Penerbit</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="id_penerbit" id="id_penerbit">
                            <?php foreach($data['penerbit'] as $dt): ?>
                              <option <?= selected($item['id_penerbit'], $dt['id_penerbit']); ?> value="<?= $dt['id_penerbit']; ?>"><?= $dt['penerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_rak" class="col-sm-2 control-label">Rak Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="id_rak" id="id_rak">
                            <?php foreach($data['rak'] as $dt): ?>
                              <option <?= selected($item['id_rak'], $dt['id_rak']); ?> value="<?= $dt['id_rak']; ?>"><?= $dt['rak']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_kategori" class="col-sm-2 control-label">Kategori Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="id_kategori" id="id_kategori">
                            <?php foreach($data['kategori'] as $dt): ?>
                              <option <?= selected($item['id_kategori'], $dt['id_kategori']); ?> value="<?= $dt['id_kategori']; ?>"><?= $dt['kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kode_klasifikasi" class="col-sm-2 control-label">Klasifikasi Buku</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="kode_klasifikasi" id="kode_klasifikasi">
                            <?php foreach($data['klasifikasi'] as $dt): ?>
                              <option <?= selected($item['kode_klasifikasi'], $dt['kode_klasifikasi']); ?> value="<?= $dt['kode_klasifikasi']; ?>"><?= $dt['klasifikasi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group <?= isInvalid('jumlah') ?>">
                    <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" min="1" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" value="<?= set_value('jumlah', $item['jumlah']); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('foto') ?>">
                    <label for="foto" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10 row">
                      <div class="col-md-6 col-6">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto">
                          <label class="custom-file-label" for="foto" data-browse="Cari">Pilih Gambar (maks: 2048KB)</label>
                        </div>
                      </div>
                      <div class="col-6 col-md-6 mt-3 mt-md-0">
                        <img src="<?= $item['foto'] ? upload($item['foto']) : asset('img/book.png'); ?>"
                          class="img-fluid mb-2 img-thumbnail img-preview"
                          alt="Gambar Berita" width="100%"/>
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