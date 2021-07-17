
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
            <a href="<?= base_url('admin'); ?>" class="btn btn-default">Kembali</a>
            </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="<?= current_url(); ?>">
            <div class="box-body">
                <div class="form-group <?= isInvalid('nama') ?>">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama'); ?>">
                    </div>
                </div>
                <div class="form-group <?= isInvalid('email') ?>">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
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