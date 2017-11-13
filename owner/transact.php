<?php
session_start();
include_once '../config/db.php';


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
					
				}
				
			}
			
			
		}
	}

}


?>

