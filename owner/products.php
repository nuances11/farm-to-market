<?php include 'includes/header.php'?>
<?php $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Products</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Product List</li>
            </ol>
        </div>
        <?php 
            if(isset($_SESSION["cart_session"])){
        ?>
        <div class="pull-right cart-info">
            <?php
        $item_total = 0;
        $item_quantity = 0;
            
                foreach ($_SESSION["cart_session"] as $item){
                   $item_quantity += $item['quantity'];
                    $item_total += ($item["price"]*$item["quantity"]); 
                    }
                    
		
        ?>
                <div>
                    <b>PHP
                        <?= number_format($item_total,2) ?>
                    </b>&nbsp;&nbsp;
                    <a href="checkout.php">
                        <i class="ti-shopping-cart checkout-icon"></i>
                    </a>
                </div>
                <div>
                    (
                    <?php
                if ($item_quantity) {
                    echo $item_quantity;
                }else{
                    echo '0';
                }
            ?>) item(s)
                        <a href="addtocart.php?emptycart=1&return_url=<?php echo $current_url;?>">
                            <i class="ti-trash" style="color:red"></i>
                        </a>
                </div>
                <?php
        
		?>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
            <div role="tabpanel">
                    <ul role="tablist" class="nav nav-tabs mb-15">
                      <li role="presentation" class="active"><a id="category-tab" href="#category" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="ti-search"></i>&nbsp;Category</a></li>
                      <li role="presentation"><a id="farmer-tab" href="#farmer" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="false"><i class="ti-search"></i>&nbsp;Farmer</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="category" role="tabpanel" aria-labelledby="category-tab" class="tab-pane fade active in">
                      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productCategory">Category</label>
                                <select class="form-control" name="productCategory" id="productCategory">
                                    <option value="">Please select...</option>
                                    <?php 
                                    $sql = "SELECT * FROM tbl_category";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                    <option value="<?= $row['id'] ?>">
                                        <?= $row['category_name'] ?>
                                    </option>
                                    <?php
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="productSubCategory">Sub Category</label>
                                <select class="form-control" name="productSubCategory" id="productSubCategory">
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                      </div>
                      <div id="farmer" role="tabpanel" aria-labelledby="farmer-tab" class="tab-pane fade">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="farmerName">Farmer Name</label>
                                <select class="form-control" name="farmerName" id="farmerName">
                                    <option value="">Please select...</option>
                                    <?php 
                                    $sql = "SELECT * FROM tbl_user WHERE user_type = 'Farmer'";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                    <option value="<?= $row['id'] ?>">
                                        <?= $row['first_name'] . ' ' . $row['last_name']?>
                                    </option>
                                    <?php
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="row">
                        <div class="col-md-4">
                            <?php
                                if (isset($_GET['category']) && isset($_GET['subcategory']) || isset($_GET['farmer'])) {
                                    ?>
                                        <a href="products.php" role="button" class="mb-15 btn btn-success btn-outline">Clear Filter</a>
                                    <?php
                                }
                            ?>
                        </div>            
                    </div>
            </div>
            <div class="widget-body">
                <?php
                if (isset($_GET['category']) && isset($_GET['subcategory'])) {
                    $category = $_GET['category'];
                    $subcategory = $_GET['subcategory'];

                    $sql = "SELECT * FROM tbl_products INNER JOIN tbl_user ON tbl_products.farmer_id = tbl_user.id WHERE prod_category LIKE '%" . $category .  "%' AND prod_subcategory LIKE '%" . $subcategory .  "%'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                    <h4>Result -
                        <span>
                            <?= $result->num_rows ?> items</span>
                    </h4>
                    <div class="clearfix"></div>
            </div>
            <div class="row" id="product-grid">
                <!-- grids_of_4 -->
                <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                    <div class="col-sm-3 col-md-3 col-xs-12 grid1_of_4" style="margin-bottom:5px;margin-top:5px;">
                        <div class="content_box">
                            <a href="details.php?id=<?= $row['id'] ?>">
                                <img style="width:100%;max-height:306px;height: auto;border-bottom: 1px solid #D6CBCB;" <?php if ($row[ 'prod_image']) { ?> src = "
                                <?= BASE_URL ?>build/images/products/<?= $row['prod_image']?>"
                                        <?php
                                                    }else {
                                                        ?>
                                            src="
                                            <?= BASE_URL ?>build/images/no-image.jpg"
                                                <?php
                                                    }
                                                ?>
                                                    class="img-responsive" alt="">
                            </a>
                            <h4>
                                <a href="details.php?id=<?= $row['id'] ?>">
                                    <b>
                                        <?= $row['prod_name'] ?>
                                    </b>
                                </a>
                            </h4>
                            <p>
                                Stocks:
                                <?php 
                                        if($row['prod_quantity'] > 0){
                                            if($row['prod_quantity'] < $row['prod_minquantity'] ){
                                                echo '<span class="label label-warning">' . number_format($row['prod_quantity']) . '</span>';
                                            }else{
                                                echo '<span class="label label-success">' . number_format($row['prod_quantity']) . '</span>';
                                            }
                                            
                                        }else{
                                            echo '<span class="label label-danger">Out of Stock</span>';
                                        }
                                    ?>
                            </p>
                            <div class="grid_1 simpleCart_shelfItem">

                                <div class="item_add">
                                    <span class="item_price">
                                        <h6>PHP
                                            <?= number_format($row['prod_price'],2)?>
                                                /
                                                <strong style="color:#17A88B">kg</strong>
                                        </h6>
                                    </span>
                                </div>
                                <?php 
                                        if($row['prod_quantity'] > 0){
                                            ?>
                                <div class="item_add">
                                    <span class="item_price">
                                        <a href="details.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success">add to cart</a>
                                    </span>
                                </div>
                                <div class="farmer-name">
                                    <span style="font-weight:400">by:</span>
                                    <?= $row['first_name'] . ' ' .$row['last_name']?>
                                </div>
                                <?php
                                            
                                        }else{
                                            echo '<div style="padding-top: 14px;padding-bottom: 17px;"><span class="label label-danger" style="padd">Out of Stock</span></div>';
                                        }
                                    ?>

                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                ?>
                        <!-- end grids_of_4 -->
            </div>
            <?php
                }elseif (isset($_GET['farmer'])) {
                    $farmer = $_GET['farmer'];

                    $sql = "SELECT * FROM tbl_products INNER JOIN tbl_user ON tbl_products.farmer_id = tbl_user.id WHERE farmer_id = '".$farmer."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                    <h4>Result -
                        <span>
                            <?= $result->num_rows ?> items</span>
                    </h4>
                    <div class="clearfix"></div>
            </div>
            <div class="row" id="product-grid">
                <!-- grids_of_4 -->
                <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                    <div class="col-sm-3 col-md-3 col-xs-12 grid1_of_4" style="margin-bottom:5px;margin-top:5px;">
                        <div class="content_box">
                            <a href="details.php?id=<?= $row['id'] ?>">
                                <img style="width:100%;max-height:306px;height: auto;border-bottom: 1px solid #D6CBCB;" <?php if ($row[ 'prod_image']) { ?> src = "
                                <?= BASE_URL ?>build/images/products/<?= $row['prod_image']?>"
                                        <?php
                                                    }else {
                                                        ?>
                                            src="
                                            <?= BASE_URL ?>build/images/no-image.jpg"
                                                <?php
                                                    }
                                                ?>
                                                    class="img-responsive" alt="">
                            </a>
                            <h4>
                                <a href="details.php?id=<?= $row['id'] ?>">
                                    <b>
                                        <?= $row['prod_name'] ?>
                                    </b>
                                </a>
                            </h4>
                            <p>
                                Stocks:
                                <?php 
                                        if($row['prod_quantity'] > 0){
                                            if($row['prod_quantity'] < $row['prod_minquantity'] ){
                                                echo '<span class="label label-warning">' . number_format($row['prod_quantity']) . '</span>';
                                            }else{
                                                echo '<span class="label label-success">' . number_format($row['prod_quantity']) . '</span>';
                                            }
                                            
                                        }else{
                                            echo '<span class="label label-danger">Out of Stock</span>';
                                        }
                                    ?>
                            </p>
                            <div class="grid_1 simpleCart_shelfItem">

                                <div class="item_add">
                                    <span class="item_price">
                                        <h6>PHP
                                            <?= number_format($row['prod_price'],2)?>
                                                /
                                                <strong style="color:#17A88B">kg</strong>
                                        </h6>
                                    </span>
                                </div>
                                <?php 
                                        if($row['prod_quantity'] > 0){
                                            ?>
                                <div class="item_add">
                                    <span class="item_price">
                                        <a href="details.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success">add to cart</a>
                                    </span>
                                </div>
                                <div class="farmer-name">
                                    <span style="font-weight:400">by:</span>
                                    <?= $row['first_name'] . ' ' .$row['last_name']?>
                                </div>
                                <?php
                                            
                                        }else{
                                            echo '<div style="padding-top: 14px;padding-bottom: 17px;"><span class="label label-danger" style="padd">Out of Stock</span></div>';
                                        }
                                    ?>

                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                ?>
                        <!-- end grids_of_4 -->
            </div>
            <?php
                }else{
                    $sql = "SELECT * FROM tbl_products INNER JOIN tbl_user ON tbl_products.farmer_id = tbl_user.id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    ?>
                <h4>Result -
                    <span>
                        <?= $result->num_rows ?> items</span>
                </h4>
                <div class="clearfix"></div>
        </div>
        <div class="row" id="product-grid">
            <!-- grids_of_4 -->
            <?php
                        while ($row = $result->fetch_assoc()) {
                            ?>
                <div class="col-sm-3 col-md-3 col-xs-12 grid1_of_4" style="margin-bottom:5px;margin-top:5px;">
                    <div class="content_box">
                        <a href="details.php?id=<?= $row['id'] ?>">
                            <img style="width:100%;max-height:306px;height: auto;border-bottom: 1px solid #D6CBCB;" <?php if ($row[ 'prod_image']) { ?> src = "
                            <?= BASE_URL ?>build/images/products/<?= $row['prod_image']?>"
                                    <?php
                                                    }else {
                                                        ?>
                                        src="
                                        <?= BASE_URL ?>build/images/no-image.jpg"
                                            <?php
                                                    }
                                                ?>
                                                class="img-responsive" alt="">
                        </a>
                        <h4>
                            <a href="details.php?id=<?= $row['id'] ?>">
                                <b>
                                    <?= $row['prod_name'] ?>
                                </b>
                            </a>
                        </h4>
                        <p>
                            Stocks:
                            <?php 
                                        if($row['prod_quantity'] > 0){
                                            if($row['prod_quantity'] < $row['prod_minquantity'] ){
                                                echo '<span class="label label-warning">' . number_format($row['prod_quantity']) . '</span>';
                                            }else{
                                                echo '<span class="label label-success">' . number_format($row['prod_quantity']) . '</span>';
                                            }
                                            
                                        }else{
                                            echo '<span class="label label-danger">Out of Stock</span>';
                                        }
                                    ?>
                        </p>
                        <div class="grid_1 simpleCart_shelfItem">

                            <div class="item_add">
                                <span class="item_price">
                                    <h6>PHP
                                        <?= number_format($row['prod_price'],2)?>
                                            /
                                            <strong style="color:#17A88B">kg</strong>
                                    </h6>
                                </span>
                            </div>
                            <?php 
                                        if($row['prod_quantity'] > 0){
                                            ?>
                            <div class="item_add">
                                <span class="item_price">
                                    <a href="details.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success">add to cart</a>
                                </span>
                            </div>
                            <div class="farmer-name">
                                <span style="font-weight:400">by:</span>
                                <?= $row['first_name'] . ' ' .$row['last_name']?>
                            </div>
                            <?php
                                            
                                        }else{
                                            echo '<div style="padding-top: 14px;padding-bottom: 17px;"><span class="label label-danger" style="padd">Out of Stock</span></div>';
                                        }
                                    ?>

                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                    <!-- end grids_of_4 -->
        </div>
        <?php
                }
            ?>

    </div>
</div>
</div>


</div>
<?php include 'includes/footer.php'?>