<?php
//We must include because we are extending Db.
require_once "Db.php";

class State extends Db{

    public function get_user_state(){
        $sql = "SELECT * FROM state";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $states =  $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $states;

    }

    public function get_state_biz($state_id){
        $sql = "SELECT * FROM business WHERE biz_state_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindparam(1, $state_id, PDO::PARAM_INT);
        $stmt->execute();
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result;

    }


}

    // $sta = new State();
    // print_r($sta->get_user_state());






?>