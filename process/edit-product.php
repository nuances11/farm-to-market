<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data

if (empty($_POST['productName']))
    $errors['name'] = 'Product Name field is required';

if (empty($_POST['productCategory']))
    $errors['category'] = 'Category field is required';

if (empty($_POST['productSubCategory']))
    $errors['subcategory'] = 'Sub Category field is required';

if (empty($_POST['productDescription']))
    $errors['description'] = 'Description field is required';

if (empty($_POST['productSKU']))
    $errors['sku'] = 'SKU field is required';

if (empty($_POST['productPrice']))
    $errors['price'] = 'Price field is required';

if (empty($_POST['productQuantity']))
    $errors['quantity'] = 'Quantity field is required';

if (empty($_POST['productMinQuantity']))
    $errors['minquantity'] = 'Minimum quantity field is required';

if (empty($_POST['productStatus']))
    $errors['status'] = 'Status field is required';


if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $id = $_POST['prod_id'];
    $name = $_POST['productName'];
    $category = $_POST['productCategory'];
    $subcategory = $_POST['productSubCategory'];
    $description = $_POST['productDescription'];
    $sku = $_POST['productSKU'];
    $price = $_POST['productPrice'];
    $quantity = $_POST['productQuantity'];
    $minquantity = $_POST['productMinQuantity'];
    $status = $_POST['productStatus'];
    $date = date("Y-m-d h:i:sa");
    $farmer = $_SESSION['id'];
	if($_POST['productFeatured']){
		$featured = $_POST['productFeatured'];
	}else{
		$featured = '0';
	}

    $sql = "UPDATE `tbl_products` SET `prod_name`='".$name."',`prod_category`='".$category."',`prod_subcategory`='".$subcategory."',`prod_description`='".$description."',`prod_sku`='".$sku."',`prod_price`='".$price."',`prod_quantity`='".$quantity."',`prod_minquantity`='".$minquantity."',`prod_status`='".$status."',`timestamp_update`='".$date."', `featured` = '".$featured."' WHERE id = '".$id."'";
        if ($conn->query($sql) === TRUE) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {
            $data['success'] = false;
        }

    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);