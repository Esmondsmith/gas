<?php

if(!isset($_SESSION['business_id'])){
    header("location:business_login.php");
    exit();
}