<?php
    error_reporting(E_ALL);

    include_once "Db.php";

    //Method to fetch all states
    class Address extends Db{

            public function fetch_all_states(){
                $sql= "SELECT * FROM state";
                $stmt=$this->connect()->prepare($sql);
                $stmt->execute();
                $states = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $states;
            } 

                //fetch lga based on the state_id passed. This takes the state id
            public function fetch_lga($state_id){
                $sql = "SELECT * FROM local_govt WHERE local_govt_state_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindparam(1, $state_id, PDO::PARAM_INT);
                $stmt->execute();
                $lg_area = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $lg_area;
            }
        
    }

?>