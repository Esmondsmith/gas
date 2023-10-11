<?php
error_reporting(E_ALL);
require_once "../classes/Category.php";


    if($_POST){
        if(isset($_POST['delete_btn'])){

            $cat_id = $_POST['cat_id'];

            $cate = new Category();
            $deleted = $cate->delete_cat($cat_id);
                if($deleted){
                    //You can save deleted successfully inside SESSION and display on Productlist.php page
                    header("location:../categorylist.php");
                    exit();
                }

        }

    }
        


?>