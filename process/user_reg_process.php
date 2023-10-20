<?php
    session_start();
    error_reporting(E_ALL);
    include_once "../classes/User.php";
    include_once "../utilities/sanitize.php";
    // require_once "../classes/Address.php";


    if($_POST){

        if(isset($_POST['user_reg_btn'])){
            $user_fullname = sanitize($_POST['user_fullname']);
            $user_phone = sanitize($_POST['user_phone']);
            $user_email = sanitize($_POST['user_email']);
            $user_password = sanitize($_POST['user_password']);
            $confirm_pass = sanitize($_POST['user_pass']);
            $user_address = sanitize($_POST['user_address']);
            $user_city = sanitize($_POST['user_city']);
            $user_state_id = $_POST['state'];
            $user_local_govt_id = $_POST['lga'];


            //REQUIRED VALIDATIONS

            //check if any field is empty
            if(empty($user_fullname) || empty($user_phone) || empty($user_email) || empty($user_password) || empty($confirm_pass) || empty($user_address)|| empty($user_city)){
                //keep error message inside SESSION.
                //This error message can be used to check for similar form error
                $_SESSION['reg_error'] = "All fields are required";
                header("location:../user_register.php");
                exit();
            }

            //checking if password and confirm_pass are same.
            if($user_password != $confirm_pass){
                $_SESSION['reg_error'] = "Password donnot match";
                header("location:../user_register.php");
                exit();
            }

            //validating password length with strlen();
            if(strlen($user_password < 8)){
                $_SESSION['reg_error'] = "Password MUST exceed 8 characters";
                header("location:../user_register.php");
                exit();
            }
            
            //hashing the password
            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
            $user_reg = new User();
            $response = $user_reg -> register_user($user_fullname, $user_email, $hashed_password, $user_phone, $user_address, $user_city, $user_state_id, $user_local_govt_id);

            if($response){
                header("location:../reg_sucess.php");
            } else {
                echo "Error";
            }


        }



    } else {
        header('location:../user_register.php');
    }


?>
