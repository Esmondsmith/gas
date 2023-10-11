<?php
error_reporting(E_ALL);

include_once "../classes/Business.php";

    if($_POST){

        if(isset($_POST['updatebiz_btn'])){
            //These are always passed as argument
            $biz_name = $_POST["biz_name"];
            $biz_phone = $_POST["biz_phone"];
            $biz_address = $_POST["biz_address"];
            $biz_city = $_POST["biz_city"];
            $biz_doc = $_POST["biz_doc"];
            $biz_type = $_POST["biz_type"];
            $state = $_POST["state"];
            $lga = $_POST["lga"]; 
            $biz_id = $_POST["biz_id"]; 



            //VALIDATION
            //Connect with the class method
            $business = new Business();
            $update_biz = $business->update_biz_details($biz_name, $biz_phone, $biz_address, $biz_city, $biz_doc, $biz_type, $state, $lga, $biz_id);

            if($update_biz){
                header("location:../business_profile.php");
                exit();
            } else {
                $url = "business_reg.php?id=$biz_id";
                header("location:$url");
                exit();
            
            }


            

        }








    } else {
        header("location: ../booklist.php");
    }




?>