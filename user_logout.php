<?php
require_once "guards/guard.php";


session_start();
session_destroy();
header("location:user_login.php");
exit();


?>