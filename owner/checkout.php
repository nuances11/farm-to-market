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
            if(isset($_SESSION["cart_session"])){
                foreach ($_SESSION["cart_session"] as $item){
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
				<?php
					if(isset($_SESSION["cart_session"])){
				?>
                <table id="order-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                        <tr style="background-color:#c1f5c1">
                            <!-- <th class="text-center">
                                <div class="checkbox-custom">
                                    <input id="checkAll" type="checkbox" value="option1">
                                    <label for="checkAll" class="pl-0">&nbsp;</label>
                                </div>
                            </th> -->
							<th>#</th>
                            <th><b>Product Name</b></th>
                            <th>SKU</th>
                            <th class="text-right"><b>Quantity</b></th>
                            <th class="text-center"><b>Unit Price</b></th>
                            <th class="text-center"><b>Total</b></th>
                            <th class="text-center"><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
					
					<?php
						$total_price = 0;
						$grand_total = 0;
						$total_quantity = 0;
						$i = 1;
						$s = 1;
							foreach ($_SESSION["cart_session"] as $item){
								$sql ="SELECT * FROM tbl_products WHERE id = '".$item['code']."'";
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
											<td><?= $i ?></td>
											<td><?= $row['prod_name'] ?></td>
											<td>
												<span class="label label-success"><?= $row['prod_sku'] ?></span>
											</td>
											<td class="text-right">
												<div class="prod_quantity" >
													<div class="update-form hidden" data-id="<?= $s ?>">
														<form action="addtocart.php" method="POST"><input type="hidden" name="product_id" value="<?= $row['id'] ?>">
															<input type="hidden" name="type" value="add">
															<input type="hidden" name="return_url" value="<?= $current_url ?>">
															<input type="submit" class="btn btn-outline btn-success" value="Update">
															<input type="number" name="product_qty" id="product_qty" value="<?= $item['quantity'] ?>" style="width:60px;height: 34px;padding: 6px 12px;line-height: 1.42857143;border: 1px solid #e6e6e6;">
														</form>
													</div>
													<span id="prod_val" data-id="<?= $s ?>"><?= $item['quantity'] ?></span>
												</div>
											</td>
											<td class="text-center">P&nbsp;&nbsp;<?= number_format($item["price"],2) ?></td>
											<td class="text-center">P&nbsp;&nbsp;<?= number_format($total_price,2) ?></td>
											<td class="text-center">
												<div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
													<a href="details.php?id=<?= $row['id'] ?>" type="button" class="btn btn-outline btn-primary">
														<i class="ti-eye"></i>
													</a>
													<button type="button" class="btn btn-outline btn-success update-item" id="" data-id="<?= $s ?>">
														<i class="ti-pencil"></i>
													</button>
													<a href="addtocart.php?removep=<?php echo $item["code"].'&return_url='.$current_url; ?>" class="btn btn-outline btn-danger"><i class="ti-trash"></i></a>
												</div>
												
											</td>
										</tr>
									<?php
									$i++;
									$s++;
									}
								}else{
									echo 'no product to display';
								}
							}
					?>
					
					<tr style="background-color:#c1f5c1">
						<td><b>TOTAL</b></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td class="text-right"><b><?= $total_quantity ?></b></td>
						<td>&nbsp;</td>
						<td class="text-center"><b>P&nbsp;&nbsp;<?= number_format($total_price,2) ?></b></td>
<<<<<<< HEAD
						<td class="text-center"><a href="#"  id="place-orders" class="btn btn-success">Place Order(s)</a></td>
=======
						<td class="text-center"><a href="#" class="btn btn-success" id="place-orders">Place Order(s)</a></td>
>>>>>>> caaac1226b2af203f49e92069d6367b95fa9c402
					</tr>
                        
                    </tbody>
				</table>
				<?php
					}else{
							echo 'No product to display. <a href="products.php">Click Here</a> to check the products.';
						}
				?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>