<?php
error_reporting(E_ALL);
require_once "../../classes/User.php";


    if($_POST){
        if(isset($_POST['delete_btn'])){

            $user_id = $_POST['user_id'];

            $use = new User();
            $deleted = $use->delete_user($user_id);
                if($deleted){
                    //You can save deleted successfully inside SESSION and display on Productlist.php page
                    header("location:../users_list.php");
                    exit();
                }

        }

    }
        


?>