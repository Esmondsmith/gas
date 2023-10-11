<?php

session_start();
error_reporting(E_ALL);
include_once "../classes/Business.php";
include_once "../utilities/sanitizer.php";

    if($_POST){

        if(isset($_POST['business_reg_btn'])){

            $biz_name = sanitize($_POST['biz_name']);
            $biz_email = sanitize($_POST['biz_email']);
            $biz_phone = sanitize($_POST['biz_phone']);
            $biz_password = sanitize($_POST['biz_password']);
            $biz_pwd = sanitize($_POST['biz_pwd']); //confirm password
            $biz_address = sanitize($_POST['biz_address']);
            $biz_city = sanitize($_POST['biz_city']);
    
            $biz_type_id = $_POST['biz_type']; //select dd
            
            $biz_state_id = $_POST['state']; //select dd
            $biz_local_govt_id = $_POST['lga']; //select dd
    
            $biz_doc = $_FILES['biz_doc']; //file

            //Error check validation
            $file_error = $biz_doc["error"];
            if($file_error > 0){
             echo "Please upload a valid file";
             exit();
            }

            $file_size = $biz_doc["size"];
            if($file_size > 1048576){
                echo "Your file should not exceed 2MB";
                exit();
            }

            $allowed_extension = ["jpg", "png", "jpeg",];
            $filename = $biz_doc["name"];
            //Getting the file extesion the user uploaded
            $arrayfilename = explode(".",  $filename);
            $file_ext = end($arrayfilename);
                if(!in_array($file_ext, $allowed_extension)){ 
                echo "Select a valid extension";
                exit();
            }

            // ******************* FORM FIELDS VALIDATIONS ***************************

            if(empty($biz_name) || empty($biz_email) || empty($biz_phone) || empty($biz_password) || empty($biz_pwd) || empty($biz_address) || empty($biz_city)){
                //keep error message inside SESSION.
                $_SESSION['biz_reg_error'] = "All fields are required";
                header("location:../business_reg.php");
                exit();
            }  

            if($biz_password != $biz_pwd){
                $_SESSION['biz_reg_error'] = "Password donnot match";
                header("location:../business_reg.php");
                exit();
            }

            if(strlen($biz_password < 8)){
                $_SESSION['biz_reg_error'] = "Password MUST exceed 8 characters";
                header("location:../business_reg.php");
                exit();
            }

            $hashed_biz_password = password_hash($biz_password, PASSWORD_DEFAULT);

            $final_filename = "gas" . time() . "." . $file_ext;
            $destination = "../uploads/$final_filename";
            $tempname = $biz_doc["tmp_name"];
            $fileuploaded = move_uploaded_file( $tempname, $destination);
            if($fileuploaded){
            $business = new Business();
            $response = $business->register_business($biz_name, $biz_email, $biz_phone, $hashed_biz_password,  $final_filename, $biz_address, $biz_city, $biz_type_id, $biz_state_id, $biz_local_govt_id);
            // echo $response;
                if($response){
                    header('location:../biz_reg_success.php');
                    exit();
                }
            } 

        }

    }



?>