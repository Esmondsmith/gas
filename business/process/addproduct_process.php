<?php
session_start();
require_once "../classes/Product.php";

 if($_POST){
    if(isset($_POST['addprod-btn'])){

        $prod_name = $_POST['prod_name'];
        $prod_price = $_POST['prod_price'];
        $prod_desc = $_POST['prod_desc'];
        $prod_cat_id = $_POST['prod_category'];
        $prod_biz_id = $_POST['prod_biz'];

        $prod_image = $_FILES['prod_image'];

      

        //validation below to make sure you upload a file
        $file_error = $prod_image["error"];
        if($file_error > 0){
            $_SESSION['upload_error'] = "Choose a file to upload";
            header("location:../add_product.php");
            exit();
        }
      
        $file_size = $prod_image["size"];
        if($file_size > 1048576){
            $_SESSION['upload_error'] = "Your file should not exceed 2MB";
            header("location:../add_product.php");
            exit();
        }

        $allowed_extension = ["jpg", "png", "jpeg"];
        $filename = $prod_image["name"];
        //Getting the file extesion the user uploaded
        $arrayfilename = explode(".",  $filename);
        $file_ext = end($arrayfilename);
        // echo $file_ext;
        if(!in_array($file_ext, $allowed_extension)){
            $_SESSION['upload_error'] = "Please choose a valid file extension";
            header("location:../add_product.php");
            exit();
        }


        $final_filename = "gas" . time() . "." . $file_ext;

        $destination = "../uploads/$final_filename";
        $tempname = $prod_image["tmp_name"];

        $fileuploaded = move_uploaded_file( $tempname, $destination);

        if($fileuploaded){
            $prod = new Product();
            $response = $prod->add_product($prod_name, $prod_price, $prod_desc, $final_filename, $prod_cat_id, $prod_biz_id);
            // echo $response;
            if($response){
                // echo "Product added successfully";
                header('location:../productlist.php'); //This inserted book to the booklist
            }
        } 
       

    }


 }






?>