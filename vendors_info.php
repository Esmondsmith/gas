<?php
require_once "business/classes/Business.php";

    if(isset($_GET['id'])){
        $biz_id = $_GET['id'];
        $bus = new Business();
        $details = $bus->get_business_info($biz_id);
        // print_r($details);
    }

    require_once "business/classes/Product.php";
    $prod = new Product();
    $product = $prod->fetch_biz_products($biz_id);

    $bizz = new Business();
    // $buss = $bizz->get_state_name($biz_id);

      // echo "<pre>";
      // print_r($product);
      // echo  "</pre>";

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
                    <p>State: <?php echo $bizz->get_state_name($details['biz_state_id']); ?> </p>
                    <p>Email: <?php echo $details['biz_email']; ?> </p>
                    <p>Phone: <?php echo $details['biz_phone']; ?> </p>
                </div>



                <div class="table">
                    <table class="table">
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
                                <td><?php echo $prod['product_price']; ?></td>
                                <td value="<?php echo $prod['product_cat_id']; ?>"><?php echo $prod['cat_name']; ?></td>
                                <td><?php echo $prod['product_desc']; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>



        <!-- FOOTER -->
<?php
require_once("partials/footer.php");
?>