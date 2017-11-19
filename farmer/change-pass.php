<?php include 'includes/header.php' ?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Change Password</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Change Password</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Change Password</h3>
            </div>
            <div class="widget-body">
                    <form id="change-pass-form" class="form-horizontal">
                        <div class="form-group">
                            <label for="oldpass" class="col-sm-2 control-label">Old Password</label>
                            <div class="col-sm-6 input-oldpass">
                                <input id="oldpass" type="password" name="oldpass" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="newpass" class="col-sm-2 control-label">New Password</label>
                            <div class="col-sm-6 input-newpass">
                                <input id="newpass" type="password" name="newpass" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpass" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-6 input-cpass">
                                <input id="cpass" type="password" name="cpass" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="button" id="change-pass" class="btn btn-raised btn-black">Change Pasword</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>