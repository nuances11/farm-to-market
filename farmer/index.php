<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Dashboard</h4>
            <ol class="breadcrumb mb-0">
                <li class="active">Home</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid p-0">
        <div class="row ml-10 mr-10 pt-10">
            <div class="col-md-3">
                <div class="widget clear">
                    <div class="widget-heading">
                        <h3 class="widget-title">About me</h3>
                    </div>
                    <div class="widget-body">

                    <?php
                        $sql = "SELECT * FROM tbl_user WHERE id = '".$_SESSION['id']."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            ?>
                                <ul class="media-list mb-0">
                                    <li class="media">
                                        <div class="media-left">
                                            <i class="ti-briefcase text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?= $row['user_type']?></p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">
                                            <i class="ti-gift text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?= $row['birthday']?></p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">
                                            <i class="ti-email text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?= $row['email']?></p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">
                                            <i class="ti-home text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p>
                                                <?php
                                                    if ($row['add_street']) {
                                                        echo $row['add_street'] . ',';
                                                    }else {
                                                        echo '';
                                                    }

                                                    if ($row['add_barangay']) {
                                                        echo $row['add_barangay'] . ',';
                                                    }else {
                                                        echo '';
                                                    }
                                                    if ($row['add_city']) {
                                                        echo $row['add_city'] . ',';
                                                    }else {
                                                        echo '';
                                                    }
                                                    if ($row['add_province']) {
                                                        echo $row['add_province'] . '';
                                                    }else {
                                                        echo '';
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-left">
                                            <i class="ti-mobile text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p><?= $row['phone'] ?></p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="edit-profile.php?id=<?= $row['id'] ?>" class="btn btn-raised btn-block btn-success">
                                    <i class="glyphicon glyphicon-pencil"></i> &nbsp;&nbsp;Edit Profile</a>
                            <?php
                        }else{
                            echo '0 result found';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">Site Map</h3>
                    </div>
                    <div class="widget-body">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123391.90451927399!2d120.2759176280386!3d14.881445274140525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396711b9c32216b%3A0xa080c3d36f2963a7!2sOlongapo%2C+Zambales!5e0!3m2!1sen!2sph!4v1511684906593" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>