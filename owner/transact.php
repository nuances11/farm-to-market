<?php
session_start();
include_once '../config/db.php';
$data = array();

if(isset($_SESSION["cart_session"])){ //if we have the session

	$trans = "INSERT INTO tbl_transactions VALUES(NULL, NOW(), '".$_SESSION['id']."')";
	
	if ($conn->query($trans) === TRUE) {

		$last_id = $conn->insert_id;
		$updated_qty = 0;
		$total_price = 0;
		$total_quantity = 0;
		
		foreach ($_SESSION["cart_session"] as $cart_itm) //loop through session array
		{
			$chk_stock = "SELECT * FROM tbl_products WHERE id = '".$cart_itm["code"]."'";
			$res_result = $conn->query($chk_stock);
			
			if($res_result->num_rows > 0 ){
				while($new_stock = $res_result->fetch_assoc()){
					$updated_qty = $new_stock['prod_quantity'] - $cart_itm["quantity"];
					$total_price = $new_stock['prod_price'] * $cart_itm["quantity"];
					
					//update product stock
					$update_stock = "UPDATE tbl_products SET prod_quantity = '".$updated_qty."' WHERE id = '".$new_stock['id']."'";
					if ($conn->query($update_stock) === TRUE) {
						
						$tpp = "INSERT INTO tbl_trans_per_product VALUES(NULL, '".$last_id."', '".$new_stock['prod_name']."', '".$new_stock['prod_sku']."', '".$cart_itm['quantity']."', '".$new_stock['prod_price']."', '".$total_price."', '".$_SESSION['id']."', '".$new_stock['farmer_id']."')";
						if ($conn->query($tpp) === TRUE) {
							$data['success'] = true;
							$data['trans_id'] = $last_id;
							unset($_SESSION["cart_session"]);
						}

					}
				}
				
			}
			
			
		}
	}

}

echo json_encode($data);
?>
