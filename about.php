<?php
$title = "About Page";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project- <?php echo $title ?></title>
    <link  href="user_assets/fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="user_assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="user_assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="user_assets/animate.css" rel="stylesheet" type="text/css">

</head>

<body>

<!-- NAVBAR START HERE -->
<div class="navbar navbar-expand-lg bg-body-tertiary nav-start ">
    <div class="col col-10 container-fluid">
        <a href="#"><img src="icons/logo.png" alt="logo" width="130" height="90"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-sc" aria-controls="nav-sc" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-sc">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-ul">
            <li class="nav-item">
              <a class="nav-link active" href="index.php"><b class="nav-nav">Home</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php"><b class="nav-nav">About Us</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_register.php"><b class="nav-nav">Sign Up</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php"><img src="icons/icon.png" class="mb-2"><b class="nav-nav">Log In</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vendors.php"><b class="nav-nav">Vendors</b></a>
            </li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-4" type="search" placeholder="Search for Product" aria-label="Search" autofocus>
            <button class="btn" type="submit" style="background: #FF632D; color: white;">Search</button>
          </form>
        </div>
    </div>
    </div> <!-- NAVBAR END HERE -->


      <div class="container-fluid">
        <div class="row">
        <div >
        <div>
            <img src="images/gaz2.jpg"  width="100%" height="400px">
        </div>
        </div>
       <div class="row container">
        <div class="col text-center">
          <h1 class="vendor-h1 text-center pt-5">ABOUT GAZEASY</h1>
        </div>
      </div> 
      </div>
      </div>

    <div class="container-fluid col-10">
    <div class="row order-alert d-flex mt-3">
        <div class="col col">
            <img src="images/gaz-img.jpg" width="500">
        </div>
        <div class="col col ">
            <div class="vendor">
                <p id="p2">About Us.</p>
                <button type="button" class="btn-br"></button>
                <button type="button" class="btn-br"></button>
                <button type="button" class="btn-br"></button>
                <button type="button" class="btn-br"></button>
                <button type="button" class="btn-br"></button>
                <p id="p3">Welcome to GazEasy, the website that offers services tailored to meet the needs of different customers by making it easy for cooking gas to be ordered and delivered to their doorsteps. Customers like individual households, restaurants, and other businesses now find it easy to get cooking gas in their comfort. Currently operational in Lagos State, we are continuously expanding to serve more areas across Nigeria. With the GazEasy app, you can browse for vendors and check out their products and prices. You can conveniently pay for your orders using various payment options, including a card system.</p>

                <p id="p3">This easy-to-use app does all the hard work while you watch your business grow. Increase daily sales with the GazEasy app and manage customers's offers and products online at anytime of the day. Ensure that your business stand out from the competition with enhanced brand exposure on our platform, capturing the attention of potential customers</p>
       
                <p id="p3"><strong><u>Our Mission: -</u></strong> The GazEasy website is built on the commitment of empowering both small scale and large scale businesses by providing them with a platform where they can easily access our vast customer base and interract with those who are in need of their products. Through our platform, we connect people and possibilities, revolutionizing the way goods and services are delivered.</p>
                <p id="p3"><strong><u>Our Vision: -</u></strong> Our long-term vision is to create a comprehensive last-mile Gas ordering platform that supports merchant sales growth and connects consumers with the local businesses that sustain them. We consider the needs of all our communities and bring your city in your hands. This journey will take time, but we are dedicated to realizing it.</p>
            </div>
        </div>
    </div>
    </div>
    <div class="row my-5 container-fluid">
      <div class="col safety-post col-12 text-center">
        <h1 class="vendor-benefit">Some of our registered <span style="color:#FF632D;"><u>Vendor</u></span></h1>
      </div>
    </div> 




        <!-- FOOTER -->
<?php
require_once("partials/footer.php");
?>