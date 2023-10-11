<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link  href="assets/fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="car-target" class="carousel slide carousel-fade " data-bs-ride="carousel">
<div class="carousel-inner">

    <div class="carousel-item active">
        <div class="carousel-text1">
            <p class="p1">WELCOME TO <br> GAZEASY</p>
            <p id="carousel1" class="p2">"Your Buiness is Successfully Registered"</p>

      <!-- continue to login -->
      <div class="d-flex">
        <div class="row">
            <div class="col">
            <a href="business_login.php">
                <button id="reg_sucess" class="btn btn-lg btn-success">Login to Continue</button>
            </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <a href="../index.php">
                <button class="btn btn-lg btn-primary mx-4">Back to Homepage</button>
            </a>
            </div>
        </div>
      </div>
      <!-- continue to login end-->
    </div>

        <div><img src="images/gas2.jpg" class="d-block w-100" height="700" alt="gas cylinders">
        </div>
    </div>

  
</div>
</div>
<!-- CAROUSEL END HERE -->

<script src="assets/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

  $(document).ready(function(){

      $('body').hover(function(){
          $('#carousel1').addClass('animate__animated animate__fadeInRight');
      })


  })



<?php
require_once("../partials/footer.php");
?>

