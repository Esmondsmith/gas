<?php
require_once "business/classes/Business.php";
include_once "business/classes/State.php";


$sta = new State();
$states = $sta->fetch_state();

$biz = new Business();
$business = $biz->fetch_all_business();
// print_r($business);


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Businesses</title>
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


     <!--To select all businesses in a particular state -->
    <div class="mb-4 mx-4" style="background-color:;">
        <label for="" id="fbs"><b></b></label>
        <select class="btn btn-warning" name="state" id="selectstate">
            <option value=""> - Search by States - </option>
            <?php foreach($states as $sta){ ?>
            <option value="<?php echo $sta['state_id']; ?>"> <?php echo $sta['state_name']; ?> </option>
            <?php } ?>
        </select>
    </div> 

    <!-- To display all businesses in GUI -->
    <div class="row biz-item" id="eachstate">
    <?php if(count($business) > 0 ){ ?>
    <?php foreach($business as $bus){ 
    ?>  

    <div class="col-md-4 biz-item">
      <div class="card mx-4 mb-5" style="width:90%;">
          <img src="images/gasgas.jpg" class="card-img-top" alt="business image">
        <div class="card-body space-around" name="biz_card" id="biz_card">
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


    <script src="business/assets/jquery.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
      // This is to filter business based on selected state
        $("#selectstate").change(function(){
        var selectstate = $(this).val();
            $("#eachstate").load("vendorprocess.php",{"selectstate":selectstate},function(response,status,xhr){
            })
        })

        $("body").hover(function(){
          $("#btn-more").addClass('animate__animated animate__heartBeat');
        })
        
      

      // This is to return the select dropdown to all business when the all states is selected
      // $("#selectstate").change(function(){
      // var selectstate = $(this).val();
      //     $("#eachstate").load("vendorallstatesprocess.php",{"selectstate":selectstate},function(response,status,xhr){
      //     })
      //   })
      

       

    })






















    // $(document).ready(function(){

    //   $("#selectstate").change(function(){
    //     var myform = document.getElementById("selectstate");//form
    //     var data = new FormData(myform);
    //     $.ajax({
    //       type: "post",
    //       url: "vendorprocess.php",
    //       data: data,
    //       cache: false,
    //       processData: false,
    //       contentType: false,
    //       success: function (response) {
    //          var data = JSON.parse(response);
    //          if(response == 0){
    //              $("#allstate").addClass("d-none");//already showing
    //             $("#empty_biz").html("<div class='col text-center mt-5'>No business found in this area</div>");//empty

    //          }else{
    //             $("#allstate").addClass("d-none");

    //             Object.entries(data).forEach(([key, bus]) =>{            
    //             var biz ='<div class="col-md-4 biz-item"><div class="card mx-4 mb-5" style="width:90%;"><img src="images/gasgas.jpg" class="card-img-top" alt="business image"><div class="card-body space-around" name="biz_card" id="biz_card"><h4 class="card-title" style="color: #FF632D"><strong>'+bus.biz_name+'</strong></h4><p class="card-text"><strong>Address: </strong>'+bus.biz_address+'</p><p class="card-text"><strong>City: </strong>'+bus.biz_city+'</p><p class="card-text"><strong>Seller phone: </strong>'+bus.biz_phone+'</p><a href="vendors_info.php?id='+bus.biz_id+'class="btn btn-primary">Business Details</a></div></div></div>'

    //              $('#empty_biz').append(biz);     
    //             })
                     
                
    //          }
    //       }


    //     });
    //   });

    


    // });

    </script>
       


        <!-- FOOTER -->
<?php
require_once("partials/footer.php");
?>