<?php 
include_once '../config/constants.php';
  session_start(); 
  if (!isset($_SESSION['user_type'])) {
    header('Location: ' . BASE_URL );
  }else {
    $user = $_SESSION['user_type'];

    if ($user == 'Owner') {
      header('Location: ' . BASE_URL . '/owner');
    }elseif($user == 'Admin') {
      header('Location: ' . BASE_URL . '/admin');
    }
  }
  ?>
<?php

include_once '../config/db.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AGRIPRENEUR</title>
        <!-- PACE-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/PACE/themes/blue/pace-theme-flash.css">
        <script type="text/javascript" src="<?= BASE_URL ?>assets/PACE/pace.min.js"></script>
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/themify-icons/themify-icons.css">
        <!-- Malihu Scrollbar-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
        <!-- Animo.js-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/animo.js/animate-animo.min.css">
        <!-- Bootstrap Progressbar-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
        <!-- Toastr-->
        <!-- <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/toastr/toastr.min.css"> -->
        <!-- SpinKit-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/SpinKit/css/spinners/7-three-bounce.css">
        <!-- Jvector Map-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- Morris Chart-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/morris.js/morris.css">
        <!-- DataTables-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
        <!-- Weather Icons-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/weather-icons/css/weather-icons-wind.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/weather-icons/css/weather-icons.min.css">
        <!-- FullCalendar-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/fullcalendar/dist/fullcalendar.print.css" media="print">
        <!-- jQuery MiniColors-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/jquery-minicolors/jquery.minicolors.css">
        <!-- Bootstrap Date Range Picker-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bootstrap-daterangepicker/daterangepicker.css">
        <!-- Primary Style-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>build/css/second-layout.css">
        <!-- DataTables-->
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
        <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body data-sidebar-color="sidebar-light" class="sidebar-light">
        <!-- Header start-->
        <header>
            <div class="search-bar closed">
            </div>
            <a href="index.php" class="brand pull-left">
                <h2 style="margin-left: 25px;">AGRIPRENEUR</h2>
            </a>
            <a href="javascript:;" role="button" class="hamburger-menu pull-left visible-xs">
                <span></span>
            </a>
            <ul class="notification-bar list-inline pull-right">
                <li class="dropdown">
                    <a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon">
                        <b>
                            <?= strtoupper($_SESSION['fullname']) ?>
                        </b>
                    </a>
                    <div aria-labelledby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
                        <h5 class="dropdown-header">Prodile Setting</h5>
                        <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
                            <li class="media">
                                <a href="edit-profile.php?id=<?= $_SESSION['id'] ?>">
                                    <div class="media-left avatar">
                                        <i class="glyphicon glyphicon-cog"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Edit Profile</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="change-pass.php">
                                    <div class="media-left avatar">
                                        <i class="glyphicon glyphicon-cog"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Change Password</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="logout.php">
                                    <div class="media-left avatar">
                                        <i class="ti-power-off"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Logout</h6>
                                    </div>
                                </a>
                            </li>
                    </div>
                </li>
                </ul>
        </header>
        <!-- Header end-->
        <div class="main-container">
            <!-- Main Sidebar start-->
            <aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar">
                <div class="text-center">
                    <img src="<?= BASE_URL ?>build/images/agripreneur-01.png" style="height: 150px; width: 150px; line-height: 80px; padding: 12px;"
                        alt="" class="avatar img-circle text-center">
                    <span class="status bg-success"></span>
                </div>
                <ul class="list-unstyled navigation mb-0">
                    <li class="sidebar-header pt-0">Main</li>
                    <li>
                        <a href="index.php">
                            <i class="ti-home"></i> Dashboard</a>
                    </li>
                    <li class="panel">
                        <a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse2" aria-expanded="false" aria-controls="collapse2"
                            class="collapsed">
                            <i class="ti-shopping-cart"></i> E-commerce</a>
                        <ul id="collapse2" class="list-unstyled collapse">
                            <li>
                                <a href="add-product.php">Add Product</a>
                            </li>
                            <li>
                                <a href="product-list.php">Product list</a>
                            </li>
                        </ul>
                    </li>
                    <li class="panel">
                        <a href="customer.php">
                            <i class="ti-layout-grid2"></i> Customers</a>
                    </li>
                </ul>
            </aside>
            <!-- Main Sidebar end-->