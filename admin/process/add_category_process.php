<?php
session_start();
require_once "../classes/Category.php";

if($_POST){

   if(isset($_POST['addcat'])){

      $addcat = $_POST['add_cat'];    
       
      if(empty($addcat)){
         $_SESSION['add_error'] = "Please input a category";
         header("location:../add_category.php");
         exit();
      };

      if($addcat){
         $cate = new Category();
         $category = $cate->add_cat($addcat);
         if($category){
             header('location:../categorylist.php');
         }
      } 

   } 

}






?>