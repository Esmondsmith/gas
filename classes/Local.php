<?php
//We must include because we are extending Db.
require_once "Db.php";

class Local extends Db{

    public function get_user_govt(){
        $sql = "SELECT * FROM local_govt";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result;

    }


}

    // $loc = new Local();
    // print_r($loc ->get_user_govt());






?>