<?php
session_start();
include_once '../config/constants.php';
include_once '../config/db.php';

$errors = array(); // array to hold validation errors
$response = array(); // array to pass back data

if(!empty($_POST['oldpass'])){
    $chkpass = "SELECT * FROM tbl_user WHERE id = '".$_SESSION['id']."' AND password = '".md5($_POST['oldpass'])."'";
    $chkres = $conn->query($chkpass);
    
    if ($chkres->num_rows < 1) {
        $errors['invalid'] = 'Invalid Password';
    }
}


if (empty($_POST['oldpass']))
    $errors['oldpass'] = 'Old Password field is required';

if (empty($_POST['newpass']))
    $errors['newpass'] = 'New Password field is required';

if($_POST['newpass'] != $_POST['cpass'])
    $errors['cpass'] = 'Password not matched';

if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $response['success'] = false;
    $response['errors'] = $errors;
} else {

    $oldpass = $_POST['oldpass'];
    $newpass = md5($_POST['newpass']);

    $date = date("Y-m-d h:i:sa");
    $farmer = $_SESSION['id'];

    $update = "UPDATE `tbl_user` SET `password`='".$newpass."',`timestamp_update`='".$date."' WHERE id = '".$farmer."'";
    if ($conn->query($update) === TRUE) {
            $response['success'] = true;
            $response['message'] = 'Success!';
        } else {
            $response['success'] = false;
        }
}
echo json_encode($response);