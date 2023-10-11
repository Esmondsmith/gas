<!-- vendors.php -->

<?php
require_once "business/classes/Business.php";

$biz = new Business();
$business = $biz->fetch_all_business();
// print_r($business);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About page</title>
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
          <h1 class="vendor-h1 text-center">REGISTERED VENDORS</h1>
        </div>
      </div> 
    <div class="col safety-post col-12 text-center">
        <h1 class="vendor-benefit mb-5">Vendors Near <span style="color:#FF632D;"><u> You</u></span></h1>
      </div>
    </div> 

    
    <div class="row biz-item">
    <?php if(count($business) > 0 ){ ?>
    
    <?php foreach($business as $bus){ ?>  

    <div class="col-md-4 biz-item">
        <div class="card mx-4 mb-5" style="width:90%;">
        <img src="images/gasgas.jpg" class="card-img-top" alt="business image">
        <div class="card-body space-around">
            <h4 class="card-title" style="color: #FF632D"><strong><?php echo $bus['biz_name']; ?></strong></h4>
            <p class="card-text"><strong>Address: </strong> <?php echo $bus['biz_address']; ?></p>
            <p class="card-text"><strong>City: </strong> <?php echo $bus['biz_city']; ?></p>
            <p class="card-text"><strong>Seller phone: </strong> <?php echo $bus['biz_phone']; ?></p>
            <!-- To pass the id via query string -->
            <a href="vendors_info.php?id=<?php echo $bus['biz_id']; ?>" class="btn btn-primary">Business Details</a>
        </div>
        </div>
    </div>

    <?php } ?>

    <?php } ?>
    </div>


        <!-- FOOTER -->
<?php
require_once("partials/footer.php");
?>


<!-- vendors_inf.php -->
<?php
require_once "business/classes/Business.php";

if(isset($_GET['id'])){

    $biz_id = $_GET['id'];

    $bus = new Business();
    $details = $bus->get_business_info($biz_id);
    // print_r($details);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About page</title>
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
          <h1 class="vendor-h1 text-center"><strong>More details about <?php echo $details['biz_name']; ?></strong></h2></h1>
        </div>
      </div> 

                <div class="container">
                    <div class="row">
                    <div class="col-md-6">
                    <h2 class="card-title" style="color: #FF632D"><strong><?php echo $details['biz_name']; ?> </strong></h2>
                    <h3>Address: <?php echo $details['biz_address']; ?></h3>
                    <h3>City: <?php echo $details['biz_city']; ?></h3>
                    <p>State: <?php echo $details['biz_state_id']; ?> </p>
                    <p>Email: <?php echo $details['biz_email']; ?> </p>
                    <p>Phone: <?php echo $details['biz_phone']; ?> </p>
                </div>



        <!-- FOOTER -->
<?php
require_once("partials/footer.php");
?>







    <!--To select all businesses in a particular state -->
    <div class="mb-4 mx-4" style="background-color:;">
        <label for=""><b>Filter by State</b></label>
        <select name="state" id="stateid_select">
          <!-- <option value=""></option> -->
            <?php foreach($states as $sta){ ?>
            <option value="<?php echo $sta['state_id']; ?>"> <?php echo $sta['state_name']; ?> </option>
            <?php  }?>
        </select>
        <button id="btn-get">GO</button>

    </div> 


    <div class="row biz-item d-none" id="state_div">
      <?php if(count($business) > 0 ){ ?>
      <?php foreach($business as $bus){ ?>  

      <div class="col-md-4 biz-item">
        <div class="card mx-4 mb-5" style="width:90%;">
            <img src="images/gasgas.jpg" class="card-img-top" alt="business image">
          <div class="card-body space-around">
              <h4 class="card-title" style="color: #FF632D"><strong><?php echo $bus['biz_name']; ?></strong></h4>
              <p class="card-text"><strong>Address: </strong> <?php echo $bus['biz_address']; ?></p>
              <p class="card-text"><strong>City: </strong> <?php echo $bus['biz_city']; ?></p>
              <p class="card-text"><strong>Seller phone: </strong> <?php echo $bus['biz_phone']; ?></p>
              <!-- To pass the id via query string -->
              <a href="vendors_info.php?id=<?php echo $bus['biz_id']; ?>" class="btn btn-primary">Business Details</a>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php } ?>
    </div>