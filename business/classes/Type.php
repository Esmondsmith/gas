<?php
//We must include because we are extending Db.
require_once "Db.php";

class Type extends Db{

    public function fetch_business_type(){
        $sql = "SELECT * FROM business_type";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }




}

    // $type = new Type();
    // print_r($type->fetch_business_type());






?>