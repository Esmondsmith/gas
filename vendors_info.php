<?php
require_once "business/classes/Business.php";
// require_once "guards/guard.php";


    if(isset($_GET['id'])){
        $biz_id = $_GET['id'];
        $bus = new Business();
        $details = $bus->get_business_info($biz_id);
        // print_r($details);
    }


    require_once "business/classes/Category.php";
    $cat = new Category();


    require_once "business/classes/Product.php";
    // $prod = new Product();
    // $product = $prod->fetch_biz_products($biz_id);
    $prod = new Product();
    $product = $prod->fetch_all_products();


    //To get state name
    $bizz = new Business();

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor details</title>
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
       <div class="row ">
        <div class="col text-center">
          <h1 class="vendor-h1 text-center"><strong>More details about <?php echo $details['biz_name']; ?></strong></h2></h1>
        </div>
      </div> 

      <div class="row order-alert d-flex my-5">
          <div class="col-1">
          </div>
          <div class="col-4 md-12">
              <img src="images/b22.jpg" width="400">
          </div>
          <div class="col-7 md-12 dbl-brdr">
              <div class="vendor">
                  <div class="row">
                    <div class="col-md-6">
                    <h1 class="card-title" style="color: #FF632D"><strong><?php echo $details['biz_name']; ?> </strong></h1>
                    <h5 class="my-2"><strong>Address: </strong><?php echo $details['biz_address']; ?></h5>
                    <h5 class="my-2"><strong>City: </strong><?php echo $details['biz_city']; ?></h5>
                    <p><strong>State: </strong><?php echo $bizz->get_state_name($details['biz_state_id']); ?> </p>
                    <p><strong>Email: </strong><?php echo $details['biz_email']; ?> </p>
                    <p><strong>Phone: </strong><?php echo $details['biz_phone']; ?> </p>
                </div>
              </div>
          </div>
      </div>

      <h2 class="my-5 py-4 text-center">VENDOR'S <span style="color:#FF632D;"><u>PRODUCT TABLE</u></span></h2>

        <div class="table">
            <table class="table table-striped table-hover table-center">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Category</th>
                        <th>Product Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sn = 1; ?>
                <!-- <?php// if(count($product) > 0 ){ ?> -->
                <?php if($product > 0 ){ ?>
                <?php foreach($product as $prod){ ?>
                    <tr>
                        <th><?php echo $sn++; ?></th>
                        <td><?php echo $prod['product_name']; ?></td>
                        <td>&#8358;<?php echo $prod['product_price']; ?></td>
                        <td><?php echo $cat->get_category_name($prod['product_cat_id']); ?></td>
                        <td><?php echo $prod['product_desc']; ?></td>
                        <td style="display:flex";>
                        <!-- Below, we are using query string to pass the id of book while editing -->
                        <!-- THIS -->
                        <a href="business/order.php?id=<?php echo $prod['product_id']; ?>" target="_blank" class='btn btn-md btn-success mx-3'><i class="fa-solid fa-cart-shopping"></i> Order Now</a>
                    </td>
                    </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
            </table>
      </div>
        <a href="vendors.php" class=""><i class='fa fa-move'> <<< Back </i> </a>


        <!-- FOOTER -->
<?php
require_once("partials/footer.php");
?>