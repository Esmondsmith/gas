<?php
// session_start(); 
error_reporting(E_ALL);

        include_once "Db.php";

    class Business extends Db{

        public $biz_name;
        public $biz_email;
        public $biz_phone;
        public $biz_password;
        public $biz_doc;
        public $biz_address;
        public $biz_city;
        public $biz_type_id;
        public $biz_state_id;
        public $biz_local_govt_id;

        //******************* REGISTER METHOD ********************
        public function register_business($biz_name, $biz_email, $biz_phone, $biz_password, $biz_doc, $biz_address, $biz_city, $biz_type_id, $biz_state_id, $biz_local_govt_id){
            //To check if the email already exist in the database.
            $sql = "SELECT * FROM business WHERE biz_email = ?";
            $stmt = $this -> connect() -> prepare($sql);
            //using ordinal to bind.
            $stmt->bindparam(1, $biz_email, PDO::PARAM_STR);
            $stmt->execute();
            //The rowCount() is used to check the database if such email already exist in it.
            $biz_count = $stmt->rowCount();
            //IF user_count is greater than 0, if means the user already exist in the DB.
            if($biz_count > 0){
                return "Error, email already exist";
                exit();
            }

            //If it passed this stage above, it means the email doesn't already exist. So we can now insert into DB Table to register as a new account.
            $sql = "INSERT INTO business(biz_name, biz_email, biz_phone, biz_password, biz_doc, biz_address,	biz_city, biz_type_id, biz_state_id, biz_local_govt_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt->bindparam(1, $biz_name, PDO::PARAM_STR);
            $stmt->bindparam(2, $biz_email, PDO::PARAM_STR);
            $stmt->bindparam(3, $biz_phone, PDO::PARAM_INT);
            $stmt->bindparam(4, $biz_password, PDO::PARAM_STR);
            $stmt->bindparam(5, $biz_doc, PDO::PARAM_STR);
            $stmt->bindparam(6, $biz_address, PDO::PARAM_STR);
            $stmt->bindparam(7, $biz_city, PDO::PARAM_STR);
            $stmt->bindparam(8, $biz_type_id, PDO::PARAM_STR);
            $stmt->bindparam(9, $biz_state_id, PDO::PARAM_STR);
            $stmt->bindparam(10, $biz_local_govt_name, PDO::PARAM_INT); // Supposed to be $biz_local_govt_id
            

                $business = $stmt->execute();
                return $business;       
        }


        //LOGIN METHOD
        public function biz_login($biz_email, $biz_password){
            $sql = "SELECT * FROM business WHERE biz_email = ?";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt->bindparam(1, $biz_email, PDO::PARAM_STR);
            $stmt->execute();
            $biz_count = $stmt->rowCount();
            //IF user_count is less than 1, it means the user email !DB.
            if($biz_count < 1){
                return "Error, email or password is incorrect!";
                exit();
            }

            //If email in DB, set SESSION.
            $biz = $stmt -> fetch(PDO::FETCH_ASSOC);
            //Check if password matches using password_verify(). This will return true or false.
            $password_match = password_verify($biz_password, $biz['biz_password']);
            //If password matches, then set SESSION to store if its either true or false. 
            if($password_match){
                $_SESSION["biz_id"] = $biz["biz_id"];
                header("location:../business_profile.php");
                exit();
            }
            //Else, return error message.
            return "Error, email or password is incorrect!";
            exit();
        }

        public function fetch_all_business(){
            $sql = "SELECT * FROM business";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $business = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $business;
        }


        //fetch states based on the state_id passed. This takes the state id
        public function fetch_business_state($state_id){
            $sql = "SELECT * FROM business WHERE biz_state_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $state_id, PDO::PARAM_INT);
            $stmt->execute();
            $states = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $states;
        }


        public function fetch_business_details($biz_id){
            $sql = "SELECT * FROM business WHERE biz_id = ?";
            $stmt = $this -> connect()->prepare($sql);
            $stmt->bindparam(1, $biz_id, PDO::PARAM_STR);
            $stmt->execute();
            $biz = $stmt->fetch(PDO::FETCH_ASSOC);
            return $biz;
        }

        
        //Business info method
        public function get_business_info($biz_id){
            $sql = "SELECT * FROM  business WHERE biz_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $biz_id, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->rowCount(); 
                if($count < 1){
                    return false;
                    exit();
                } else {
                    $bus = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $bus;
                }
        }


        public function get_state_name($stateid){
            $sql = "SELECT state_name FROM state WHERE state_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $stateid, PDO::PARAM_INT);
            $stmt->execute();
            $state = $stmt->fetch(PDO::FETCH_ASSOC);
            $statename = $state["state_name"];
            return $statename;
        }

        public function get_business_type($typeid){
            $sql = "SELECT type_name FROM business_type WHERE type_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $typeid, PDO::PARAM_INT);
            $stmt->execute();
            $type = $stmt->fetch(PDO::FETCH_ASSOC);
            $biz_type = $type["type_name"];
            return $biz_type;
        }


        public function upload_biz_img($biz_id, $biz_img){
            $sql = "UPDATE business SET biz_img = ? WHERE biz_id = ?";
            $stmt = $this -> connect()->prepare($sql);
            $stmt->bindparam(1, $biz_img, PDO::PARAM_STR);
            $stmt->bindparam(2, $biz_id, PDO::PARAM_INT);
            $response = $stmt->execute();
            if($response){
                return true;
            } else {
                return false;
            }
        }


        //get business method
        public function get_buiness($biz_id){
            $sql = "SELECT * FROM  business WHERE biz_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $biz_id, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->rowCount(); 
                if($count < 1){
                    return false;
                    exit();
                } else {
                //This mean the user exist, so we fetch it and return it
                    $biz->fetch(PDO::FETCH_ASSOC);
                    return $biz;           
                }
        }
        

            //Updating business
        public function update_biz_details($biz_name, $biz_phone, $biz_doc, $biz_address, $biz_city, $biz_type_id, $biz_state_id, $biz_local_govt_id, $biz_id){
            $sql = "UPDATE business SET biz_name = ?, biz_phone = ?, biz_doc = ?, biz_address = ?, biz_city = ?, biz_type_id =?, biz_state_id =?, biz_local_govt_id = ? WHERE biz_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $biz_name, PDO::PARAM_STR);
            $stmt->bindParam(2, $biz_phone, PDO::PARAM_STR);
            $stmt->bindParam(3, $biz_doc, PDO::PARAM_STR);
            $stmt->bindParam(4, $biz_address, PDO::PARAM_STR);
            $stmt->bindParam(5, $biz_city, PDO::PARAM_STR);
            $stmt->bindParam(6, $biz_type_id, PDO::PARAM_INT);
            $stmt->bindParam(7, $biz_state_id, PDO::PARAM_INT);
            $stmt->bindParam(8, $biz_local_govt_id, PDO::PARAM_INT);
            $stmt->bindParam(9, $biz_id, PDO::PARAM_INT);

             $biz_updated =  $stmt->execute();
             return $biz_updated;

        }


                    


    }

    // $biz22 = new Business();
    // print_r($biz22 -> get_state_name(2));

            // LOGING
            // $biz2 = new Business();
            // echo $biz2 -> biz_login("monday@gmail.com", "monday123");

            // $biz = new Business();
            // echo $biz->register_business("Marco Gas LTD", "marco@gmail.com", "09362415362", "marco1234", "marc.png", "allen ave, 2nd building", "Ikeja", 2, 5, 3);
        
    
?>