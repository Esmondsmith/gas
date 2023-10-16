<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Product.php";

// include_once "../utilities/sanitize.php";

if($_POST){

    if(isset($_POST["order_btn"])){

        $order_name = $_POST["order_name"];
        $order_address = $_POST["order_address"];
        $order_phone = $_POST["order_phone"];
        $order_qty = $_POST["order_qty"];
        $order_product_id = $_POST["order_product_id"];

        if(empty($order_name) || empty($order_address) || empty($order_phone) || empty($order_qty)){
            $_SESSION['order_error'] = "All fields are required";
            header("location:../order.php");
            exit();
        } else {
            $order = new Product();
            $response = $order->add_order($order_name, $order_address, $order_qty, $order_phone, $order_product_id);
            if($response){
                header("location:../order_success.php");
            exit();
            }
        }

        
        
    } 




}

?>