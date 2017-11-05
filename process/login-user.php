<?php
// register.php
include_once '../config/constants.php';
include_once '../config/db.php';

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_POST['username']))
        $errors['username'] = 'Username is required';

    if (empty($_POST['password']))
        $errors['password'] = 'Password is required.';
    
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $sql = "SELECT * FROM tbl_user WHERE username = '".$_POST['username']."' AND password = '".md5($_POST['password'])."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['fullname'] = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
                    $_SESSION['user_type'] = $row['user_type'];
                    $_SESSION['email'] = $row['email'];

                    if ($row['user_type'] == 'Farmer') {
                        $data['user'] = 'Farmer';
                        //header("Location: " . BASE_URL . "/farmer/index.php");
                    }

                    if ($row['user_type'] == 'Owner') {
                        $data['user'] = 'Owner';
                        //header("Location: " . BASE_URL . "/owner/index.php");
                    }
                
            } else {
                $errors['login'] = 'Username or Password incorrect';
            }
    }
    


// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        $data['success'] = true;
        $data['message'] = 'Success!';

        
    }

    // return all our data to an AJAX call
    echo json_encode($data);