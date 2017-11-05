<?php include 'includes/header.php'?>
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
        <div class="women_main">
            <!-- start content -->

            <div class="w_content">
                <div class="women">
                    <a href="#">
                        <h4>Enthecwear -
                            <span>4449 items</span>
                        </h4>
                    </a>
                    <ul class="w_nav">
                        <li>Sort : </li>
                        <li>
                            <a class="active" href="#">popular</a>
                        </li> |
                        <li>
                            <a href="#">new </a>
                        </li> |
                        <li>
                            <a href="#">discount</a>
                        </li> |
                        <li>
                            <a href="#">price: Low High </a>
                        </li>
                        <div class="clear"></div>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                <!-- grids_of_4 -->
                    <?php
                        $sql = "SELECT * FROM tbl_products";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                    <div class="col-sm-3 col-md-3 col-xs-12 grid1_of_4" style="margin-bottom:5px;margin-top:5px;">
                                        <div class="content_box">
                                            <a href="details.php?id=<?= $row['id'] ?>"> 
                                                <img
                                                    <?php 
                                                        if ($row['prod_image']) {
                                                            ?>
                                                                src = "<?= $row['prod_image']?>"
                                                            <?php
                                                        }else {
                                                            ?>
                                                            src="<?= BASE_URL ?>build/images/no-image.jpg"
                                                            <?php
                                                        }
                                                    ?>
                                                class="img-responsive" alt="">
                                            </a>
                                            <h4>
                                                <a href="details.php?id=<?= $row['id'] ?>"> <?= $row['prod_name'] ?></a>
                                            </h4>
                                            <p><?= $row['prod_description'] ?></p>
                                            <div class="grid_1 simpleCart_shelfItem">

                                                <div class="item_add">
                                                    <span class="item_price">
                                                        <h6>PHP <?= number_format($row['prod_price'],2) ?></h6>
                                                    </span>
                                                </div>
                                                <div class="item_add">
                                                    <span class="item_price">
                                                        <a href="#" class="btn btn-outline btn-success">add to cart</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                <!-- end grids_of_4 -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>