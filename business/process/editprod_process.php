<?php
error_reporting(E_ALL);

include_once "../classes/Product.php";

    if($_POST){

        if(isset($_POST[''])){
            //These are always passed as argument
            $product_name = $_POST["prod_name"];
            $product_price = $_POST["prod_price"];
            $product_desc = $_POST["prod_desc"];
            $product_id = $_POST["product_id"];


            //VALIDATION
            //Connect with the class method
            $bk = new Book();
            $updateproduct = $bk->update_product($product_name, $product_price, $product_desc, $product_id);

            if($updateproduct){
                header("location:../productlist.php");
                exit();
            } else {
                $url = "add_product.php?id=$product_id";
                header("location: $url");
                exit();
            }

        }


    } else {
        header("location: ../productlist.php");
    }


?>