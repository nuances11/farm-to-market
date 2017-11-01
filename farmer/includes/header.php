<?php include_once '../config/constants.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umega App - Responsive web app kit</title>
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
      </div><a href="index.php" class="brand pull-left">
        <h2><img src="<?= BASE_URL ?>build/images/agripreneur-02.png" height="50px" width="50px"></h2></a><a href="javascript:;" role="button" class="hamburger-menu pull-left visible-xs"><span></span></a>
      <ul class="notification-bar list-inline pull-right">
        <li class="visible-xs"><a href="javascript:;" role="button" class="header-icon search-bar-toggle"><i class="ti-search"></i></a></li>
        <li class="visible-lg"><a href="javascript:;" role="button" class="header-icon fullscreen-toggle"><i class="ti-fullscreen"></i></a></li>
        <li class="dropdown"><a id="dropdownMenu1" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle bubble header-icon"><i class="ti-world"></i><span class="badge bg-danger">6</span></a>
          <div aria-labelledby="dropdownMenu1" class="dropdown-menu dropdown-menu-right dm-medium fs-12 animated fadeInDown">
            <h5 class="dropdown-header">You have 6 notifications</h5>
            <ul data-mcs-theme="minimal-dark" class="media-list mCustomScrollbar">
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="<?= BASE_URL ?>build/images/users/17.jpg" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">William Carlson</h6>
                    <p class="text-muted mb-0">Commented on your post</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">5 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="<?= BASE_URL ?>build/images/users/19.jpg" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Barbara Ortega</h6>
                    <p class="text-muted mb-0">Sent you a new email</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">8 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="<?= BASE_URL ?>build/images/users/02.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Mark Barnett</h6>
                    <p class="text-muted mb-0">Sent you a new message</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:50:48+07:00" class="fs-11">9 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="<?= BASE_URL ?>build/images/users/11.jpg" alt="" class="media-object img-circle"><span class="status bg-danger"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Alexander Gilbert</h6>
                    <p class="text-muted mb-0">Sent you a new email</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:42:40+07:00" class="fs-11">15 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="<?= BASE_URL ?>build/images/users/12.jpg" alt="" class="media-object img-circle"><span class="status bg-success"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Amanda Collins</h6>
                    <p class="text-muted mb-0">You have 8 unread messages</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:35:35+07:00" class="fs-11">22 mins</time>
                  </div></a></li>
              <li class="media"><a href="javascript:;">
                  <div class="media-left avatar"><img src="<?= BASE_URL ?>build/images/users/13.jpg" alt="" class="media-object img-circle"><span class="status bg-warning"></span></div>
                  <div class="media-body">
                    <h6 class="media-heading">Christian Lane</h6>
                    <p class="text-muted mb-0">Commented on your post</p>
                  </div>
                  <div class="media-right text-nowrap">
                    <time datetime="2015-12-10T20:27:48+07:00" class="fs-11">30 mins</time>
                  </div></a></li>
            </ul>
            <div class="dropdown-footer text-center p-10"><a href="javascript:;" class="fw-500 text-muted">See all notifications</a></div>
          </div>
        </li>
        <li><a href="javascript:;" role="button" class="right-sidebar-toggle bubble header-icon"><i class="ti-layout-sidebar-right"></i><span class="dot bg-danger"></span></a></li>
        <li><a href="logout.php" role="button" class="header-icon"><i class="ti-power-off"></i></a></li>
      </ul>
    </header>
    <!-- Header end-->
    <div class="main-container">
      <!-- Main Sidebar start-->
      <aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar">
        <div class="user">
          <div id="esp-user-profile" data-percent="65" style="height: 104px; width: 104px; line-height: 80px; padding: 12px;" class="easy-pie-chart"><img src="<?= BASE_URL ?>build/images/users/04.jpg" alt="" class="avatar img-circle"><span class="status bg-success"></span></div>
          <h4 class="fs-14 text-muted mt-15 mb-5 fw-300">Matthew Gonzalez</h4>
          <p class="fs-13 mb-0 text-muted">Designer</p>
        </div>
        <ul class="list-unstyled navigation mb-0">
          <li class="sidebar-header pt-0">Main</li>
          <li><a href="index.php"><i class="ti-home"></i> Dashboard</a></li>
          <li class="panel"><a role="button" data-toggle="collapse" data-parent=".navigation" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed"><i class="ti-shopping-cart"></i> E-commerce</a>
            <ul id="collapse2" class="list-unstyled collapse">
              <li><a href="add-product.php">Add Product</a></li>
              <li><a href="product-list.php">Product list</a></li>
            </ul>
          </li>
          <li class="panel"><a href="customer.php"><i class="ti-layout-grid2"></i> Customers</a>
          </li>
        </ul>
      </aside>
      <!-- Main Sidebar end-->