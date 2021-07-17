
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="" alt="<?= $_SESSION['nama']; ?>" class="img-circle" alt="User Image"> -->
          <div class="img-circle" style="width: 35px; height: 35px; background-repeat: no-repeat;background-size: 35px; background-position: center; background-image: url('<?= $_SESSION['foto'] ? upload($_SESSION['foto']) : asset('img/avatar.png') ?>') ;"></div>
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?= $_SESSION['jabatan']; ?></a>
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->
        
        <li class="<?= sidebar('dashboard', $sidebar); ?>">
          <a href="<?= base_url('dashboard'); ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if(isJabatan('Petugas')): ?>
        <?php $masterMenu = [ 'peminjaman' => 'fa-exchange','pengadaan' => 'fa-forward', 'pengeluaran' => 'fa-backward', ]; ?>
        <?php foreach($masterMenu as $link => $icon): ?>
        <li class="<?= sidebar($link, $sidebar); ?>"><a href="<?= base_url($link); ?>"><i class="fa <?= $icon; ?>"></i> <span><?= ucfirst($link); ?></span></a></li>
        <?php endforeach; ?>
        <?php endif; ?>

        <li class="header">DATA MASTER</li>
        <?php if(isJabatan('Petugas')): ?>
        <?php $masterMenu = [ 'rak' => 'fa-stack-exchange', 'kategori' => 'fa-tag', 'penerbit' => 'fa-building-o', 'klasifikasi' => 'fa-object-group' ]; ?>
        <li class="treeview <?= sidebar('karakteristik', $sidebar); ?>">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Karakteristik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach($masterMenu as $link => $icon): ?>
              <li class="<?= sidebar($link, $sidebar); ?>"><a href="<?= base_url($link); ?>"><i class="fa <?= $icon; ?>"></i> <span><?= ucfirst($link); ?></span></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
        <?php endif; ?>


        <?php $masterMenu = [ 'buku' => 'fa-book', 'ebook' => 'fa-bookmark-o', 'siswa' => 'fa-user', ]; ?>
        <?php if(isJabatan('Kepala')) $masterMenu['petugas'] = 'fa-user-secret'; ?>
        <?php if(isJabatan('Petugas')) $masterMenu['akun'] = 'fa-users'; ?>
        <?php foreach($masterMenu as $link => $icon): ?>
        <li class="<?= sidebar($link, $sidebar); ?>"><a href="<?= base_url($link); ?>"><i class="fa <?= $icon; ?>"></i> <span><?= ucfirst($link); ?></span></a></li>
        <?php endforeach; ?>

        <?php if(isJabatan('Kepala')): ?>
        <li class="header">LAPORAN</li>
        <?php $masterMenu = [ 'peminjaman' => 'fa-exchange','pengadaan' => 'fa-forward', 'pengeluaran' => 'fa-backward', 'pengunjung' => 'fa-male']; ?>
        <?php foreach($masterMenu as $link => $icon): ?>
        <li class="<?= sidebar($link, $sidebar); ?>"><a href="<?= base_url('laporan-'.$link); ?>"><i class="fa <?= $icon; ?>"></i> <span><?= ucfirst($link); ?></span></a></li>
        <?php endforeach; ?>

        <?php endif; ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
