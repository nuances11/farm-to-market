<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data
$e = array();
    $category = $_GET['id'];

    $sql = "SELECT * FROM tbl_sub_category WHERE category_id = '".$category."'";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $e['sub_cat_id'] = $row['id'];
                $e['sub_cat_name'] = $row['sub_category_name'];
                $e['sub_cat_identifier'] = $row['sub_category_identifier'];
                $e['rows'] = $result->num_rows;
                $e['success'] = true;
                $e['message'] = 'Success!';
                array_push($data, $e);
            }
            
        } else {
            $data['success'] = false;
        }
        echo json_encode($data);