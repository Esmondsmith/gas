<?php
//We must include because we are extending Db.
require_once "Db.php";

class Category extends Db{

    public function add_cat($cat_name){
        $sql = "INSERT INTO category (cat_name) VALUES (?)";
        $stmt = $this -> connect()->prepare($sql);
        $stmt->bindparam(1, $cat_name, PDO::PARAM_STR);
        $result = $stmt->execute();
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function fetch_category(){
        $sql = "SELECT * FROM category";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function fetch_cat_details($cat_id){
        $sql = "SELECT * FROM category WHERE cat_id = ?";
        $stmt = $this -> connect()->prepare($sql);
        $stmt->bindparam(1, $cat_id, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        return $category;
    }


    public function delete_cat($cat_id){
        $sql = "DELETE FROM category WHERE cat_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(1, $cat_id, PDO::PARAM_INT);
        $is_deleted = $stmt->execute();
            return $is_deleted;
    }



}


        // $cat = new Category();
        // echo $cat->add_cat("55.6kg");


    // $cat = new Category();
    // print_r($cat->fetch_category());


?>