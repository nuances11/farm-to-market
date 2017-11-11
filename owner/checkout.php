<?php include 'includes/header.php'?>
<?php $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>
<!-- Main Sidebar end-->
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Checkout</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="products.php">Product List</a>
                </li>
                <li class="active">Checkout</li>
            </ol>
        </div>
        <div class="pull-right cart-info">
        <?php
        $item_total = 0;
        $item_quantity = 0;
            if(isset($_SESSION["cart_item"])){
                foreach ($_SESSION["cart_item"] as $item){
                   $item_quantity += $item['quantity'];
                    $item_total += ($item["price"]*$item["quantity"]); 
                    }
                    
		}
        ?>
            <div>
            <b>PHP <?= number_format($item_total,2) ?></b> <i class="ti-shopping-cart"></i>
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
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Checkout</h3>
            </div>
            <div class="widget-body">
                <table id="order-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                        <tr style="background-color:#c1f5c1">
                            <!-- <th class="text-center">
                                <div class="checkbox-custom">
                                    <input id="checkAll" type="checkbox" value="option1">
                                    <label for="checkAll" class="pl-0">&nbsp;</label>
                                </div>
                            </th> -->
                            <th><b>Product Name</b></th>
                            <th>SKU</th>
                            <th class="text-right"><b>Quantity</b></th>
                            <th class="text-center"><b>Unit Price</b></th>
                            <th class="text-center"><b>Total</b></th>
                            <th class="text-center"><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
					<form action="addtocart.php" method="POST">
					<?php
						$total_price = 0;
						$grand_total = 0;
						$total_quantity = 0;
						if(isset($_SESSION["cart_item"])){
							foreach ($_SESSION["cart_item"] as $item){
								$sql ="SELECT * FROM tbl_products WHERE id = '".$item['id']."'";
								$result = $conn->query($sql);
								if($result->num_rows > 0){
									while($row = $result->fetch_assoc()){
										$total_price = ($item["price"]*$item["quantity"]);
										$grand_total += $total_price;
										$total_quantity += $item["quantity"];
									?>
										<tr>
											
											<!-- <td class="text-center">
												<div class="checkbox-custom">
													<input id="product-01" type="checkbox" value="01">
													<label for="product-01" class="pl-0">&nbsp;</label>
												</div>
											</td> -->
											<td><?= $row['prod_name'] ?></td>
											<td>
												<span class="label label-success"><?= $row['prod_sku'] ?></span>
											</td>
											<td class="text-right"><?= $item['quantity'] ?></td>
											<td class="text-center"><?= number_format($item["price"],2) ?></td>
											<td class="text-center"><?= number_format($total_price,2) ?></td>
											<td class="text-center">
												<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
													<a href="details.php?id=<?= $row['id'] ?>" type="button" class="btn btn-outline btn-primary">
														<i class="ti-eye"></i>
													</a>
													<button type="button" class="btn btn-outline btn-success">
														<i class="ti-pencil"></i>
													</button>
													<input type="hidden" name="return_url" value="<?= $current_url ?>">
													<input type="hidden" name="action" value="remove">
													<input type="hidden" name="id" value="<?=$row['id']?>">
													<button type="submit" class="btn btn-outline btn-danger">
														<i class="ti-trash"></i>
													</button>
												</div>
												<a href="addtocart.php?id=<?= $row['id'] ?>&action=remove&return_url=<?= $current_url ?>">remove</a>
											</td>
										</tr>
									<?php
									}
								}else{
									echo 'no product to display';
								}
							}
							
						}else{
							echo 'no product to display';
						}
					?>
					</form>
					<tr style="background-color:#c1f5c1">
						<td><b>TOTAL</b></td>
						<td>&nbsp;</td>
						<td class="text-right"><b><?= $total_quantity ?></b></td>
						<td>&nbsp;</td>
						<td class="text-center"><b><?= number_format($total_price,2) ?></b></td>
						<td class="text-center"><a href="place-order.php" class="btn btn-success">Place Order(s)</a></td>
					</tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>