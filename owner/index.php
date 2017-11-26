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
        <div class="row">
            <div class="text-center">
                <h2>Featured Products</h2>
            </div>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                    <div class="carousel-inner">
                        <?php
                            $sql = "SELECT * FROM tbl_products WHERE featured = '1' AND prod_quantity > '0'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $active = $result->fetch_assoc();
                                ?>
                            <div class="item active">
                                <div class="col-xs-12 col-sm-6 col-md-2">
                                    <a href="details.php?id=<?= $active['id']?>">
                                        <img <?php if ($active[ 'prod_image']) { ?> src = "<?= BASE_URL ?>build/images/products/<?= $active['prod_image']?>"
                                                <?php
                                            }else {
                                                ?>
                                                    src="
                                                    <?= BASE_URL ?>build/images/no-image.jpg"
                                                        <?php
                                            }
                                        ?> style="width:180px;height:200px;" class="img-responsive center-block">
                                    </a>
                                    <h4 class="text-center">
                                        <?= $active['prod_name'] ?>
                                    </h4>
                                    <h5 class="text-center">P
                                        <?= number_format($active['prod_price'],2) ?>/
                                            <strong>kg</strong>
                                    </h5>
                                </div>
                            </div>
                            <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                <div class="item">
                                    <div class="col-xs-12 col-sm-6 col-md-2">
                                        <a href="details.php?id=<?= $row['id']?>">
                                            <img <?php if ($row[ 'prod_image']) { ?> src = "<?= BASE_URL ?>build/images/products/<?= $row['prod_image']?>"
                                                    <?php
                                            }else {
                                                ?>
                                                        src="
                                                        <?= BASE_URL ?>build/images/no-image.jpg"
                                                            <?php
                                            }
                                        ?> style="width:180px;height:200px;" class="img-responsive center-block">
                                        </a>
                                        <h4 class="text-center">
                                            <?= $row['prod_name'] ?>
                                        </h4>
                                        <h5 class="text-center">P
                                            <?= number_format($row['prod_price'],2) ?>/
                                                <strong>kg</strong>
                                        </h5>
                                    </div>
                                </div>
                                <?php
                                }
                            }
                        ?>

                    </div>

                    <div id="slider-control">
                        <a class="left carousel-control" href="#itemslider" data-slide="prev">
                            <img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive">
                        </a>
                        <a class="right carousel-control" href="#itemslider" data-slide="next">
                            <img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="widget">
                <div class="widget-heading">
                    <div class="pull-right">
                        <a href="products.php">
                            See More
                        </a>
                    </div>
                    Products From Other Farmers
                </div>
                <div class="widget-body">
                    <div class="row" id="product-grid">
                        <?php
                    $rand = "SELECT * FROM tbl_products tbl_products INNER JOIN tbl_user ON tbl_products.farmer_id = tbl_user.id WHERE prod_status = '1' ORDER BY RAND() LIMIT 4";
                    $resrand = $conn->query($rand);
                    if ($resrand->num_rows > 0) {
                        while($randProd = $resrand->fetch_assoc()){
                            ?>
                            <div class="col-sm-3 col-md-3 col-xs-12 grid1_of_4" style="margin-bottom:5px;margin-top:5px;">
                                <div class="content_box">
                                    <a href="details.php?id=<?= $randProd['id'] ?>">
                                        <img style="max-width:322px;width:100%;max-height: 306px;height:auto;border-bottom: 1px solid #D6CBCB;" <?php if ($randProd[ 'prod_image']) { ?> src = "
                                        <?= BASE_URL ?>build/images/products/<?= $randProd['prod_image']?>"
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
                                        <a href="details.php?id=<?= $randProd['id'] ?>">
                                            <b>
                                                <?= $randProd['prod_name'] ?>
                                            </b>
                                        </a>
                                    </h4>
                                    <p>
                                        Stocks:
                                        <?php 
                                                    if($randProd['prod_quantity'] > 0){
                                                        if($randProd['prod_quantity'] < $randProd['prod_minquantity'] ){
                                                            echo '<span class="label label-warning">' . number_format($randProd['prod_quantity']) . '</span>';
                                                        }else{
                                                            echo '<span class="label label-success">' . number_format($randProd['prod_quantity']) . '</span>';
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
                                                    <?= number_format($randProd['prod_price'],2)?>
                                                        /
                                                        <strong style="color:#17A88B">kg</strong>
                                                </h6>
                                            </span>
                                        </div>
                                        <?php 
                                                    if($randProd['prod_quantity'] > 0){
                                                        ?>
                                        <div class="item_add">
                                            <span class="item_price">
                                                <a href="details.php?id=<?= $randProd['id'] ?>" class="btn btn-outline btn-success">add to cart</a>
                                            </span>
                                        </div>
                                        <div class="farmer-name">
                                            <span style="font-weight:400">by:</span>
                                            <?= $randProd['first_name'] . ' ' .$randProd['last_name']?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>