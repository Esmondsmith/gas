<?php
//We must include because we are extending Db.
require_once "Db.php";

class State extends Db{

    public function fetch_state(){
        $sql = "SELECT * FROM state";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }
}

    // $sta = new State();
    // print_r($sta->fetch_state());




?>





