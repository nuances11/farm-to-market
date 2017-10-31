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
            <h2>UMEGA</h2>
        </a>
        <a href="javascript:;" role="button" class="hamburger-menu pull-left visible-xs">
            <span></span>
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
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="pasword">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="cpasword">Confirm Password:</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="">Please choose...</option>
                                    </select>
                                </div>
                                <label for="gender">Gender:</label>
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">Month</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">Day</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">Year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact Number:</label>
                                    <input type="text" class="form-control" id="contact" name="email">
                                </div>
                                <h3>Address</h3>
                                <div class="form-group">
                                    <label for="street">Street:</label>
                                    <input type="text" class="form-control" id="street" name="street">
                                </div>
                                <div class="form-group">
                                    <label for="barangay">Barangay:</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay">
                                </div>
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="form-group">
                                    <label for="province">Province:</label>
                                    <input type="text" class="form-control" id="province" name="province">
                                </div>
                                <div class="form-group">
                                    <div>
                                        <div class="radio-custom radio-inline">
                                            <input id="rdbWatchable" type="radio" name="user_type" value="watchable">
                                            <label for="rdbWatchable">Farmer</label>
                                        </div>
                                        <div class="radio-custom radio-inline">
                                            <input id="rdbBest" type="radio" name="user_type" value="best">
                                            <label for="rdbBest">Restaurant Owner</label>
                                        </div>
                                    </div>
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
            </div>
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
</body>

</html>