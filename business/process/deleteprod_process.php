<?php
error_reporting(E_ALL);
require_once "../classes/Product.php";


    if($_POST){
        if(isset($_POST['delete_btn'])){

            $product_id = $_POST['product_id'];

            $prod = new Product();
            $is_deleted = $prod->remove_prod($product_id);
                if($is_deleted){
                    //You can save deleted successfully inside SESSION and display on Productlist.php page
                    header("location:../productlist.php");
                    exit();
                }

        }

    }
        


?>