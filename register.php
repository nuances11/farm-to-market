<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umega App - Register</title>
    <!-- PACE-->
    <link rel="stylesheet" type="text/css" href="assets/PACE/themes/blue/pace-theme-flash.css">
    <script type="text/javascript" src="assets/PACE/pace.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="assets/themify-icons/themify-icons.css">
    <!-- Primary Style-->
    <link rel="stylesheet" type="text/css" href="build/css/second-layout.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="background-image: url(build/images/backgrounds/18.jpg)" class="body-bg-full">
    <div class="container page-container">
        <div class="page-content">
            <div class="logo">
                <i class="ti-underline"></i>
            </div>
            <form id="form-register" class="form-horizontal">
                <div class="form-group" id="username-input">
                    <div class="col-xs-12">
                        <input type="text" placeholder="Username" class="form-control" name="username" id="username">
                    </div>
                </div>
                <div class="form-group" id="email-input">
                    <div class="col-xs-12">
                        <input type="text" placeholder="Email" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="form-group" id="password-input">
                    <div class="col-xs-12">
                        <input type="password" placeholder="Password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group" id="cpassword-input">
                    <div class="col-xs-12">
                        <input type="password" placeholder="Confirm Password" class="form-control" name="cpassword" id="cpassword">
                    </div>
                </div>
                <div class="form-group" id="birthday-input">
                <div class="col-xs-12">
                    <label class="checkbox-muted text-muted">Birthday</label>
                </div>
                    <div class="col-xs-4">
                    <select class="form-control">
                        <option value="">Month</option>
                    </select>
                    </div>
                    <div class="col-xs-4">
                    <select class="form-control">
                        <option value="">Day</option>
                    </select>
                    </div>
                    <div class="col-xs-4">
                    <select class="form-control">
                        <option value="">Year</option>
                    </select>
                    </div>
                </div>
                <div class="form-group" id="remember-input">
                    <div class="col-xs-12">
                        <div style="margin-bottom: 7px" class="checkbox-inline checkbox-custom">
                            <input id="exampleCheckboxAgree" type="checkbox" value="remember" name="remember" id="remember">
                            <label for="exampleCheckboxAgree" class="checkbox-muted text-muted">Agree the terms and policy</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-lg btn btn-primary btn-rounded btn-block">Sign up</button>
            </form>
            <hr>
            <div class="clearfix">
                <p class="text-muted mb-0 pull-left">Already have an account? </p>
                <a href="index.php" class="inline-block pull-right">Sign In</a>
            </div>
        </div>
    </div>
    <!-- jQuery-->
    <script type="text/javascript" src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script type="text/javascript" src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Custom JS-->
    <script type="text/javascript" src="custom/index.js"></script>
</body>

</html>