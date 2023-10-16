<?php
  session_start();

  require_once "classes/Type.php";
  //fetching the list of whats coming from the DB for biz_type.
  $type = new Type();
  $biz_type = $type->fetch_business_type();
  // print_r($biz_type);

  include_once "classes/Address.php";
  $sta = new Address();
  $states = $sta->fetch_all_states();

  include_once "classes/Local.php";
  $lg = new Local();
  $locals = $lg -> fetch_local_govt();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Registration</title>
    <link  href="assets/fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/animate.css" rel="stylesheet" type="text/css">

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
              <a class="nav-link active" href="../index.php"><b class="nav-nav">Home</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about.php"><b class="nav-nav">About Us</b></a>
            </li>
            <div class="nav-item dropdown" >
              <a class="nav-link" data-bs-toggle="dropdown" href="#"><b class="nav-nav dropdown-toggle">Sign Up</b></a>
              <ul class="dropdown-menu">
                <li><button class="dropdown-item"><a href="../user_register.php">As a User</a></button></li>
                <li><button class="dropdown-item"><a href="#">As a Business</a></button></li>
              </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="business_login.php"><img src="icons/icon.png" class="mb-2"><b class="nav-nav">Log In</b></a>
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

<!-- REGISTER WITH US TODAY -->
      <div class="container-fluid">
        <div class="row">
        <div>
        <div>
            <img src="images/gaz2.jpg"  width="100%" height="400px">
        </div>
        </div>
        <div class="row container">
        <div class="col text-center">
          <h1 class="vendor-h1 text-center pt-5">BUSINESS REGISTRATION</h1>
        </div>
        </div> 
        </div>
      </div>

<div class="container">
  <main>
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary  mt-2">FAQs</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>How long does it take to sign up as a Vendor?</strong></h6>
              <small class="text-body-secondary">It depends on your location and the amount of space. Once you have completed the registration form, our team will contact you to set it up for you</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>What do I need to get started?</strong></h6>
              <small class="text-body-secondary">Go through our webiste, see the required data, make them available and immediately start to benefit from our large customer base</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>How much does it cost to sign up with GazEasy?</strong></h6>
              <small class="text-body-secondary">Sign up any time, anywhere, There is no membership fee.</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>How is my information secured and protected?</strong></h6>
              <small class="text-body-secondary">This system has been utilized in some form in the defense industry and is hardened against
              known security threats. Additionally, the registration system utilizes strong authentication and authorization controls.</small>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><strong>What internet browsers are supported?</strong></h6>
              <small class="text-body-secondary">Built with the latest technology, the website is supported by all internet browsers.</small>
            </div>
          </li>
        <!-- Quick message form -->
        <form class="card p-2">
          <div class="input-group">
            <label><strong>Quick Message</strong></label><br>
            <textarea cols="60" rows="4" name="reg_textarea"></textarea><br><br>
            <input type="email" name="reg_email" class="form-control" placeholder="Enter email">
            <button type="submit" name="reg_btn" class="btn vendor-btnFAQs">SUBMIT</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
      <h2 class="my-3 vendor-class1"><b>Register</b></h2>

        <!-- On line 14 to 24, we are checking if there is an error message in SESSION and then displaying it and later remove it from SESSION after displaying -->
                <?php
                    if(isset($_SESSION['biz_reg_error'])){
                ?>
                  <p class="text-danger text-center bg-white"><?php echo $_SESSION['biz_reg_error']; ?></p>
                  <!-- unset is used to stop the script -->
                  <?php unset($_SESSION['biz_reg_error']); ?>
                <?php
                    }
                ?>

        <!-- Business Registration form starts here -->
        <form action="process/biz_reg_process.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="biz-type" class="form-label"><b>Business Type</b></label>
              <!-- select for business type start-->
              <select id="biz-type" name="biz_type" class="form-select">
              <?php foreach($biz_type as $type){ ?>
                  <option value="<?php echo $type['type_id']; ?>"> <?php echo $type['type_name']; ?> </option>
                <?php  }?>
              </select> 
              <!-- select for business type end-->
            </div>
            <div class="col-sm-6">
              <label for="biz-name" class="form-label"><b>Business Name</b></label>
              <input type="text" value="" name="biz_name" class="form-control" id="biz-name">
              <div class="invalid-feedback">
                Valid Business name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="biz-email" class="form-label"><b>Email</b></label>
              <input type="email" name="biz_email" class="form-control" id="biz-email">
            </div>
            <div class="col-md-6">
              <label for="biz-phone" class="form-label"><b>Contact Number</b></label>
              <input type="number" name="biz_phone" class="form-control" id="biz-phone">
            </div>
            <div class="col-12">
             <label for="biz-cert" class="form-label"><b>Business Reg. Certificate</b></label>
             CAC Cert. Or Any Valid ID
             <input type="file" name="biz_doc" class="form-control" id="biz-cert">
            </div>
            <div class="col-md-6">
             <label for="inputPassword4" class="form-label"><b><strong>Password</strong></b></label>
             <input type="password" name="biz_password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-6">
             <label for="inputPassword4" class="form-label"><b>Confirm Password</b></label>
             <input type="password" name="biz_pwd" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
              <label for="address" class="form-label"><strong>Address</strong></label>
              <input type="text" class="form-control" name="biz_address" id="address" placeholder="Street/Building number">
            </div>
            <div class="col-12">
              <label for="address2" class="form-label"><strong>City</strong></label>
              <input type="text" name="biz_city" class="form-control" id="address2" placeholder="City Name">
            </div>
             <!-- select for state start-->
            <div class="col-sm-6">
            <label value="">Select State</label>
            <select class="form-control" name="state" id="stateid">                          
              <?php foreach($states as $anything){?>
              <option value="<?php echo $anything["state_id"]; ?>"><?php echo $anything["state_name"]; ?></option>
              <?php } ?>
            </select>
             <!-- select for state end-->
          </div>               
          <div class="col-sm-6">   
            <label value="">Select L.G.A</label>                     
            <select class="form-control" name="lga" id="lgaid">
              <?php foreach($locals as $lg){ ?>
                  <option value="<?php echo $lg['local_govt_id']; ?>"> <?php echo $lg['local_govt_name']; ?> </option>
              <?php  }?>
            </select> 
          </div>
          </div>
          <hr class="my-3">
          <button name="business_reg_btn" class="w-27 btn mb-2 btn-primary btn-lg" type="submit">Register</button>
          </form>
          <!-- Business Registration form ends here -->
          <h5>Already Registered Vendor? <a href="business_login.php">Log in. </a></h5>
      </div>
    </div>
  </main>
</div>

<!-- BENEFIT OF BECOMING A VENDOR -->
    <div class="row my-5 container-fluid">
      <div class="col col-12 text-center">
        <h1 class="vendor-benefit">The benefits as a <span style="color:#FF632D;"><u>vendor</u></span></h1>
      </div>
    </div>  
    <!-- BENEFIT OF BECOMING A VENDOR END-->
<div class="col col-10 container-fluid mt-5">
    <div class="row">
      <div class="col-lg-3">
        <img src="icons/many.png" width="250px" height="100px" class="img-fluid vendor-img rounded float-start mb-3" alt="..."><br>
        <h2 class="fw-normal mt-3">Expand your reach</h2>
        <p>Tap into our vast customer base and effortlessly reach new audiences, expanding your business beyond traditional boundaries.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-3">
        <img src="icons/growth.png" width="250px" height="100px" class="img-fluid vendor-img rounded float-start mb-3" alt="..."><br>

        <h2 class="fw-normal mt-3">Increase sales</h2>
        <p>This easy-to-use app does all the hard work while you watch your business grow. Increase daily sales with the GazEasy app and manage customers, offers and products online at anytime of the day.</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-3">
        <img src="icons/supply.png" width="250px" height="100px" class="img-fluid vendor-img rounded float-start mb-3" alt="..."><br>
        <h2 class="fw-normal mt-3">Increase visibility</h2>
        <p>Stand out from the competition with enhanced brand exposure on our platform, capturing the attention of potential customers.</p>
      </div>
      <div class="col-lg-3">
        <img src="icons/opportune.png" width="250px" height="100px" class="img-fluid vendor-img rounded float-start mb-3" alt="..."><br>
        <h2 class="fw-normal mt-3">Business growth opportunities</h2>
        <p>Unlock doors to collaborations, partnerships, and networking with fellow vendors, fostering business growth and expansion.</p>
      </div><!-- /.col-lg-4 -->
    </div>
</div>


  <?php
    include_once "partials/footer.php";
  ?>