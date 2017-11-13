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
            <b>PHP <?= number_format($item_total,2) ?></b>&nbsp;&nbsp;<a href="checkout.php"><i class="ti-shopping-cart checkout-icon"></i></a>
            </div>
            <div>
            (<?php
                if ($item_quantity) {
                    echo $item_quantity;
                }else{
                    echo '0';
                }
            ?>) item(s) <a href="addtocart.php?emptycart=1&return_url=<?php echo $current_url;?>"><i class="ti-trash" style="color:red"></i></a>
            </div>
            <?php
        
		?>
        </div>   
        <?php
        }
        ?>   
    </div>
        
   
    <div class="page-content container-fluid">
        <div class="women_main">
            <!-- start content -->
            <?php
                $sql = "SELECT * FROM tbl_products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                ?>

                <div class="w_content">
                    <div class="women">
                        <a href="#">
                            <h4>Result -
                                <span>
                                    <?= $result->num_rows ?> items</span>
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
                            while ($row = $result->fetch_assoc()) {
                                ?>
                            <div class="col-sm-3 col-md-3 col-xs-12 grid1_of_4" style="margin-bottom:5px;margin-top:5px;">
                                <div class="content_box">
                                    <a href="details.php?id=<?= $row['id'] ?>">
                                        <img <?php if ($row[ 'prod_image']) { ?> src = "
                                        <?= $row['prod_image']?>"
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
                                            <b><?= $row['prod_name'] ?></b>
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
                                                    <?= number_format($row['prod_price'],2) ?>
                                                </h6>
                                            </span>
                                        </div> 
										<?php 
											if($row['prod_quantity'] > 0){
												?>
												<div class="item_add">
													<span class="item_price">
														<a href="details.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success" >add to cart</a>
													</span>
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
                </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>