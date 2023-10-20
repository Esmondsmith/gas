<?php
error_reporting(E_ALL);
require_once "../classes/Product.php";


    if($_POST){
        if(isset($_POST['delete_btn'])){

            $order_id = $_POST['order_id'];

            $ord = new Product();
            $is_deleted = $ord->deleteorder($order_id);
                if($is_deleted){
                    //You can save deleted successfully inside SESSION and display on Productlist.php page
                    header("location:../orderlist.php");
                    exit();
                }

        }

    }
        


?>