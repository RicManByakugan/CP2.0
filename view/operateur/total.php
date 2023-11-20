<?php 
	include '../../controller/operateur/total.php';
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
    <link rel="stylesheet" href="../../content/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="../../content/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  	<link rel="stylesheet" href="../../content/plugins/toastr/toastr.min.css">
    <style type="text/css">
        #preloader{position:fixed; top:0; left:0; right:0; bottom:0; background-color:#f4f6f9; z-index:99999}
        #status{width:200px; height:200px; position:absolute; left:50%; top:50%; background-image:url(../../data/fancybox_loading@2x.gif); background-repeat:no-repeat; background-position:center; margin:-100px 0 0 -100px}
    </style>
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color: #e6e6e6">
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <div style="background: #f4f6f9">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="m-0">Total</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item "><?= date("d/m/Y") ?></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
            <div class="float-left mr-1">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="m-0 card-title">Généralité</h3>
                    </div>
                    <div class="card-body">
                        <div class="small-box bg-success">
                          <div class="inner">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 text-uppercase">MV : </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="mb-0"><?= number_format($soldeTelma) ?>Ar</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 text-uppercase">AM : </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="mb-0"><?= number_format($soldeAirtel) ?>Ar</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 text-uppercase">OM : </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="mb-0"><?= number_format($soldeOrange) ?>Ar</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="small-box bg-secondary">
                          <div class="inner">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 text-uppercase">ESPECE 1 : </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="mb-0"><?= number_format($dataEspece1) ?>Ar</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="small-box bg-secondary">
                          <div class="inner">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 text-uppercase">ESPECE 2 : </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="mb-0"><?= number_format($dataEspece2) ?>Ar</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="small-box bg-primary">
                          <div class="inner">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <p class="mb-0 text-uppercase">TOTAL : </p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p class="mb-0"><?= number_format($dataEspece1 + $dataEspece2) ?>Ar</p>
                                </div>
                            </div>
                          </div>
                        </div>
                        <input type="number" class="form-control" placeholder="TAO" min="0" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="m-0 card-title">Appel</h3>
                    </div>
                    <div class="card-body">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[0]["nombre"]) ?>Ar</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[1]["nombre"]) ?>Ar</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[2]["nombre"]) ?>Ar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="m-0 card-title">Crédit</h3>
                    </div>
                    <div class="card-body">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[9]["nombre"]) ?>Ar</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-danger" >
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[10]["nombre"]) ?>Ar</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[11]["nombre"]) ?>Ar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="m-0 card-title">Cartes (<?= number_format($dataAccp[6]["nombre"] + $dataAccp[7]["nombre"] +$dataAccp[8]["nombre"]) ?>)</h3>
                    </div>
                    <div class="card-body">
                        <div class="small-box bg-success" >
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[6]["nombre"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-danger" >
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[7]["nombre"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-warning" >
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[8]["nombre"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="m-0 card-title">Puces (<?= number_format($dataAccp[3]["nombre"] + $dataAccp[4]["nombre"] +$dataAccp[5]["nombre"]) ?>)</h3>
                    </div>
                    <div class="card-body">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/telma.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Telma : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[3]["nombre"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/airtel.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Airtel : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[4]["nombre"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <p class="mb-0 text-uppercase"><img src="../../content/image/orange.png" width="15" height="15" class="img-responsive mb-1 img-circle"> Orange : </p>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <p class="mb-0"><?= number_format($dataAccp[5]["nombre"]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="fixed-bottom w-100 mb-3">
        <div class="w-100">
            <div class="text-center">
                <small class="mb-0 text-secondary">Copyright 2022 | Version 2.0</small>
            </div>
        </div>
    </div>


    <script src="../../content/plugins/jquery/jquery.min.js"></script>
    <script src="../../content/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="../../content/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../content/plugins/chart.js/Chart.min.js"></script>
    <script src="../../content/plugins/sparklines/sparkline.js"></script>
    <script src="../../content/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../content/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="../../content/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../content/plugins/moment/moment.min.js"></script>
    <script src="../../content/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../../content/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../../content/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../../content/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../../content/js/adminlte.js"></script>
    <script src="../../content/js/demo.js"></script>
    <script src="../../content/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../../content/plugins/toastr/toastr.min.js"></script>
    <script src="../../content/js/pages/dashboard.js"></script>
    <script type="text/javascript">
    function ShowMessage(type, message) {
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
        Toast.fire({
            icon: type,
            title: message
        })
    }
    </script>

    <script src="../../content/js/loader/jquery.min.js"></script> 
    <script src="../../content/js/loader/wow.min.js"></script> 
    <script src="../../content/js/loader/loading.js"></script>
</body>
</html>