  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script>
	
</script>
<!-- jQuery -->
<script src="<?= base_url('asset/jquery/jquery.min.js');?>"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/datatables/jquery.dataTables.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('asset/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('asset/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('asset/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('asset/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/dist/js/adminlte.min.js');?>"></script>
<script src="<?= base_url('asset/js/app.js') ?>"></script>
<script> 
	$(function () {
		// data
		
		var areaChartData = {
	      labels  : [
	      		<?php 
					foreach ($graph as $data) {
						echo "'". $data['date_created'] ."',";			
					}
				 ?>
	      ],
	      datasets: [
	        {
	          label               : 'New Comer',
	          backgroundColor     : 'rgba(60,141,188,0.9)',
	          borderColor         : 'rgba(60,141,188,0.8)',
	          pointRadius          : false,
	          pointColor          : '#3b8bba',
	          pointStrokeColor    : 'rgba(60,141,188,1)',
	          pointHighlightFill  : '#fff',
	          pointHighlightStroke: 'rgba(60,141,188,1)',
	          data                : [
	          		<?php 
						foreach ($graph as $data) {
							echo $data['new_comer'] .",";			
						}
					 ?>
	          ]
	        },
	        {
	          label               : 'Ex Japan',
	          backgroundColor     : 'rgba(210, 214, 222, 1)',
	          borderColor         : 'rgba(210, 214, 222, 1)',
	          pointRadius         : false,
	          pointColor          : 'rgba(210, 214, 222, 1)',
	          pointStrokeColor    : '#c1c7d1',
	          pointHighlightFill  : '#fff',
	          pointHighlightStroke: 'rgba(220,220,220,1)',
	          data                : [
	          		<?php 
						foreach ($graph as $data) {
							echo $data['ex_japan'] .",";			
						}
					 ?>	
	          ]
	        },
	      ]
	    }
		//-------------
	    //- BAR CHART -
	    //-------------
	    var barChartCanvas = $('#barChart').get(0).getContext('2d')
	    var barChartData = jQuery.extend(true, {}, areaChartData)
	    var temp0 = areaChartData.datasets[0]
	    var temp1 = areaChartData.datasets[1]
	    barChartData.datasets[0] = temp0
	    barChartData.datasets[1] = temp1

	    var barChartOptions = {
	      responsive              : true,
	      maintainAspectRatio     : false,
	      datasetFill             : false
	    }

	    var barChart = new Chart(barChartCanvas, {
	      type: 'bar', 
	      data: barChartData,
	      options: barChartOptions
	    })
	})
</script>
</body>
</html>
