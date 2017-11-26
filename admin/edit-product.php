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
    <div class="widget">
        <div class="widget-heading clearfix">
            <h3 class="widget-title pull-left">Edit Product</h3>
            <div class="pull-right">
                <button type="button" id="update-product" class="btn btn-primary">
                    <i class="ti-save"></i>&nbsp;&nbsp;UPDATE PRODUCT
                </button>
                <!-- <button type="button" class="btn btn-default">
                    <i class="ti-share-alt"></i>
                </button> -->
            </div>
        </div>

        <div class="err col-sm-12" style="padding-top:5px;">
            <!-- Error Handler -->
        </div>
        <div class="widget-body">
            <form class="form-horizontal" id="edit-product-form">
                <ul role="tablist" class="nav nav-tabs mb-15">
                    <li role="presentation" class="active">
                        <a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a>
                    </li> 
                    <li role="presentation">
                        <a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a>
                    </li>
                    <li role="presentation">
                        <a href="#image" aria-controls="image" role="tab" data-toggle="tab">Image</a>
                    </li>
                </ul>
                <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $prod_id = $_GET['id'];

                    $sql = "SELECT * FROM tbl_products WHERE id = '".$prod_id."'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $prod = $result->fetch_assoc();
                    ?>


                    <div class="tab-content">
                        <input type="hidden" name="prod_id" value="<?= $_GET['id'] ?>">
                        <div id="general" role="tabpanel" class="tab-pane active">
                            <div class="form-group">
                                <label for="productName" class="col-sm-3 control-label">Product Name</label>
                                <div class="col-sm-9 input-productname">
                                    <input id="productName" name="productName" type="text" class="form-control" value="<?= $prod['prod_name'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productCategory" class="col-sm-3 control-label">Category</label>
                                <div class="col-sm-9 input-productcategory">
                                <select class="form-control" name="productCategory" id="productCategory">
                                    <option value="">Please select...</option>
                                    <?php 
                                        $sql1 = "SELECT * FROM tbl_category";
                                        $result1 = $conn->query($sql1);
                                        if ($result1->num_rows > 0) {
                                            while ($row1 = $result1->fetch_assoc()) {
                                                ?>
                                                    <option value="<?= $row1['id'] ?>" <?php if($prod['prod_category'] == $row1['id']){echo 'selected';} ?>><?= $row1['category_name'] ?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productSubCategory" class="col-sm-3 control-label">Sub-category</label>
                                <div class="col-sm-9 input-productsubcategory">
                                    <select class="form-control" name="productSubCategory" id="productSubCategory">
                                    <?php 
                                        $sql2 = "SELECT * FROM tbl_sub_category";
                                        $result2 = $conn->query($sql2);
                                        if ($result2->num_rows > 0) {
                                            while ($row2 = $result2->fetch_assoc()) {
                                                ?>
                                                    <option value="<?= $row2['id'] ?>" <?php if($prod['prod_category'] == $row2['id']){echo 'selected';} ?>><?= $row2['sub_category_name'] ?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productDescription" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9 input-productdescription">
                                    <textarea id="productDescription" name="productDescription" class="form-control"><?= $prod['prod_description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="data" role="tabpanel" class="tab-pane">
                            <div class="form-group">
                                <label for="productSKU" class="col-sm-3 control-label">SKU</label>
                                <div class="col-sm-9 input-productsku">
                                    <input id="productSKU" name="productSKU" type="text" class="form-control" value="<?= $prod['prod_sku'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productPrice" class="col-sm-3 control-label">Price</label>
                                <div class="col-sm-9 input-productprice">
                                    <input id="productPrice" name="productPrice" type="number" class="form-control" value="<?= $prod['prod_price'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productQuantity" class="col-sm-3 control-label">Quantity</label>
                                <div class="col-sm-9 input-productquantity">
                                    <input id="productQuantity" name="productQuantity" type="number" class="form-control" value="<?= $prod['prod_quantity'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productMinQuantity" class="col-sm-3 control-label">Minimum Quantity</label>
                                <div class="col-sm-9 input-productminquantity">
                                    <input id="productMinQuantity" name="productMinQuantity" type="number" class="form-control" value="<?= $prod['prod_minquantity'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productStatus" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9 input-productstatus">
                                    <select id="productStatus" name="productStatus" class="form-control">
                                        <option value="">Choose</option>
                                        <option value="1" <?php if ($prod[ 'prod_status']=='1' ){echo 'selected';} ;?>>Enabled</option>
                                        <option value="0" <?php if ($prod[ 'prod_status']=='0' ){echo 'selected';} ;?>>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
            </form>
            <div id="image" role="tabpanel" class="tab-pane">
                <form action="<?= BASE_URL ?>process/img-upload.php?id=<?= $prod['id'] ?>" method="POST" enctype="multipart/form-data">

                    <div class="container">
                        <div class="row">
                            <div class="form-group">
                                <label for="productImage" class="col-sm-3 control-label">File input</label>
                                <div class="col-sm-9">
                                    <input type="file" name="product_img">
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