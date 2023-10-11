<?php
require_once "../classes/Address.php";

$state_id = $_POST["statekey"];
$lg = new Address();
$loc_gov = $lg->fetch_lga($state_id);

$lg_options = ""; //$lg_options is initially empty
foreach($loc_gov as $local){
    $lg_name = $local['local_govt_name'];

    $lg_options .= "<option> $lg_name </option>";
}

        echo $lg_options;




?>