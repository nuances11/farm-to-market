<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data

if (empty($_POST['cat-name']))
$errors['catname'] = 'Category Name field is required';

if (empty($_POST['identifier']))
$errors['identifier'] = 'Identifier field is required';

if (!empty($_POST['identifier'])){
    $chkid = "SELECT * FROM tbl_category WHERE category_identifier = '".$_POST['identifier']."'";
    $chkres = $conn->query($chkid);
    if ($chkres->num_rows > 0) {
        $errors['duplicate'] = 'Identifier Already Exist!';
    }
}


if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
}else{

    $name = $_POST['cat-name'];
    $identifier = $_POST['identifier'];
    $status = $_POST['status'];
    $date = date("Y-m-d h:i:sa");

    
    $sql = "INSERT INTO tbl_category VALUES (NULL, '".$name."', '".$identifier."', '".$status."', '".$date."', '".$date."')";
    if ($conn->query($sql) === TRUE) {
        $data['success'] = true;
        $data['message'] = 'Success!';
    } else {
        $data['success'] = false;
    }
}
echo json_encode($data);
?>