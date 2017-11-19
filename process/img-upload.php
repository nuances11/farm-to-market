<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';
$filename = basename($_FILES["product_img"]["name"]);
$target_dir = "../build/images/products/";
$target_file = $target_dir . basename($_FILES["product_img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["product_img"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["product_img"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["product_img"]["name"]). " has been uploaded.";
        $sql = "SELECT * FROM tbl_products WHERE id = '".$_GET['id']."'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
                $update = "UPDATE tbl_products SET prod_image = '".$filename."' WHERE id = '".$_GET['id']."'";
                
                if ($conn->query($update) === TRUE) {
                    echo "Record updated successfully";
                }
        }

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>