
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
            <a href="<?= base_url('petugas'); ?>" class="btn btn-default">Kembali</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <form class="form-horizontal">
        <!-- form start -->
        <div class="box-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group <?= isInvalid('nip') ?>">
                        <label for="nip" class="col-sm-2 control-label">NIP</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip', $item['nip']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('nama') ?>">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama', $item['nama']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('jabatan') ?>">
                        <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" value="<?= set_value('jabatan', $item['jabatan']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('jenis_kelamin') ?>">
                        <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Nama" value="<?= set_value('jenis_kelamin', $item['jenis_kelamin']=='L' ? 'Laki-laki' : 'Perempuan'); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('no_telp') ?>">
                        <label for="no_telp" class="col-sm-2 control-label">No. Telp</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="no_telp" name="no_telp" placeholder="-" value="<?= set_value('no_telp', $item['no_telp']); ?>">
                        </div>
                    </div>
                    <div class="form-group <?= isInvalid('alamat') ?>">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <input readonly type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?= set_value('alamat', $item['alamat']); ?>">
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