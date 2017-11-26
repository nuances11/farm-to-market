<?php
// register.php
include_once '../config/constants.php';
include_once '../config/db.php';

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_POST['user_type']))
        $errors['user_type'] = 'User Type field is required';

    if (empty($_POST['username']))
        $errors['username'] = 'Name is required.';

    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';
    
    if (empty($_POST['fname']))
        $errors['fname'] = 'First Name is required.';
    
    if (empty($_POST['lname']))
        $errors['lname'] = 'Last Name is required.';

    if (empty($_POST['password']))
        $errors['password'] = 'Password is required';

    if ($_POST['password'] != $_POST['cpassword'])
        $errors['cpassword'] = 'Password did not match';

    if (empty($_POST['terms']))
        $errors['terms'] = 'You have to agree on the terms.';
    
    if (empty($_POST['gender']))
        $errors['gender'] = 'Gender is required.';
    
    if (empty($_POST['month']) || empty($_POST['day']) || empty($_POST['year']))
        $errors['birthday'] = 'Please enter valid date.';
    
    if (!is_numeric($_POST['contact']) || empty($_POST['contact']))
        $errors['contact'] = 'Please enter valid contact number';
    
    if (empty($_POST['barangay']))
        $errors['barangay'] = 'This address field is required';
    
    if (empty($_POST['city']))
        $errors['city'] = 'This address field is required';
    
    if (empty($_POST['province']))
        $errors['province'] = 'This address field is required';

    $sql1 = "SELECT username FROM tbl_user WHERE username = '".$_POST['username']."'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            $errors['usernameduplicate'] = 'Username already Exist';
        } else {
            $sql2 = "SELECT email FROM tbl_user WHERE email = '".$_POST['email']."'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                $errors['emailduplicate'] = 'Email already Exist';
            }
        }

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        $user_type = $_POST['user_type'];
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $birthday = $_POST['month'] . '-' . $_POST['day'] . '-' .$_POST['year'];
        $contact = $_POST['contact'];
        $street = $_POST['street'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $md5_hash = md5(time() + mt_rand(1, 99999999));
        $date = date("Y-m-d h:i:sa");

    
        $sql = "INSERT INTO tbl_user VALUES (NULL, '".$user."', '".$pass."', '".$email."', '".$user_type."', '".$fname."', '".$mname."', '".$lname."', '".$birthday."', '".$gender."', '".$contact."', '', '".$street."', '".$barangay."', '".$city."', '".$province."', '', '".$md5_hash."', '".$date."', '".$date."', '1')";
        if ($conn->query($sql) === TRUE) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {
            $data['success'] = false;
        }
            

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

        // show a message of success and provide a true success variable
        
    }

    // return all our data to an AJAX call
    echo json_encode($data);