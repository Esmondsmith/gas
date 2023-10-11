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


}

    // $cat = new Category();
    // print_r($cat->fetch_category());


?>