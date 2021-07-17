
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

        <?php if(hasMessage()): ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Pemberitahuan!</h4>
          <?= getMessage(); ?>
        </div>
        <?php endif; ?>

        <div class="box box-primary">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 20px;">No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Username</th>
                        <th style="width: 100px;" class="notexport">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['nis']; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['kelas']; ?></td>
                        <td><?= $item['username']; ?></td>
                        <td>
                          <?php if($item['status']==2): ?>
                          <a href="<?= base_url("akun/{$item['id_akun']}/reset"); ?>" class="btn btn-info btn-sm" onclick="return confirm('Yakin ingin mereset? Password akan menjadi: simptakan')">Reset Password</a>
                          <?php else: ?>
                          <button class="btn-sm btn-info btn" disabled>Reset Password</button>
                          <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->