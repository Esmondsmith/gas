<?php
error_reporting(E_ALL);

    include_once "config.php";
        
    class Db{

        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPassword = DB_PASS;
        private $dbName = DB_NAME;


        public $con;

        public function connect(){
            //PDO class takes 3 argument 
            $dsn = "mysql:localhost=$this->dbHost;dbname=$this->dbName";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try{
                $this -> con = new PDO($dsn, $this->dbUser, $this->dbPassword, $options);
            }catch(Exception $e){
                echo $e->getMessage();
            }
                return $this->con;
        }
    }
            // $connection = new Db();
            // var_dump($connection -> connect());

?>