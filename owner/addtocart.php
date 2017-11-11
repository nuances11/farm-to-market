<?php
session_start();
$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data
$return_url = base64_decode($_POST["return_url"]); //return url
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tbl_products WHERE id='" . $_POST["prod_id"] . "'");
			$itemArray = array($productByCode[0]["id"]=>array('name'=>$productByCode[0]["prod_name"], 'id'=>$productByCode[0]["id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["prod_price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
            }
            $data['success'] = true;
			$data['message'] = 'Success!';
			header('Location:'.$return_url);
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
            }
            $data['success'] = true;
			$data['message'] = 'Success!';
			header('Location:'.$return_url);
		}
	break;
}
}

if(isset($_GET['action']) && isset($_GET['return_url']) && $_GET['id']){
	if($_GET['action'] == "remove"){
		$return_url = base64_decode($_GET["return_url"]); //return url
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
            }
            $data['success'] = true;
			$data['message'] = 'Success!';
			header('Location:'.$return_url);
		}
	}
}

if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
    $return_url = base64_decode($_GET["return_url"]); //return url
	unset($_SESSION["cart_item"]);
	$data['success'] = true;
	$data['message'] = 'Success!';
    header('Location:'.$return_url);
}
echo json_encode($data);
?>