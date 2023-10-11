<?php
error_reporting(E_ALL);

function sanitize($evil_string){
    $safe_string = strip_tags($evil_string);
    $safe_str = htmlspecialchars($safe_string);
    $protected_string = trim($safe_str);
    $pure_string = Stripslashes($protected_string);

    return $pure_string;

  }
?>