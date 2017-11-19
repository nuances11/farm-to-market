<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data

if (!is_numeric($_GET['id']))
    $errors['id'] = 'Product ID Required';

if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_products WHERE id = '".$id."'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: ' . BASE_URL . 'farmer/product-list.php?action=success');
    }
}
