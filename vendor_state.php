<?php
include_once "business/classes/State.php";
$sta = new State();
$states = $sta->get_user_state();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   




    <input type="text" id="username">
    <p id="message"></p>
    <button id="btn-msg">Reveal</button>

<!-- AJAX help us make our functionality without any reload/refresh to the page -->
<!-- Jquery method for using AJAX .load(); .get(); .post(); -->

    <script src="jquery.js"></script>
    <script>

        $(document).ready(function(){
            //.load() method takes three arguments.
            //1. the url of where you are loading from 2. the data you loading 3. the callback function.
            //where you are loading from is process.php
            //click of a button loads the AJAX without any refreshing.
            $("#btn-msg").click(function(){
                $("#message").load("process.php");
            })
            //based on change of the text box, it loads content of process.php
            $("#username").change(function(){
                var username = $(this).val();
                $("#message").load("process.php", username, function(response, status, xhr){
                    console.log(status);
                });
            })



            $("#traveltype").change(function(){
                var center = $(this).val();
                //concatenating the url with the name/value pairs using only the keys....
                $("#destination").load("option_process.php?center="+center);
            })



        });


           

    </script>
    


</body>
</html>