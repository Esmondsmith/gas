<?php
$title = "Gas Ordering System";
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
    <link href="user_assets/css/animate.css" rel="stylesheet" type="text/css">

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
            <div class="nav-item dropdown" >
              <a class="nav-link" data-bs-toggle="dropdown" href="#"><b class="nav-nav dropdown-toggle">Sign Up</b></a>
              <ul class="dropdown-menu">
                <li><button class="dropdown-item"><a href="user_register.php">As a User</a></button></li>
                <li><button class="dropdown-item"><a href="business/business_reg.php">As a Business</a></button></li>
              </ul>
            </div>
            <div class="nav-item dropdown" >
              <a class="nav-link" data-bs-toggle="dropdown" href="#"><img src="icons/icon.png" class="mb-2"><b class="nav-nav dropdown-toggle">Log In</b></a>
              <ul class="dropdown-menu">
                <li><button class="dropdown-item"><a href="user_login.php">User Login</a></button></li>
                <li><button class="dropdown-item"><a href="business/business_login.php">Business Login</a></button></li>
                <li><button class="dropdown-item"><a href="admin/admin_login.php">Admin Login</a></button></li>
              </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="vendors.php"><b class="nav-nav">Vendors</b></a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-4" type="search" placeholder="Search for Vendors" aria-label="Search" autofocus>
            <button class="btn" type="submit" style="background: #FF632D; color: white;">Search</button>
          </form>
        </div>
    </div>
    </div> <!-- NAVBAR END HERE -->
<div id="car-target" class="carousel slide carousel-fade " data-bs-ride="carousel">
<div class="carousel-inner">

    <div class="carousel-item active mt-5">
        <div class="carousel-text1">
            <p class="p1">Instant Gas for <br> Homes and Businesses</p>
            <p id="carousel1" class="p2">"Gas at your Doorstep"</p>
        </div>

        <div><img src="images/gas2.jpg" class="d-block w-100" height="700" alt="gas cylinders">
        </div>
    </div>

    <div class="carousel-item mt-5">
        <div class="carousel-text2">
            <p class="p2">"Keep on Cooking with <br><span style="font-size: 50px;">GazEasy"</span></p>
        </div>
        <div><img src="images/cooking.jpg" class="d-block w-100" height="700" alt="cooking in the kitchen">
        </div>
    </div>
  
</div>
</div>
<!-- CAROUSEL END HERE -->


<!-- ORDER ALERT START-->
    
  <div class="container ">
      <div class="row d-flex div-vendor mb-5">
          <div class="col-md-6">
              <h2 class= "keep-on-cooking">KEEP ON COOKING WITH GAZEASY</h2>
          </div>
          <div class="col-md-6"><a href="vendors.php" class="ordernow">
              <strong>ORDER NOW</strong></a>
          </div>
      </div>
      <div class="row order-alert d-flex mt-5">
          <div class="col col">
              <img src="images/del1.jpg" width="500">
          </div>
          <div class="col col dbl-brdr">
              <div class="vendor">
                  <h3>Looking to expand your customer base? </h3>
                  <p id="p2">BECOME A VENDOR TODAY.</p>
                  <button type="button" class="btn-br"></button>
                  <button type="button" class="btn-br"></button>
                  <button type="button" class="btn-br"></button>
                  <button type="button" class="btn-br"></button>
                  <button type="button" class="btn-br"></button>
                  <p id="p3">Want to grow your business? Tap into our vast customer base and effortlessly reach new audiences, by expanding your business beyond traditional boundaries. Become a Vendor on GazEasy and get all these and more. Register on GazEazy as a vendor and unlock a world of possibilities for your business. Experience growth, convenience, and success.</p>
                  <a href="business/business_reg.php" class="vendor-reg">REGISTER NOW</a>
              </div>
          </div>
      </div>
  </div>


 <div class="row my-5 container-fluid">
      <div class="col safety-post col-12 text-center">
        <h1 class="vendor-benefit">Safety <span style="color:#FF632D;"><u>Posts</u></span></h1>
      </div>
</div> 

<!-- SATEFY POST -->
<div class="col col-10 container-fluid mt-5">
    <div class="row mt-5">
      <div class="col-lg-4">
        <a href=""><img src="images/supply.jpg" title="Gas safety" class="img-fluid vendor-img rounded float-start mb-3"></a>
        <h2 class="fw-normal">How to Safely Transport Gas Cylinders</h2>
        <p>Always transport cylinders in an upright position, with their valves uppermost. Before transport, remove any accessories connected to the cylinder, such as burners, regulators, hoses, and any other fittings. Always secure cylinders during transport to prevent them from rolling around.</p>
        <p><a class="btn btn-secondary" href="#">Read More »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <a href=""><img src="images/keepcooking.jpg" title="Gas safety" class="img-fluid vendor-img rounded float-start mb-3"></a>
        <h2 class="fw-normal">Using Gas Appliances Safely</h2>
        <p>Always turn off the knob on the gas cylinder, after use, to prevent any accidental leakage. Close all the stove knobs after use and also if you smell a leak. Install gas detectors in your kitchen and in the room where you keep your gas cylinder in order to avoid any accidents due to gas leaks from a gas cylinder.</p>
        <p><a class="btn btn-secondary" href="#">Read More »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <a href=""><img src="images/storegaz.jpg" title="Gas safety" class="img-fluid vendor-img rounded float-start mb-3"></a>
        <h2 class="fw-normal">How to Properly Store Gas Cylinders</h2>
        <p>Gas cylinders are best stored outside in a dedicated cage with customized racks and safety chains. The cage should always be sheltered from the sun, well-ventilated, and away from mechanical hazards and public walkways.</p>
        <p><a class="btn btn-secondary" href="#">Read More »</a></p>
      </div><!-- /.col-lg-4 -->
    </div>
</div>
<!--SATEFY POST END-->

<!-- FOOTER START HERE -->
<?php
include_once "partials/footer.php";
?>
