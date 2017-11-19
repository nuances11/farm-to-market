<?php include 'includes/header.php'?>
<?php $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Edit Profile</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Product Details</li>
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
        $product = $_GET['id'];
        $sql = "SELECT * FROM tbl_products WHERE id = '".$product."'";
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
                                                    src = "<?= BASE_URL ?>build/images/products/<?= $row['prod_image']?>"
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
                                <span class="code">SKU: <?= $row['prod_sku'] ?></span>
                                <div class="price">
                                    <span class="price-new">PHP <?= number_format($row['prod_price'],2) ?></span>
                                    
                                    <br>
                                </div>
                                <p><?= $row['prod_description'] ?></p>
                                <p><h5>Category: <span style="color:#17A88B;"><?= $row['prod_category'] ?></span></h5></p>
                                <p><h5>Sub-category: <span style="color:#17A88B;"><?= $row['prod_subcategory'] ?></span></h5></p>
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
                                <div class="btn_form" style="max-width:300px;width:100%">
                                   <form action="addtocart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="type" value="add">
                                        <input type="hidden" name="return_url" value="<?= $current_url ?>">
                                        
                                        
											<?php 
												if($row['prod_quantity'] < 1){
													echo '<div style="color:red;font-weight:600;padding-bottom: 15px;">OUT OF STOCK</div>';
												}else{
													?>
													<div class="item_add">
														<div class="input-group" style="text-align:center">
														  <span class="input-group-btn">
															<button class="btn btn-success" id="item-minus" type="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
														  </span>
														  <input type="text" class="form-control" data-limit="<?= $row['prod_quantity'] ?>" style="text-align:center" name="product_qty" id="product_qty" aria-label="product_qty" value="1">
														  <span class="input-group-btn">
															<button class="btn btn-success" id="item-plus" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
														  </span>
														</div>
													</div>
													 <div class="item_add">
														<span class="item_price">
															<input type="submit" class="btn btn-outline btn-success" value="add to cart">
														</span>
													</div>

													<?php
												}

											?>
                                        </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="single-bottom1">
                            <h6>Farm Details</h6>
                                <?php
                                    $sql1 = "SELECT * FROM tbl_products WHERE id = '".$_GET['id']."'";
                                    $result1 = $conn->query($sql);
                                    if ($result1->num_rows > 0) {
                                        $row1 = $result1->fetch_assoc();
											$sql2 = "SELECT * FROM tbl_user WHERE id = '".$row1['farmer_id']."'";
												$result2 = $conn->query($sql2);
												if($result2->num_rows > 0){
													$row2 = $result2->fetch_assoc();
													?>
												<table style="margin-left:20px;">
													<tr>
														<td width="40%"><b>Farmer Name:</b></td>
														<td>&nbsp;</td>
														<td cellspacing="5"><i><?= $row2['first_name'] . ' ' . $row2['middle_name'] . ' ' . $row2['last_name']?></i></td>
													</tr>
													<tr>
														<td><b>Location:</b></td>
														<td>&nbsp;</td>
														<td><i><?= $row2['add_street'] . ' ' . $row2['add_barangay'] . ' ' . $row2['add_city']. ' ' . $row2['add_province']?></i></td>
													</tr>
												</table>
												<?php
												}
                                    }
                                ?>
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