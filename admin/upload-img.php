<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Dashboard</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Edit Product</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Edit Product Image</h3>
            </div>

            <div class="widget-body">
                <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $prod_id = $_GET['id'];

                    $sql = "SELECT * FROM tbl_products WHERE id = '".$prod_id."'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $prod = $result->fetch_assoc();
                    ?>
                    <form action="<?= BASE_URL ?>process/img-upload.php?id=<?= $prod['id'] ?>" method="POST" enctype="multipart/form-data">

                        <div class="container">
                            <div class="row">
                                <div class="form-group">
                                    <label for="productImage" class="col-sm-3 control-label">File input</label>
                                    <div class="col-sm-9">
                                        <input type="file" required name="product_img">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="productImage" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-9">
                                        <input type="submit" class="btn btn-primary" value="Upload Image" id="upload">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <?php
                                if($prod['prod_image'] != ''){
                                    ?>
                                        <img src="<?= BASE_URL ?>build/images/products/<?=$prod['prod_image']?>" height="300" width="300">
                                        <?php
                                }else{
                                    ?>
                                            <img src="<?= BASE_URL ?>build/images/no-image.jpg" height="300" width="300">
                                            <?php
                                }
                            ?>
                                </div>

                            </div>
                        </div>

                    </form>

            </div>
        </div>
    </div>
    <?php
            }else{
                echo '<div class="alert alert-danger">No Records Found</div>';
            }
        }

    ?>


</div>
</div>
</div>
</div>
<?php include 'includes/footer.php'?>