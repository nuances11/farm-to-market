<?php
session_start();
if (isset($_SESSION['user_type'])) {
    $user = $_SESSION['user_type'];

    if ($user == 'Farmer') {
        header("Location: farmer/index.php");
    }elseif ($user == 'Owner') {
        header("Location: owner/index.php");
    }elseif ($user == 'Admin') {
        header("Location: admin/index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="assets/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="assets/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="assets/themify-icons/themify-icons.css">
    <!-- Malihu Scrollbar-->
    <link rel="stylesheet" type="text/css" href="assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
    <!-- Animo.js-->
    <link rel="stylesheet" type="text/css" href="assets/animo.js/animate-animo.min.css">
    <!-- Bootstrap Progressbar-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="build/css/second-layout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css" />
    <link rel="stylesheet" type="text/css" href="custom/index.css">
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
        <a href="index.php" class="brand pull-left">
            <h2>AGRIPRENEUR</h2>
        </a>
        <ul class="notification-bar list-inline pull-right" style="vertical-align:center">
            <li class="custom-menu">
                <a href="index.php" class="header-icon">
                    <i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp; Login</a>
            </li>
        </ul>
    </header>
    <div class="container">
        <div class="register-container">
            <div class="widget">
                <div class="widget-heading">
                    <h3 class="widget-title">Register</h3>
                </div>
                <div class="widget-body">
                    <form id="registration-form">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Account Information</h3>
                                <hr>
                                <div class="form-group input-usertype">
                                    <div>
                                        <div class="radio-custom radio-inline">
                                            <input id="user_famer" type="radio" name="user_type" value="Farmer">
                                            <label for="user_famer">Farmer</label>
                                        </div>
                                        <div class="radio-custom radio-inline">
                                            <input id="user_owner" type="radio" name="user_type" value="Owner">
                                            <label for="user_owner">Restaurant Owner</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group input-username">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group input-password">
                                    <label for="pasword">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group input-cpassword">
                                    <label for="cpasword">Confirm Password:</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                                </div>
                                <div class="form-group input-email">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <h3>Personal Information</h3>
                                <hr>
                                <div class="form-group input-fname">
                                    <label for="fname">First Name:</label>
                                    <input type="text" class="form-control" id="fname" name="fname">
                                </div>
                                <div class="form-group input-mname">
                                    <label for="mname">Middle Name:</label>
                                    <input type="text" class="form-control" id="mname" name="mname">
                                </div>
                                <div class="form-group input-lname">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="lname">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group input-gender">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">Please choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <label for="gender">Birthday:</label>
                                <div class="form-group input-birthday">
                                    <div class="col-xs-4">
                                        <select class="form-control" id="month" name="month">
                                            <option value="">Month</option>
                                            <?php
                                                for($m=1; $m<=12; ++$m){
                                                    ?>
                                                    <option value="<?= date('F', mktime(0, 0, 0, $m, 1))?>"><?= date('F', mktime(0, 0, 0, $m, 1)) ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select class="form-control" id="day" name="day">
                                            <option value="">Day</option>
                                            <?php
                                                for($m=1; $m<=31; ++$m){
                                                    ?>
                                                    <option value="<?= $m ?>"><?= $m ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select class="form-control" id="year" name="year">
                                            <option value="">Year</option>
                                            <?php
                                                $year = date("Y");
                                                $newYear = $year - 99;
                                                $limit = $year - 18;
                                                for($m = $limit; $m>=$newYear; --$m){
                                                    ?>
                                                    <option value="<?= $m ?>"><?= $m ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group input-contact">
                                    <label for="contact">Contact Number:</label>
                                    <input type="text" class="form-control" id="contact" name="contact">
                                </div>
                                <h3>Address</h3>
                                <hr>
                                <div class="form-group  input-street">
                                    <label for="street">Street:</label>
                                    <input type="text" class="form-control" id="street" name="street">
                                </div>
                                <div class="form-group input-barangay">
                                    <label for="barangay">Barangay:</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay">
                                </div>
                                <div class="form-group input-city">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="form-group input-province">
                                    <label for="province">Province:</label>
                                    <input type="text" class="form-control" id="province" name="province">
                                </div>
                                <div class="checkbox-custom input-terms">
                                    <input id="user_terms" type="checkbox" name="terms" value="1">
                                    <label for="user_terms">I Agree to <a href="#">Terms of Service</a></label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <hr>
            <input type="submit" class="btn btn-success" value="Register">
            <div class="pull-right">
                Already have an account ?
                <a href="index.php">Login</a>
            </div><br><br><br>
            </form>
        </div>
    </div>
    </div>
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Malihu Scrollbar-->
    <script type="text/javascript" src="assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Animo.js-->
    <script type="text/javascript" src="assets/animo.js/animo.min.js"></script>
    <!-- Bootstrap Progressbar-->
    <script type="text/javascript" src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- jQuery Easy Pie Chart-->
    <script type="text/javascript" src="assets/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="build/js/second-layout/app.js"></script>
    <script type="text/javascript" src="build/js/second-layout/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.all.js"></script>
    <script type="text/javascript" src="custom/index.js"></script>
</body>

</html>