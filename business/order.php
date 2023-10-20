<?php
require_once "classes/Product.php";
// require_once "guards/guard.php";


if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $prod = new Product();
    $details = $prod->get_product_info($product_id);
    // print_r($details);
}

require_once "classes/Category.php";
$cat = new Category();

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order details</title>
    <link  href="assets/fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/animate.css" rel="stylesheet" type="text/css">

    <style>
        body{
            background-color: #FAFFF9;
        }
    </style>

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
            <li class="nav-item">
              <a class="nav-link" href="../user_register.php"><b class="nav-nav">Sign Up</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../user_login.php"><img src="icons/icon.png" class="mb-2"><b class="nav-nav">Log In</b></a>
            </li>
        </ul>
        </div>
    </div>
    </div> <!-- NAVBAR END HERE -->    

    <div>
        <div class="row">
        <div>
            <img src="images/gaz2.jpg" width="100%" height="400px">
        </div>
        <div class="col text-center">
          <h1 class="vendor-h1 text-center">PLACE ORDER</h1>
        </div>
      </div> 
      </div>
      </div>        


        <div class="row order-alert d-flex mt-5">
          <div class="col-2">

          </div>
          <div class="col-4">
            <div class="row">
                <div class="col-md-6">
                    <h4 style="color:#FF632D;"><strong>Selected product details</strong></h4>
                    <h6><strong>Product Name:<br> </strong><?php echo $details['product_name']; ?></h6>
                    <h6><strong>Unit Price:<br> &#8358</strong><?php echo $details['product_price']; ?></h6>
                    <h6><strong>Unit weight:<br> </strong><?php echo $cat->get_category_name($details['product_cat_id']); ?> </h6>
                    <h6><strong>Description:<br></strong><?php echo $details['product_desc']; ?></h6>
                </div>
            </div>
          </div>
          <div class="col-6 dbl-brdr">
              <div class="vendor">
                  <p id="p2" class="mb-2">Enter order details.</p>
                  <p >Ensure that all fields are filled</p>
                    <?php if(isset($_SESSION['order_error'])){ ?>
                    <p class="text-danger text-center bg-white"><?php echo $_SESSION['order_error']; ?></p>
                            <!-- unset is used to stop the script -->
                        <?php unset($_SESSION['order_error']); ?>
                    <?php } ?>
                    <form action="process/orderprocess.php" method="post" class=" w-50">       
                        <div class="form-group row ">
                            <div class=" mb-3 mb-sm-0">
                                <input type="text" name="order_name" class="form-control mb-2" id="fullname" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                            <textarea name="order_address" class="form-control mb-2" id="address" cols="43" rows="3" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="">
                                <input type="number" name="order_phone" class="form-control mb-2" id="number" placeholder="Phone Number">
                            </div>
                            <input type="hidden" name="order_product_id" id="">
                        </div>
                        <div class="form-group">
                            <input type="number" name="order_qty" class="form-control mb-2" id="qty" placeholder="Quantity">
                        </div>
                        </div>
                        <input type="checkbox" id="chk" name="chk"><b> Confirm your order</b><br>
                        <button class="btn btn-primary btn-block" id="btn1" type="submit" disabled name="order_btn">order</button>
                    </form> 
              </div>
          </div>
        </div>

        <script src="assets/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">
	$(document).ready(function(){

        $('#chk').click(function(){
            var fullname1 = $('#fullname').val();
            var address1 = $('#address').val();
            var number1 = $('#number').val();
            var qty1 = $('#qty').val();
            var check = $('#chk').prop('checked');
            if(fullname1 !== '' && address1 !== '' && number1 !== '' && qty1 !== '' && check == true && qty1 > 0){
                $('#btn1').removeAttr('disabled')
            } else if (qty1 < 0){
                alert("Enter a valid number");
            } else {
                $('#btn1').attr('disabled', 'disabled')
            } 
        })


        // $('#chk').click(function(){
        //     var check = $('#chk').prop('checked')
        //     if(check == true){
        //         $('#btn1').removeAttr('disabled')
        //     } else {
        //         $('#btn1').attr('disabled', 'disabled')
        //     } 
        // })





    })
    </script>

<?php
require_once("partials/footer.php");
?>