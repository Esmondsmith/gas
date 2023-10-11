<?php
session_start();



session_destroy();

header("location:business_login.php");
exit();



?>