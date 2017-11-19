<?php include 'includes/header.php' ?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Edit Profile</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Edit Profile</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Edit</h3>
            </div>
            <div class="widget-body">
                
                    <?php
                    $sql = "SELECT * FROM tbl_user WHERE id = '".$_GET['id']."'";
                    $result=$conn->query($sql);

                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        ?>
                    <form id="edit-profile-form" class="form-horizontal">
                        <!-- <div class="form-group">
                            <label for="fulImageHor" class="col-sm-2 control-label">Image upload</label>
                            <div class="col-sm-6">
                                <input id="fulImageHor" type="file" name="fulImageHor" data-buttontext="Choose file" data-buttonname="btn-outline btn-primary"
                                    data-iconname="ti-image" data-rule-required="true" data-rule-accept="image/*" class="filestyle">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="user" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-6 input-username">
                                <input id="username" type="text" name="username" class="form-control" value="<?= $user['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-6 input-email">
                                <input id="email" type="text" name="email" class="form-control" value="<?= $user['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-6 input-firstname">
                                <input id="fname" type="text" name="fname" class="form-control" value="<?= $user['first_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mname" class="col-sm-2 control-label">Middle Name</label>
                            <div class="col-sm-6 input-middlename">
                                <input id="mname" type="text" name="mname" class="form-control" value="<?= $user['middle_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-6 input-lastname">
                                <input id="lname" type="text" name="lname" class="form-control" value="<?= $user['last_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ddlCountryHor" class="col-sm-2 control-label">Birthday</label>
                            <?php
                            list($month, $day, $year) = explode('-', $user['birthday']);
                        ?>
                                <div class="col-sm-2">
                                    <select id="dob_month" name="dob_month" class="form-control">
                                        <?php
                            for($m=1; $m<=12; ++$m){
                                ?>
                                            <option value="">Month</option>
                                            <option value="<?= date('F', mktime(0, 0, 0, $m, 1))?>">
                                                <?= date('F', mktime(0, 0, 0, $m, 1)) ?>
                                            </option>
                                            <?php
                            }
                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select id="dob_day" name="dob_day" class="form-control">
                                        <option value="">Day</option>
                                        <?php
                                for($m=1; $m<=31; ++$m){
                                    ?>
                                            <option value="<?= $m ?>">
                                                <?= $m ?>
                                            </option>
                                            <?php
                                }
                            ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select id="dob_year" name="dob_year" class="form-control">
                                        <option value="">Year</option>
                                        <?php
                                                $year = date("Y");
                                                $newYear = $year - 99;
                                                $limit = $year - 18;
                                                for($m = $limit; $m>=$newYear; --$m){
                                                    ?>
                                            <option value="<?= $m ?>">
                                                <?= $m ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="input-birthday"></div>
                        </div>


                        <div class="form-group">
                        <label for="lname" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-6">
                        <select id="gender" name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>
                    </div>
                    </div>
                        <div class="form-group">
                            <label for="contact" class="col-sm-2 control-label">Contact Number</label>
                            <div class="col-sm-6 input-contact">
                                <input id="contact" type="number" name="contact" class="form-control" value="<?= $user['phone'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="add_street" class="col-sm-2 control-label">Street</label>
                            <div class="col-sm-6 input-street">
                                <input id="add_street" type="text" name="add_street" class="form-control" value="<?= $user['add_street'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="add_barangay" class="col-sm-2 control-label">Barangay</label>
                            <div class="col-sm-6 input-barangay">
                                <input id="add_barangay" type="text" name="add_barangay" class="form-control" value="<?= $user['add_barangay'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="add_city" class="col-sm-2 control-label">City</label>
                            <div class="col-sm-6 input-city">
                                <input id="add_city" type="text" name="add_city" class="form-control" value="<?= $user['add_city'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="add_province" class="col-sm-2 control-label">Province</label>
                            <div class="col-sm-6 input-province">
                                <input id="add_province" type="text" name="add_province" class="form-control" value="<?= $user['add_province'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-6">
                                <button type="button" id="edit-profile" class="btn btn-raised btn-black">Submit</button>
                            </div>
                        </div>
                        <?php
                    }else{
                        echo '<div class="alert alert-danger">No Records Found</div>';
                    }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>