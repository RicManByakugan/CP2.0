<?php 
	include '../../controller/operateur/bilan.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../content/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../content/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../content/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../content/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../content/css/adminlte.min.css">
    <link rel="stylesheet" href="../../content/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../content/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../content/plugins/summernote/summernote-bs4.min.css">
    <style type="text/css">
		#preloader{position:fixed; top:0; left:0; right:0; bottom:0; background-color:#f4f6f9; z-index:99999}
		#status{width:200px; height:200px; position:absolute; left:50%; top:50%; background-image:url(../../data/fancybox_loading@2x.gif); background-repeat:no-repeat; background-position:center; margin:-100px 0 0 -100px}
	</style>
</head>
<body class="hold-transition sidebar-mini" style="background-color: #e6e6e6">
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<div class="container" style="background: #f4f6f9">
      <div class="row">
	      <div class="col-8 mx-auto">
	      	<div class="row">
		      <div class="col-4 text-center">
		      	<h3 class="text-success" onclick="SubmitSomething('Telma')" style="cursor: pointer;">TELMA</h3>
		      	<div id="sparkline-1" style="cursor: pointer;" onclick="SubmitSomething('Telma')"></div>
		      	<form method="POST" id="FormTelma">
		      		<input type="text" name="operateurName" value="NombreTelma" hidden>
		      		<input type="text" name="titre" hidden value="telma">
		        </form>
		      </div>
		      <div class="col-4 text-center">
		      	<h3 class="text-danger" onclick="SubmitSomething('Airtel')" style="cursor: pointer;">AIRTEL</h3>
		        <div id="sparkline-2" style="cursor: pointer;" onclick="SubmitSomething('Airtel')"></div>
		        <form method="POST" id="FormAirtel">
		      		<input type="text" name="operateurName" value="NombreAirtel" hidden>
		      		<input type="text" name="titre" hidden value="airtel">
		        </form>
		      </div>
		      <div class="col-4 text-center">
		      	<h3 class="text-warning" onclick="SubmitSomething('Orange')" style="cursor: pointer;">ORANGE</h3>
		        <div id="sparkline-3" style="cursor: pointer;" onclick="SubmitSomething('Orange')"></div>
		        <form method="POST" id="FormOrange">
		      		<input type="text" name="operateurName" value="NombreOrange" hidden>
		      		<input type="text" name="titre" hidden value="orange">
		        </form>
		      </div>
	    	</div>
	      </div>
      </div>
    </div>	
	<div class="mt-5 container">		
	    <div class="row">
    	  <div class="col-md-4">
	  		<div class="card <?= $card ?>">
	          <div class="card-header">
	            <h3 class="m-0 card-title"><img src="../../content/image/<?= $titre ?>.png" width="30" height="30" class="img-responsive mb-2 img-circle mr-2"> <?= strtoupper($titre) ?></h3>
	            <div class="card-tools">
                </div>
	          </div>
	          <div class="card-body">
	            <div class="chart">
	              <canvas id="areaOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
	            </div>
	          </div>
	        </div>
		  	<!-- <div class="small-box bg-danger">
		        <div class="inner">
	              	<div class="row">
	              		<div class="col-sm-6 text-left">
	                		<p class="mb-0 text-uppercase">Cette semaine : </p>
	              		</div>
	              		<div class="col-sm-6 text-right">
	                		<p class="mb-0"><?= number_format($semaine); ?> <i class="fa fa-users"></i></p>
	              		</div>
	              	</div>
	          	</div>
          	</div> -->
	      </div>

	      <div class="col-md-8">
	        <div class="card  <?= $card ?>">
	          <div class="card-header">
	            <h3 class="m-0 card-title"><img src="../../content/image/<?= $titre ?>.png" width="30" height="30" class="img-responsive mb-2 img-circle mr-2"> 7 derniers jour</h3>
	          </div>
	          <div class="card-body">
	            <div class="chart">
	              <canvas id="barOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- <div class="container row">
	    	<div class="col-md-4">
		        <div class="card card-success">
		          <div class="card-header">
		            <h3 class="m-0"><img src="../../content/image/telma.png" width="30" height="30" class="img-responsive mb-2 img-circle"> Telma</h3>
		          </div>
		          <div class="card-body">
		            <div class="chart">
		              <canvas id="telmaOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
		            </div>
		          </div>
		        </div>
		        <div class="card card-danger">
		          <div class="card-header">
		            <h3 class="m-0 card-title"><img src="../../content/image/airtel.png" width="30" height="30" class="img-responsive mb-2 mr-2 img-circle"> Airtel</h3>
		          </div>
		          <div class="card-body">
		            <div class="chart">
		              <canvas id="airtelOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
		            </div>
		          </div>
		        </div>
		        <div class="card card-warning">
		          <div class="card-header">
		            <h3 class="m-0 card-title"><img src="../../content/image/orange.png" width="30" height="30" class="img-responsive mb-2 mr-2 img-circle"> Orange</h3>
		          </div>
		          <div class="card-body">
		            <div class="chart">
		              <canvas id="orangeOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
		            </div>
		          </div>
	        </div>
	      	</div>
		    <div class="col-md-4">
		        <div class="card card-danger">
		          <div class="card-header">
		            <h3 class="m-0"><img src="../../content/image/airtel.png" width="30" height="30" class="img-responsive mb-2 img-circle"> Airtel</h3>
		          </div>
		          <div class="card-body">
		            <div class="chart">
		              <canvas id="airtelOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
		            </div>
		          </div>
		        </div>
		    </div>
		    <div class="col-md-4">
		        <div class="card card-warning">
		          <div class="card-header">
		            <h3 class="m-0"><img src="../../content/image/orange.png" width="30" height="30" class="img-responsive mb-2 img-circle"> Orange</h3>
		          </div>
		          <div class="card-body">
		            <div class="chart">
		              <canvas id="orangeOutput" style="min-height: 250px;height: 250px;max-height: 250px;max-width: 100%;"></canvas>
		            </div>
		          </div>
		        </div>
		    </div>
	    </div> -->
	</div>

	<div class="fixed-bottom w-100 mb-3">
		<div class="w-100">
			<div class="text-center">
				<small class="mb-0 text-secondary">Copyright 2022 | Version 2.0</small>
			</div>
		</div>
	</div>

	<script src="../../content/plugins/jquery/jquery.min.js"></script>
    <script src="../../content/plugins/chart.js/Chart.min.js"></script>
    <script src="../../content/plugins/sparklines/sparkline.js"></script>
    <script type="text/javascript">
 		function SubmitSomething(operateur) {
 			if (operateur == "Telma") {
 				$('#FormTelma').submit()
 			}else if(operateur == "Airtel"){
 				$('#FormAirtel').submit()
 			}else if(operateur == "Orange"){
 				$('#FormOrange').submit()
 			}
 		}

 		function DateChanging() {
			$('#DateSpec').submit()
 		}

    	function CreateAreaChart(dataChart, dataChartCount, output, colorOp) {
    		var areaChartData = {
	          labels: dataChart,
	          datasets: [
	            {
	              label: "Clients",
	              backgroundColor: colorOp,
	              data: dataChartCount,
	            },
	          ],
	        };

	        var areaChartOptions = {
	          maintainAspectRatio: true,
	          responsive: true,
	          legend: {
	            display: false,
	          },
	          scales: {
	            xAxes: [
	              {
	                gridLines: {
	                  display: false,
	                },
	              },
	            ],
	            yAxes: [
	              {
	                gridLines: {
	                  display: false,
	                },
	              },
	            ],
	          },
	        };

	        var areaChartCanvas = $(output).get(0).getContext("2d");
	        var areaChart = new Chart(areaChartCanvas, {
	          type: "line",
	          data: areaChartData,
	          options: areaChartOptions,
	        });
    	}

    	function CreateBarChart(dataTelmaDay, dataTelmaCount, output, colorOp) {
    		var areaChartData = {
	          labels: dataTelmaDay,
	          datasets: [
	            {
	              data: dataTelmaCount,
	              label: "Clients",
	              backgroundColor: colorOp,
	              borderColor: "rgba(60,141,188,0.8)",
	              pointRadius: false,
	              pointColor: "#3b8bba",
	              pointStrokeColor: "rgba(60,141,188,1)",
	              pointHighlightFill: "#fff",
	              pointHighlightStroke: "rgba(60,141,188,1)",
	            },
	          ],
	        };

	        var barChartData = $.extend(true, {}, areaChartData);

	        var stackedBarChartCanvas = $(output)
	          .get(0)
	          .getContext("2d");
	        var stackedBarChartData = $.extend(true, {}, barChartData);

	        var stackedBarChartOptions = {
	          responsive: true,
	          legend: {
	            display: false,
	          },
	          maintainAspectRatio: false,
	          scales: {
	            xAxes: [
	              {
	                stacked: true,
	              },
	            ],
	            yAxes: [
	              {
	                stacked: true,
	              },
	            ],
	          },
	        };

	        var stackedBarChart = new Chart(stackedBarChartCanvas, {
	          type: "bar",
	          data: stackedBarChartData,
	          options: stackedBarChartOptions,
	        });
    	}

    	function SparkLine() {
    		var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#28a745', endColor: '#28a745' })
		    var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#dc3545', endColor: '#dc3545' })
		    var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#ffc107', endColor: '#ffc107' })

		    sparkline1.draw(transactionJourCountAreaTelma)
		    sparkline2.draw(transactionJourCountAreaAirtel)
		    sparkline3.draw(transactionJourCountAreaOrange)
    	}SparkLine()


    	CreateAreaChart(transactionJourArea, transactionJourCountArea,'#areaOutput', couleurOperateur)
	    CreateBarChart(transactionJour, transactionJourCount, '#barOutput', couleurOperateur)
    </script>
    <script src="../../content/js/loader/jquery.min.js"></script> 
  	<script src="../../content/js/loader/wow.min.js"></script> 
  	<script src="../../content/js/loader/loading.js"></script>
</body>
</html>