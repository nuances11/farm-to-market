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

            <?php
        $product = $_GET['id'];
        $sql = "SELECT * FROM tbl_products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
                <div class="row single">
                    <div class="det">
                        <div class="single_left">
                            <div class="grid images_3_of_2">
                                <div class="flexslider">
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
                                </div>
                            </div>
                            <div class="desc1 span_3_of_2">
                                <h3><?= $row['prod_name'] ?></h3>
                                    <br>
                                <span class="code">SKU: <?= $row['prod_sku'] ?></span>
                                <p><?= $row['prod_description'] ?></p>
                                <div class="price">
                                    <span class="text">Price:</span>
                                    <span class="price-new">PHP <?= number_format($row['prod_price'],2) ?></span>
                                    
                                    <br>
                                </div>
                                <p><h5>Category: <span style="color:red;"><?= $row['prod_category'] ?></span></h5></p>
                                <p><h5>Sub-category: <span style="color:red;"><?= $row['prod_subcategory'] ?></span></h5></p>
                                <div class="btn_form">
                                    <a href="checkout.html" class="btn btn-outline btn-success">Add to Cart </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="single-bottom1">
                            <h6>Details</h6>
                            <p class="prod-desc">
                                <?php
                                    $sql1 = "SELECT * FROM tbl_products RIGHT JOIN tbl_user ON tbl_products.farmer_id = tbl_user.id WHERE tbl_products.id = '".$_GET['id']."'";
                                    $result1 = $conn->query($sql);
                                    if ($result1->num_rows > 0) {
                                        $row1 = $result1->fetch_assoc();
                                        print_r($row1);
                                        ?>
                                        <table>
                                            <tr>
                                                <td>Farmer Name</td>
                                                <td><?= $row1['first_name'] . ' ' . $row1['middle_name'] . ' ' . $row1['last_name']?></td>
                                            </tr>
                                        </table>
                                        <?php
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
        }
    ?>

                </div>
                <!-- end content -->
        </div>
    </div>
    <?php include 'includes/footer.php'?>