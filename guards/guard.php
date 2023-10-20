<?php
//Middleware is software that lies between an operating system and the applications running on it 
//Check if someone is not logged in.
//How can we know? User ID will not be in SESSION
//So, redirect them back to login page.
if(!isset($_SESSION['user_id'])){
    header("location:user_login.php");
    exit();
}



?>