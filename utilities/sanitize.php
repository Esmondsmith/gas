<?php
error_reporting(E_ALL);

  function sanitize($evil_string){
    $safe_string = strip_tags($evil_string);
    $protected_string = trim($safe_string);
    $pure_string = Stripslashes($protected_string);

    return $pure_string;

  }

?>