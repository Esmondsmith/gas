<!-- FOOTER -->

<div class="container-fluid foot-container">
    <a href="#"><img src="icons/ttop.png" class="to-top" title="Back To Top"></a>
  <footer class="pt-5 mx-5">
    <div class="row w-100 mx-5 footer-con">
     <div class="col-6 col-md-2 mb-3 mx-5 footer footer-con1">
        <h5><strong>About US</strong></h5>
        <ul class="nav flex-column foot-li">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About GazEasy</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Terms & Condition</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacy Policy</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Billing Policy</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Copyright Infringement Policy</a></li>
        </ul>
      </div>
        
      <div class="col-6 col-md-2 mb-3 footer-con2">
        <h5><strong>Support</strong></h5>
        <ul class="nav flex-column foot-li">
          <li class="nav-item mb-2"><a href="mailto:support@gazeasy.ng" class="nav-link p-0 text-body-secondary">support@gazeasy.ng</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">safety tips</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Contact Us</a></li>
          <li class="nav-item mb-2"><a href="vendor.html" class="nav-link p-0 text-body-secondary">FAQs</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>


    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-0 border-top">
      <p>© 2023 Esmond, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#" title="Twitter" target="_blank"><i class="fa-brands fa-socials fa-twitter fa-xl"></i></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#" title="Instagram" target="_blank"><i class="fa-brands fa-socials fa-instagram fa-xl"></i></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#" title="Facebook" target="_blank"><i class="fa-brands fa-socials fa-facebook fa-xl"></i></a></li>
      </ul>
    </div>
  </footer>
</div> 

<script src="assets/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){

  $("#stateid").change(function(){
     var stateid = $("#stateid").val();
    // alert(stateid);
    $("#lgaid").load("process/lga_process.php", {"statekey": stateid}, function(response, status, xhr){
    });

  });
        
})

</script>

<script src="bootstrap/js/bootstrap.bundle.js"></script>    
</body>
</html>