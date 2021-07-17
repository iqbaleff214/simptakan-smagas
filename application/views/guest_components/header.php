
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= strtoupper($title); ?> | SIMPTAKAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= asset('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= asset('bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= asset('bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= asset('bower_components/select2/dist/css/select2.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset('dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= asset('dist/css/skins/_all-skins.min.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <!-- Logo -->
            <a href="<?= base_url('katalog'); ?>" class="navbar-brand">
            <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><i class="fa fa-fw fa-book"></i></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SIMP</b>TAKAN</span>
            </a>
        </div>

        <?php if(isJabatan('Anggota')): ?>
        <ul class="nav navbar-nav">
            <li class="<?= sidebar('buku', $sidebar); ?>"><a href="<?= base_url('katalog'); ?>">Buku</a></li>
            <li class="<?= sidebar('ebook', $sidebar); ?>"><a href="<?= base_url('katalog-ebook'); ?>">E-Book</a></li>
            <li class="<?= sidebar('peminjaman', $sidebar); ?>"><a href="<?= base_url('pinjam-buku'); ?>">Peminjaman</a></li>
            <li class="<?= sidebar('riwayat', $sidebar); ?>"><a href="<?= base_url('riwayat-pinjam-buku'); ?>">Riwayat Peminjaman</a></li>
            <li><a href="<?= site_url('cetak-kartu-anggota') ?>" target="_blank">Kartu Anggota</a></li>
        </ul>
        <?php endif; ?>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= $_SESSION['nama']; ?></span>
              </a>
                <ul class="dropdown-menu">
                <?php if($_SESSION['jabatan']=='Anggota'): ?>
                <!-- User image -->
                <li class="user-header">
                    <img src="<?= $_SESSION['foto'] ? upload($_SESSION['foto']) : asset('img/avatar.png') ?>" class="img-circle" alt="User Image">
                    <p>
                    <?= $_SESSION['nama']; ?>
                    <small><?= $_SESSION['jabatan']; ?></small>
                    </p>
                </li>
                <?php endif; ?>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                    <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                    </div>
                    <div class="pull-right">
                    <a href="<?= base_url('logout'); ?>" class="btn btn-default btn-flat" onclick="return confirm('Anda yakin ingin keluar?')">Logout</a>
                    </div>
                </li>
                </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  
