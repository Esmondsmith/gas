<?php
error_reporting(E_ALL);
require_once "../../business/classes/Business.php";


    if($_POST){
        if(isset($_POST['delete_btn'])){

            $biz_id = $_POST['biz_id'];

            $biz = new Business();
            $deleted = $biz->delete_biz($biz_id);
                if($deleted){
                    //You can save deleted successfully inside SESSION and display on Productlist.php page
                    header("location:../vendors_list.php");
                    exit();
                }

        }

    }
        


?>