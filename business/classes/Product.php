<?php
require_once "Db.php";

class Product extends Db{

        //To add product
        public function add_product($product_name, $product_price, $product_desc, $product_image, $product_cat_id, $product_biz_id){
            $sql = "INSERT INTO products(product_name, product_price, product_desc, product_image, product_cat_id, product_biz_id) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this -> connect()->prepare($sql);
            $stmt->bindparam(1, $product_name, PDO::PARAM_STR);
            $stmt->bindparam(2, $product_price, PDO::PARAM_INT);
            $stmt->bindparam(3, $product_desc, PDO::PARAM_STR);
            $stmt->bindparam(4, $product_image, PDO::PARAM_STR);
            $stmt->bindparam(5, $product_cat_name, PDO::PARAM_INT);
            $stmt->bindparam(6, $product_biz_name, PDO::PARAM_INT);
            
            $result = $stmt->execute();
            if($result){
                return true;
            } else {
                return false;
            }
        }

        //To fetch all products.
        public function fetch_all_products(){
            $sql = "SELECT * FROM products";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $prod;
        }

        
        //VENDORS_INFO
        //New method to target product biz id
        public function fetch_biz_products($product_biz_id){
            $sql = "SELECT * FROM products WHERE product_biz_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $product_biz_id, PDO::PARAM_INT);
            $stmt->execute();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product;
        //New method to target product biz id
        }


        //Product details method
        public function get_prod_details($product_id){
            $sql = "SELECT * FROM  products WHERE product_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $product_id, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->rowCount(); 
                if($count < 1){
                    return false;
                    exit();
                } else {
                //This mean the product exist, so we fetch it and return it
                    $prod = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $prod;
                }
        }

        
        //Updating product
        public function update_product($product_name, $product_price, $product_desc, $product_id){
            $sql = "UPDATE products SET product_name = ?, product_price = ?, product_desc = ? WHERE product_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $product_name, PDO::PARAM_STR);
            $stmt->bindParam(2, $product_price, PDO::PARAM_INT);
            $stmt->bindParam(3, $product_desc, PDO::PARAM_STR);
            $stmt->bindParam(4, $product_id, PDO::PARAM_INT);

            $update =  $stmt->execute();
            return $update;
        }


        public function remove_prod($product_id){
            $sql = "DELETE FROM products WHERE product_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $product_id, PDO::PARAM_INT);
            $is_deleted = $stmt->execute();
                return $is_deleted;

        }


}
//class end!

            // $prd = new Product();
            // echo $prd->add_product("cookinggas", 4200, "gas for all", "gas.png", 3, 1);


?>