<?php
    session_start();
    error_reporting(E_ALL);
    include_once "../utilities/sanitize.php";
    include_once "../classes/User.php";

        if(isset($_POST['passchange-btn'])){

                $oldpass = sanitize($_POST['oldpass']);
                $newpass1 = sanitize($_POST['newpass1']);
                $newpass2 = sanitize($_POST['newpass2']);

                echo "$oldpass";
            
        } 



    












    // if($_POST){

    //     if(isset($_POST['passchange-btn'])){
            
    //         $user_email = sanitize($_POST['login_email']);
    //         $user_password = sanitize($_POST['login_password']);

    //         if(empty($user_email) && empty($user_password)){
    //             $_SESSION['login_error'] = "Please fill all the fields";
    //             header("location:../user_login.php");
    //             exit();
    //         }

    //         $newuser = new User();
    //         $response = $newuser -> user_login($user_email, $user_password);
    //         if($response){
    //         $_SESSION['login_error'] = "Error, either email or password is incorrect";
    //         header("location:../user_login.php");
    //         exit();
    //         } 
    //     }


    // } else {
    //     header('location:../user_login.php');
    // }

?>