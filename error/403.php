<?php include_once '../config/constants.php';?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 Forbidden</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="<?= BASE_URL ?>assets/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>build/css/second-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://--> 
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url(<?= BASE_URL ?>build/images/backgrounds/18.jpg)" class="body-bg-full">
    <div class="container page-container">
      <div class="page-content">
        <div class="logo"><i class="ti-underline"></i></div>
        <h1 style="font-size: 130px" class="m-0 text-muted fw-300">4<i class="ti-face-sad fs-100"></i>3</h1>
        <h4 class="fs-16 text-white fw-300">Access Denied!</h4>
        <p class="text-muted mb-15">You don't have permission to access on this server.</p><a href="<?= BASE_URL ?>index.php" role="button" style="width: 130px" class="btn btn-primary btn-rounded">Return home</a>
      </div>
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="<?= BASE_URL ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="<?= BASE_URL ?>build/js/second-layout/extra-demo.js"></script>
  </body>
</html>