<?php
error_reporting(E_ALL);

include_once "../classes/User.php";

    if($_POST){

        if(isset($_POST['user_update'])){
            //These are always passed as argument
            $user_fullname = $_POST["user_fullname"];
            $user_phone = $_POST["user_phone"];
            $user_address = $_POST["user_address"];
            $user_city = $_POST["user_city"];
            $state = $_POST["state"];
            $lga = $_POST["lga"]; 
            $user_id = $_POST["user_id"]; 


            //VALIDATION
            //Connect with the class method
            $use = new User();
            $update_user = $use->update_user_details($user_fullname, $user_phone, $user_address, $user_city, $user_state_id, $user_local_govt_id, $user_id);

            if($update_user){
                header("location:../user_profile.php");
                exit();
            } else {
                $url = "user_register.php?id=$user_id";
                header("location:$url");
                exit();
            
            }


            

        }








    } else {
        header("location: ../booklist.php");
    }




?>