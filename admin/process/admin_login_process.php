<?php
session_start();
error_reporting(E_ALL);
include_once "../classes/Admin.php";

if($_POST){
    if(isset($_POST['admin_btn'])){

        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];

        //Validate Email and Password fields not empty.
        if(empty($admin_email) || empty($admin_password)){
            $_SESSION["admin_error"] = "All fields are required";
            header("location:../admin_login.php");
            exit();
        }

        //Validation for if either email or password is wrong.
        $admin1 = new Admin();
        $response = $admin1->admin_login($admin_email, $admin_password);
        if($response){
            $_SESSION["admin_error"] = "Error, either email or password is incorrect";
            header("location:../admin_login.php");
            exit();
        }  


    }

} else {
    header("location: admin_login.php");
}





?>