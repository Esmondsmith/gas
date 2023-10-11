<?php
error_reporting(E_ALL);

require_once "classes/Product.php";

// $prod = new Product();
// $product = $prod->fetch_biz_products($product_biz_id);



// echo "<pre>"; 
//   print_r($product);
//   echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business product list</title>
</head>
<body>
    <h1>All available products</h1>

    <table border="1">
        <tr>
            <th>S/N</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Category</th>
            <th>Product Description</th>
      </tr>
     <?php

     for($x=0;$x<count($product);$x++){

    
       echo"<tr>";
         
          foreach($product[$x] as $pr ){
            echo "<td>" .$pr. "</td>";
          }
        
       echo"</tr>";
    }
     ?>
    </table>

    
    
</body>
</html>