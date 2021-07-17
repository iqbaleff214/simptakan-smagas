<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>SIMP</b>TAKAN</a>
  </div>

  <?php if(hasMessage()): ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Peringatan!</h4>
          <?= getMessage(); ?>
        </div>
  <?php endif; ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silakan isi buku kunjungan untuk melanjutkan</p>

    <form action="<?= current_url(); ?>" method="post">
      <div class="form-group has-feedback <?= isInvalid('nis'); ?>">
        <input type="text" class="form-control" placeholder="NIS" name="nis" value="<?= set_value('nis'); ?>">
        <span class="glyphicon glyphicon-key form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?= isInvalid('nama'); ?>">
        <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= set_value('nama'); ?>">
        <span class="glyphicon glyphicon-key form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?= isInvalid('kelas'); ?>">
        <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="<?= set_value('kelas'); ?>">
        <span class="glyphicon glyphicon-key form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?= isInvalid('keperluan'); ?>">
        <input type="text" class="form-control" placeholder="Keperluan" name="keperluan" value="<?= set_value('keperluan'); ?>">
        <span class="glyphicon glyphicon-key form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?= base_url('login'); ?>" class="text-center">Masuk sebagai Anggota</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

