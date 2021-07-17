
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
            <a href="<?= base_url('siswa'); ?>" class="btn btn-default">Kembali</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group <?= isInvalid('nis') ?>">
                    <label for="nis" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="<?= set_value('nis'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('nama') ?>">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama'); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <?php foreach(['L' => 'Laki-laki', 'P' => 'Perempuan'] as $key => $val): ?>
                              <option value="<?= $key; ?>"><?= $val; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group <?= isInvalid('kelas') ?>">
                    <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" value="<?= set_value('kelas'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('alamat') ?>">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('email') ?>">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('username') ?>">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username (Jika kosong, username disamakan dengan NIS)" value="<?= set_value('username'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('password') ?>">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="" required>
                    </div>
                </div>
                <div class="form-group <?= isInvalid('password_again') ?>">
                    <label for="password_again" class="col-sm-2 control-label">Konfirmasi Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Masukkan Password Lagi" value="" required>
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
                        <img src="<?= asset('img/avatar.png') ?>"
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