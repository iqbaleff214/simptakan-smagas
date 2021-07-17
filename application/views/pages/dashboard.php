
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>awali dengan langkah kecil</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <?php if(hasMessage()): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
        <?= getMessage(); ?>
      </div>
      <?php endif; ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $count['pinjam']; ?></h3>

              <p>Peminjaman Hari ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <br>
            <span class="small-box-footer">&nbsp;</span>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $count['buku']; ?></h3>

              <p>Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <br>
            <span class="small-box-footer">&nbsp;</span>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $count['siswa']; ?></h3>

              <p>Anggota</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <br>
            <span class="small-box-footer">&nbsp;</span>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $count['kunjung']; ?></h3>

              <p>Pengunjung Hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <br>
            <span class="small-box-footer">&nbsp;</span>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-lg-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Diagram Popularitas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="populerChart" style="height:300px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-lg-6">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Buku Terpopuler</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <table id="table3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 20px;">No.</th>
                        <th>Buku</th>
                        <th>Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($populer as $item): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['judul']; ?></td>
                        <td><?= $item['total'] ?: '-'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->