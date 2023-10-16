<?php
//We must include because we are extending Db.
require_once "Db.php";

class Category extends Db{

    public function fetch_category(){
        $sql = "SELECT * FROM category";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_category_name($catid){
        $sql = "SELECT cat_name FROM category WHERE cat_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(1, $catid, PDO::PARAM_INT);
        $stmt->execute();
        $catt = $stmt->fetch(PDO::FETCH_ASSOC);
        $catname = $catt["cat_name"];
        return $catname;   
    }

    

            // public function get_category_name($catid){
            //     $sql = "SELECT cat_name FROM category WHERE cat_id = ?";
            //     $stmt = $this->connect()->prepare($sql);
            //     $stmt->bindParam(1, $catid, PDO::PARAM_INT);
            //     $stmt->execute();
            
            // $catt = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //     if ($catt && is_array($catt) && array_key_exists('cat_name', $catt)) {
            //         return $catt['cat_name'];
            //     } else {
            //         return null;  // or handle the case where category is not found
            //     }
            // }
    
}




    // $cat = new Category();
    // print_r($cat->fetch_category());


?>