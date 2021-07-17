
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2021 SIMPTAKAN.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= asset('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= asset('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= asset('bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?= asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= asset('bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- DataTables -->
<script src="<?= asset('bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= asset('dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= asset('dist/js/demo.js') ?>"></script>
<script>

  $(function() {
    var table1 = $('#table1').DataTable({
        responsive: true,
        buttons: [ 
          {
              extend: 'copy',
              exportOptions: {
                  columns: ':not(.notexport)'
              }
          },
          {
              extend: 'excel',
              text: 'Excel',
              exportOptions: {
                  columns: ':not(.notexport)'
              }
          },
          {
              extend: 'pdf',
              text: 'PDF',
              exportOptions: {
                  columns: ':not(.notexport)'
              },
              customize: function (doc) {
                  doc.content[1].table.widths = 
                      Array(doc.content[1].table.body[0].length + 1).join('*').split('');
              }
          },
          {
              extend: 'colvis',
              text: 'Kolom',
          },
        ]
      });
      table1.buttons().container().appendTo( '#table1_wrapper .col-sm-6:eq(0)' );
  });

</script>
</body>
</html>