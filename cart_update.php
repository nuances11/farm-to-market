<?php
session_start();
include_once("../admin/actions/connection.php");

//empty cart by distroying current session
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
    $return_url = base64_decode($_GET["return_url"]); //return url
    session_destroy();
    header('Location:'.$return_url);
}

//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
    $product_id 	= filter_var($_POST["product_id"], FILTER_SANITIZE_STRING); //product code
    $product_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product code
    $return_url 	= base64_decode($_POST["return_url"]); //return url

    //MySqli query - get details of item from db using product code
    $results = $conn->query("SELECT product_name,product_price FROM products WHERE product_id ='".$product_id."' LIMIT 1");
    $obj = $results->fetch_object();

    if ($results) { //we have the product info

        //prepare array for the session variable
        $new_product = array(array('name'=>$obj->product_name, 'code'=>$product_id , 'quantity'=>$product_qty, 'price'=>$obj->product_price));

        if(isset($_SESSION["cart_session"])) //if we have the session
        {
            $found = false; //set found item to false

            foreach ($_SESSION["cart_session"] as $cart_itm) //loop through session array
            {
                if($cart_itm["code"] == $product_id){ //the item exist in array

                    $product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'quantity'=>$product_qty, 'price'=>$cart_itm["price"]);
                    $found = true;
                }else{
                    //item doesn't exist in the list, just retrive old info and prepare array for session var
                    $product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'quantity'=>$cart_itm["quantity"], 'price'=>$cart_itm["price"]);
                }
            }

            if($found == false) //we didn't find item in array
            {
                //add new user item in array
                $_SESSION["cart_session"] = array_merge($product, $new_product);
            }else{
                //found user item in array list, and increased the quantity
                $_SESSION["cart_session"] = $product;
            }

        }else{
            //create a new session var if does not exist
            $_SESSION["cart_session"] = $new_product;
        }

    }

    //redirect back to original page
    header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["cart_session"]))
{
    $product_id 	= $_GET["removep"]; //get the product code to remove
    $return_url 	= base64_decode($_GET["return_url"]); //get return url


    foreach ($_SESSION["cart_session"] as $cart_itm) //loop through session array var
    {
        if($cart_itm["code"]!=$product_id){ //item does,t exist in the list
            $product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'quantity'=>$cart_itm["quantity"], 'price'=>$cart_itm["price"]);
        }

        //create a new product list for cart
        $_SESSION["cart_session"] = $product;
    }

    //redirect back to original page
    header('Location:'.$return_url);
}

//Checkout

if (isset($_POST['checkout'])) {

    if (isset($_SESSION['cart_session'])){
        $item_code = $_POST['item_code'];
        $change = $_POST['input-change'];

        if ($change < 0) {
            ?>
            <script>
                alert('Cash input must be equal or greater than the TOTAL price.');
                window.location = "index.php";
            </script>

            <?php
        } else {

            $sql3 = "INSERT INTO transaction VALUES (NULL, now())";

            if ($conn->query($sql3) === TRUE) {

                $last_id = $conn->insert_id;

                foreach ($_SESSION["cart_session"] as $cart_itm) //loop through session array
                {
                    if ($cart_itm["code"] == $item_code) { //the item exist in array

                        $product[] = array('name' => $cart_itm["name"], 'code' => $cart_itm["code"], 'quantity' => $total_qty, 'price' => $cart_itm["price"]);
                        $found = true;
                    } else {
                        //item doesn't exist in the list, just retrive old info and prepare array for session var
                        $product[] = array('name' => $cart_itm["name"], 'code' => $cart_itm["code"], 'quantity' => $cart_itm["quantity"], 'price' => $cart_itm["price"]);
                    }

                    $sql = "SELECT * FROM products WHERE product_id = '" . $cart_itm["code"] . "'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $sql1 = "SELECT * FROM inventory WHERE product_id = '" . $cart_itm["code"] . "'";
                            $result1 = $conn->query($sql1);

                            if ($result1->num_rows > 0) {

                                while ($row1 = $result1->fetch_assoc()) {

                                    $update = $row1['stock_quantity'] - $cart_itm['quantity'];

                                    $sql2 = "UPDATE inventory SET stock_quantity = '" . $update . "' WHERE product_id= '" . $row['product_id'] . "'";

                                    if ($conn->query($sql2) === TRUE) {

                                        $sql4 = "INSERT INTO trans_per_product VALUES (NULL, '".$last_id."', '".$row1['product_id']."', '".$cart_itm['quantity']."')";

                                        if ($conn->query($sql4) === TRUE){

                                            $description = '<b>Sales Update!</b> Product is sold, transaction number is #'.$last_id;
                                            $type = "Sales Update";

                                            $insert_log = "INSERT INTO log VALUES (NULL, '".$type."', '".$description."', now(), 'Sales')";

                                            if ($conn->query($insert_log) === TRUE) {
                                                session_destroy();
                                                ?>
                                                <script>
                                                    alert('Transaction Successful');
                                                    window.location = "index.php";
                                                </script>
                                                <?php
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }else{
        ?>
        <script>
            alert('You need to add an item before checkout.');
            window.location = "index.php";
        </script>
        <?php
    }

}
?>

