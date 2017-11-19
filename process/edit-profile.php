<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$response = array(); // array to pass back data

if (empty($_POST['username']))
    $errors['username'] = 'Username field is required';

if (empty($_POST['email']))
    $errors['email'] = 'Email field is required';

if (empty($_POST['fname']))
    $errors['firstname'] = 'Firstname field is required';

if (empty($_POST['mname']))
    $errors['middlename'] = 'Middlename field is required';

if (empty($_POST['lname']))
    $errors['lastname'] = 'Last Name field is required';

if (empty($_POST['contact']))
    $errors['contact'] = 'Contact field is required';

if (empty($_POST['add_barangay']))
    $errors['barangay'] = 'Barangay field is required';

if (empty($_POST['add_city']))
    $errors['city'] = 'City field is required';

if (empty($_POST['add_province']))
    $errors['province'] = 'Province field is required';


if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $response['success'] = false;
    $response['errors'] = $errors;
} else {

    $user = $_POST['username'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $street = $_POST['add_street'];
    $barangay = $_POST['add_barangay'];
    $city = $_POST['add_city'];
    $province = $_POST['add_province'];
    $date = date("Y-m-d h:i:sa");
    $farmer = $_SESSION['id'];

    $update = "UPDATE `tbl_user` SET `username`='".$user."',`email`='".$email."',`first_name`='".$fname."',`middle_name`='".$mname."',`last_name`='".$lname."',`phone`='".$contact."',`add_street`='".$street."',`add_barangay`='".$barangay."',`add_city`='".$city."',`add_province`='".$province."',`timestamp_update`='".$date."' WHERE id = '".$farmer."'";
    if ($conn->query($update) === TRUE) {
            $response['success'] = true;
            $response['message'] = 'Success!';
        } else {
            $response['success'] = false;
        }
}
echo json_encode($response);