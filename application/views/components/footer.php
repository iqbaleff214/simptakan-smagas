  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2021 SIMPTAKAN.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= asset('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= asset('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= asset('bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<!-- date-range-picker -->
<script src="<?= asset('bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?= asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?= asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
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
<!-- SlimScroll -->
<script src="<?= asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= asset('bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= asset('bower_components/chart.js/Chart.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= asset('dist/js/demo.js') ?>"></script>
<script>
  $(document).ready(function () {

    console.log(<?= isset($populer) ?>);


    $('.sidebar-menu').tree();

    $('.select2').select2()

		$('.custom-file-input').on('change', function () {
			previewImage();
		});

		$('.custom-file-input-pdf').on('change', function () {
      console.log('klik ganti');
			previewPdf();
		});

    if ($('.pengadaan-tr-button').length) {
      $('.pengadaan-tr-button').click(function() {
        $('#pengadaan-tr').clone().appendTo('table');
      });
    }

    if ($('#tenggatModal').length) {
      $('.btn-ubah-tenggat').click(function() {
        const no_peminjaman = $(this).data('id');
        const tenggat = $(this).data('tenggat').split(' ')[0];

        $('#modal-no-peminjaman').val(no_peminjaman);
        $('#modal-tenggat').val(tenggat);
      });
    }

    if ($('#table1').length) {
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
      // new $.fn.dataTable.FixedHeader( table1 );
    }

    if ($('#table2').length) {
      console.log('table 2');
      const table2 = $('#table2').DataTable({responsive: true})
      // new $.fn.dataTable.FixedHeader( table2 );
    }

    if ($('#table3').length) {
      console.log('table 3');
      const table3 = $('#table3').DataTable({
        'responsive': true,
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
      // new $.fn.dataTable.FixedHeader( table3 );
    }

    if ($('#reservation').length) {
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
      //fungsi untuk filtering data berdasarkan tanggal 
      var start_date;
      var end_date;
      var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
          var dateStart = parseDateValue(start_date);
          var dateEnd = parseDateValue(end_date);
          //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
          //nama depan = 0
          //nama belakang = 1
          //tanggal terdaftar =2
          var evalDate= parseDateValue(aData[3]);
            if ( ( isNaN( dateStart ) && isNaN( dateEnd ) ) ||
                ( isNaN( dateStart ) && evalDate <= dateEnd ) ||
                ( dateStart <= evalDate && isNaN( dateEnd ) ) ||
                ( dateStart <= evalDate && evalDate <= dateEnd ) )
            {
                return true;
            }
            return false;
      });

      // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
      function parseDateValue(rawDate) {
          var dateArray= rawDate.split("/");
          var parsedDate= new Date(dateArray[2], parseInt(dateArray[1])-1, dateArray[0]);  // -1 because months are from 0 to 11   
          return parsedDate;
      }  
  
      $('#reservation').on('apply.daterangepicker', function(ev, picker) {
         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
         start_date=picker.startDate.format('DD/MM/YYYY');
         end_date=picker.endDate.format('DD/MM/YYYY');
        //  alert(start_date + " sampai " + end_date);
         $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
        //  console.log(table1);
         table1.draw();
      });
      
    }

    <?php if(isset($populer)): ?>
    if ($('#populerChart').length) {
      const pieChartCanvas = $('#populerChart').get(0).getContext('2d')
      const pieChart       = new Chart(pieChartCanvas)
      const PieData        = [
        <?php foreach($populer as $item): ?>
        {
          value    : <?= $item['total'] ?>,
          color    : '#'+ Math.floor(Math.random()*16777215).toString(16),
          highlight: '#'+ Math.floor(Math.random()*16777215).toString(16),
          label    : '<?= $item['judul'] ?>'
        },
        <?php endforeach; ?>
      ]
      var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions)
    }
    <?php endif; ?>

  })

	function previewImage() {
		const cover = document.querySelector('.custom-file-input');
		const coverLabel = document.querySelector('.custom-file-label');
		const imgPreview = document.querySelector('.img-preview');
		coverLabel.textContent = cover.files[0].name;
		const coverFile = new FileReader();
		coverFile.readAsDataURL(cover.files[0]);
		coverFile.onload = function (e) {
			imgPreview.src = e.target.result;
		}
	}

	function previewPdf() {
		const cover = document.querySelector('.custom-file-input-pdf');
		const coverLabel = document.querySelector('.custom-file-label-pdf');
		const imgPreview = document.querySelector('.pdf-preview');
		coverLabel.textContent = cover.files[0].name;
		const coverFile = new FileReader();
		coverFile.readAsDataURL(cover.files[0]);
		coverFile.onload = function (e) {
			imgPreview.src = e.target.result;
		}
	}

</script>
</body>
</html>