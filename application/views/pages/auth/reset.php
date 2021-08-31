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
    <p class="login-box-msg">Silakan masukkan password baru.</p>

    <form action="<?= current_url_full(); ?>" method="post">
      <input type="hidden" name="id_akun" value="<?= $data['id_akun'] ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" disabled value="<?= $data['email'] ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" disabled value="<?= $data['username'] ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?= isInvalid('password'); ?>">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback <?= isInvalid('password_confirm'); ?>">
        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirm">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

