
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= asset('dist/img/avatar5.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?= $_SESSION['email']; ?></a>
        </div>
      </div>
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
          <a href="<?= base_url(); ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">DATA MASTER</li>
        <?php $masterMenu = [ 'rak' => 'fa-stack-exchange', 'kategori' => 'fa-tag', 'penerbit' => 'fa-building-o', ]; ?>
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


        <?php $masterMenu = [ 'siswa' => 'fa-user', 'buku' => 'fa-book', 'admin' => 'fa-user-secret', ]; ?>
        <?php foreach($masterMenu as $link => $icon): ?>
        <li class="<?= sidebar($link, $sidebar); ?>"><a href="<?= base_url($link); ?>"><i class="fa <?= $icon; ?>"></i> <span><?= ucfirst($link); ?></span></a></li>
        <?php endforeach; ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
