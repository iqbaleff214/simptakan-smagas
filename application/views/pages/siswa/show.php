
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
        <form class="form-horizontal">
        <!-- form start -->
        <div class="box-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group <?= isInvalid('tanggal') ?>">
                        <label for="tanggal" class="col-sm-2 control-label">Tanggal Registrasi</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Registrasi" value="<?= set_value('tanggal', $item['tanggal']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('nis') ?>">
                        <label for="nis" class="col-sm-2 control-label">NIS</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="<?= set_value('nis', $item['nis']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('nama') ?>">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama', $item['nama']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('jenis_kelamin') ?>">
                        <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Nama" value="<?= set_value('jenis_kelamin', $item['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('kelas') ?>">
                        <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" value="<?= set_value('kelas', $item['kelas']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('alamat') ?>">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat', $item['alamat']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('email') ?>">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input readonly type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email', $item['email']); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="<?= $item['foto'] ? upload($item['foto']) : asset('img/avatar.png'); ?>" alt="<?= $item['nama']; ?>" class="img-thumbnail">
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