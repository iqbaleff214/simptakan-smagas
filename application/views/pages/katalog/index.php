

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
    <form action="<?php in_array('buku', $sidebar) ? site_url('katalog') : site_url('katalog-ebook') ?>" method="get">
      <section class="content-header">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="input-group">
                  <input type="text" name="q" placeholder="Pencarian..." class="form-control" value="<?= isset($_GET['q']) ? $_GET['q'] : ''; ?>">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Cari</button>
                      </span>
                </div>
            </div>
        </div>
      </section>
    </form>
    
      <!-- Main content -->
      <section class="content">
        <div class="row">
            <?php foreach($items as $item): ?>
            <?php $link = in_array('buku', $sidebar) ? site_url('katalog/'.$item['id_buku']) : site_url('katalog-ebook/'.$item['id_ebook']) ?>
            <div class="col-lg-3">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url('<?= $item['foto'] ? upload($item['foto']) : asset('img/book.png') ?>') center center; height: 250px;">
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="<?= $link ?>"><?= $item['isbn'] ? isbn($item['isbn']) : '-'; ?> <span class="pull-right badge bg-red">ISBN</span></a></li>
                            <li><a href="<?= $link ?>"><?= $item['judul']; ?> <span class="pull-right badge bg-blue">Judul</span></a></li>
                            <li><a href="<?= $link ?>">Oleh: <?= $item['pengarang'] ?: '-'; ?></a></li>
                            <li><a href="<?= $link ?>"><?= $item['tahun'] ?: '-'; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->