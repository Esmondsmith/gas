<?php
//We must include because we are extending Db.
require_once "Db.php";

class Local extends Db{

    public function fetch_local_govt(){
        $sql = "SELECT * FROM local_govt";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }




}

    // $loc = new Local();
    // print_r($loc ->fetch_local_govt());






?>