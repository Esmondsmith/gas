
<?php
session_start();
error_reporting(E_ALL);
include_once "../classes/Business.php";

    if($_POST){

        if(isset($_POST['biz_login_btn'])){

           $login_email = $_POST['biz_login_email'];
           $login_password = $_POST['biz_login_pass'];

           if(empty($login_email) || empty($login_password)){
            $_SESSION['login_error'] = "Please fill all fields";
            header("location:../business_login.php");
            exit();
            }

            $biz1 = new Business();
            $response = $biz1->biz_login($login_email, $login_password);
            if($response){
            $_SESSION['login_error'] = "Error, either email or password is incorrect";
            header("location:../business_login.php");
            exit();
            } 


        }

    } else {
        header("location: business_login.php");
    }













// if($_POST){

//     if(isset($_POST['login_btn'])){
//        //Fecth form values
//        $user_email = $_POST['login_email'];
//        $user_password = $_POST['login_password'];

//        //Validate Email and Password fields not empty.
//         if(empty($user_email) || empty($user_password)){
//         $_SESSION['login_error'] = "All fields are required";
//         header("location:../login.php");
//         exit();
//         }

//         //Validation for if either email or password is wrong.
//         $user1 = new User();
//         $response = $user1 -> login_user($user_email, $user_password);
//         if($response){
//         $_SESSION['login_error'] = "Error, either email or password is incorrect";
//         header("location:../login.php");
//         exit();
//         }        

//     }

// } else {
//     header('location:../login.php');
// }


?>