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
                <div class="widget clear">
                    <div class="widget-heading">
                        <h3 class="widget-title">Biography</h3>
                    </div>
                    <div class="widget-body">
                        <p>I am an Java, Android and Python software developer and teacher with 5 years of development experience!
                            Whats more I reveal all my knowledge and secrets in my courses!</p>
                        <p>I've been using Java since all the way back in 2006 !</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="widget">
                    <div class="widget-heading">
                        <h3 class="widget-title">Site Map</h3>
                    </div>
                    <div class="widget-body">
                        <div id="simpleMap" style="height:300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>