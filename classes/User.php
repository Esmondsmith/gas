<?php
// session_start();
error_reporting(E_ALL);

        require_once "Db.php";

    class User extends Db{

        public $user_fullname;
        public $user_email;
        public $user_password;
        public $user_phone;
        public $user_address;
        public $user_city;
        public $user_state_id;
        public $user_local_govt_id;

        //REGISTER METHOD
        public function register_user($user_fullname, $user_email, $user_password, $user_phone, $user_address, $user_city, $user_state_id, $user_local_govt_id){
            //To check if the email already exist in the database.
            $sql = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this -> connect() -> prepare($sql);
            //using ordinal to bind.
            $stmt->bindparam(1, $user_email, PDO::PARAM_STR);
            $stmt->execute();
            //The rowCount() is used to check the database if such email already exist in it.
            $user_count = $stmt->rowCount();
            //IF user_count is greater than 0, if means the user already exist in the DB.
            if($user_count > 0){
                return "Error, email already exist";
                exit();
            }

            //If it passed this stage above, it means the email doesn't exist. So we can now insert into DB Table.
            $sql = "INSERT INTO users(user_fullname, user_email, user_password, user_phone, user_address, user_city, user_state_id, user_local_govt_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this -> connect() -> prepare($sql);
            $stmt->bindparam(1, $user_fullname, PDO::PARAM_STR);
            $stmt->bindparam(2, $user_email, PDO::PARAM_STR);
            $stmt->bindparam(3, $user_password, PDO::PARAM_STR);
            $stmt->bindparam(4, $user_phone, PDO::PARAM_INT);
            $stmt->bindparam(5, $user_address, PDO::PARAM_STR);
            $stmt->bindparam(6, $user_city, PDO::PARAM_STR);
            $stmt->bindparam(7, $user_state_name, PDO::PARAM_INT);
            $stmt->bindparam(8, $user_local_govt_name, PDO::PARAM_INT);

                $insert_user = $stmt -> execute();
                return $insert_user;       
        }

        

        //LOGIN METHOD FOR USER
        //If email !DB
        public function user_login($user_email, $user_password){
           $sql = "SELECT * FROM users WHERE user_email = ?";
           $stmt = $this -> connect() -> prepare($sql);
           $stmt->bindparam(1, $user_email, PDO::PARAM_STR);
           $stmt->execute();
           $user_count = $stmt->rowCount();
           if($user_count < 1){
               return "Wrong email!";
               exit();
            } 

               //If email in DB, set SESSION.
               $user = $stmt->fetch(PDO::FETCH_ASSOC);
               $password_match = password_verify($user_password, $user['user_password']);
               //If password matches, then set SESSION to store if its either true or false. 
               if($password_match){
                   $_SESSION["user_id"] = $user["user_id"];
                   header("location:../user_profile.php");
                   exit();
                }
                    //Else, return error message.
                    return "Error, password not correct";
                    exit();
        }    


         //FETCHING USER DETAILS
        public function fetch_user_details($user_id){
            $sql = "SELECT * FROM users WHERE user_id = ?";
            $stmt = $this -> connect()->prepare($sql);
            $stmt->bindparam(1, $user_id, PDO::PARAM_STR);
            $stmt->execute();
            $user_details = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user_details;
        }


        //UPLOAD PROFILE IMAGE
        //Here, the user has an account already and just updating it.
        public function upload_profile_image($user_id, $user_img){
            $sql = "UPDATE users SET user_img = ? WHERE user_id = ?";
            $stmt = $this -> connect()->prepare($sql);
            $stmt->bindparam(1, $user_img, PDO::PARAM_STR);
            $stmt->bindparam(2, $user_id, PDO::PARAM_INT);
            $response = $stmt->execute();
            if($response){
                return true;
            } else {
                return false;
            }
        }


         //users method
        public function get_user($user_id){
            $sql = "SELECT * FROM  users WHERE user_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->rowCount(); 
                if($count < 1){
                    return false;
                    exit();
                } else {
                //This mean the user exist, so we fetch it and return it
                    $user->fetch(PDO::FETCH_ASSOC);
                    return $user;           
                }
        }
        

            //Updating users
        public function update_user_details($user_fullname, $user_phone, $user_address, $user_city, $user_state_id, $user_local_govt_id, $user_id){
            $sql = "UPDATE users SET user_fullname = ?, user_phone = ?, user_address = ?, user_city = ?, user_state_id = ?, user_local_govt_id = ? WHERE user_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $user_fullname, PDO::PARAM_STR);
            $stmt->bindParam(2, $user_phone, PDO::PARAM_STR);
            $stmt->bindParam(3, $user_address, PDO::PARAM_STR);
            $stmt->bindParam(4, $user_city, PDO::PARAM_STR);
            $stmt->bindParam(5, $user_state_id, PDO::PARAM_INT);
            $stmt->bindParam(6, $user_local_govt_id, PDO::PARAM_INT);
            $stmt->bindParam(7, $user_id, PDO::PARAM_INT);

             $user_updated =  $stmt->execute();
             return $user_updated;

        }

        
    }

            // $user2 = new User();
            // echo $user2 -> user_login("sunday@gmail.com", "sunday123");
    
            // $user2 = new User();
            // echo $user2 -> register_user("Damon Phil", "nadike@gmail.com", "natnat123", 876787800, "Jakes road, off 17th street", "Ikoyi", 5, 2);

            // FETCH USER DETAILS
            // $user2 = new User();
            // print_r($user2->fetch_user_details(61));
                
    
?>