<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data

if (!is_numeric($_GET['id']))
    $errors['id'] = 'Provide Transaction ID';

if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $id = $_GET['id'];
	$total_qty = 0;
	$chk = "SELECT * FROM tbl_trans_per_product WHERE trans_id = '".$id."'";
	$reschk = $conn->query($chk);
	if($reschk->num_rows > 0){
		$update = $reschk->fetch_assoc();
			
		$prod = "SELECT * FROM tbl_products WHERE prod_sku = '".$update['prod_sku']."'";
		$resprod = $conn->query($prod);
		if($resprod->num_rows > 0){
			$prod = $resprod->fetch_assoc();
			
			$total_qty = $prod['prod_quantity'] - $update['prod_total_qty'];
			
			$trans = "UPDATE tbl_products SET prod_quantity = '".$total_qty."'";
			if ($conn->query($trans) === TRUE) { 
				$sql = "UPDATE `tbl_transactions` SET `status`='1' WHERE id = '".$id."'";
				if ($conn->query($sql) === TRUE) {
					$data['success'] = true;
					$data['message'] = 'Success!';
				} else {
					$data['success'] = false;
				}
			}
		}
	}
 
}

echo json_encode($data);