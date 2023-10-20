<?php
session_start(); 
error_reporting(E_ALL);
include_once "Db.php";

    class Admin extends Db{

        public $admin_email;
        public $admin_password;
        
        //LOGIN METHOD FOR ADMIN
           //If email !DB, return error message.
        public function admin_login($user_email, $user_password){
                //First check if the email is in the DB.
               $sql = "SELECT * FROM admin WHERE admin_email = ?";
               $stmt = $this -> connect() -> prepare($sql);
               //using ordinal to bind.
               $stmt->bindparam(1, $user_email, PDO::PARAM_STR);
               $stmt->execute();
               $user_count = $stmt->rowCount();
               //IF user_count is less than 1, if means the user email !DB.
               if($user_count < 1){
                   return "Wrong email or password!";
                   exit();
                } 

                $admin = $stmt -> fetch(PDO::FETCH_ASSOC);
                if($user_password == $admin['admin_password']){
                    $_SESSION["admin_id"] = $admin["admin_id"];
                    header("location:../admin_profile.php");
                    exit();
                }
                //Else, return error message.
                return "Error, incorrect password or email!";
                exit();
        }    

        public function deleteorder($order_id){
            $sql = "DELETE FROM orders WHERE order_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindparam(1, $order_id, PDO::PARAM_INT);
            $is_deleted = $stmt->execute();
                return $is_deleted;
        }


    }

        
    
?>