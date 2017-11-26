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

    $sql = "UPDATE `tbl_transactions` SET `status`='2' WHERE id = '".$id."'";
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