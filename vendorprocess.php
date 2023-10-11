<?php 
include_once "business/classes/Business.php";

if($_POST){

    $selectstate = $_POST["selectstate"];

    $state = new Business();
    $business_state = $state->fetch_business_state($selectstate); 

    if($business_state){

        foreach($business_state as $bus){
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
    



<?php
    }
          } else{
?>
            <h3 style="color:red;" id="no-match">Sorry, No match found for this location...</h3>
           <!-- <img src="images/" > -->
<?php

          }

} else{
    header("location:../https://www.google.co.in/");
}
 
     
?>
