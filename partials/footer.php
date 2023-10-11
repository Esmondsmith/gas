<div class="container-fluid foot-container">
    <div>
        <a href="#"><img src="icons/ttop.png" class="to-top" title="Back To Top"></a>
    </div>
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
          <p>Get monthly updates of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
        <!-- APP DOWNLOAD ICONS -->
        <div> 
            <div class="mt-5">
                <h3>COMING SOON</h3>
                <div class="row">
                <div class="col download-app1">
                <a href="#"> 
                <img src="images/androidlogo.png" width="150" height="50px" alt="join-app-download-01"/></a>&nbsp&nbsp
                <a href="#"> 
                <img src="images/applelogo.png" width="150" height="50px" alt="join-app-download-02"/></a>
                </div>
                </div>
            </div>
        </div>
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

<script src="../user_assets/bootstrap/js/bootstrap.bundle.js"></script> 
<script src="../user_assets/bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../user_assets/bootstrap/js/script.js" crossorigin="anonymous"></script> 

<script src="../user_assets/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

  $(document).ready(function(){

      $('body').hover(function(){
          $('#carousel1').addClass('animate__animated animate__fadeInRight');
      })

      
      $('#btnpass-signup').click(function(){
          //   var name =  $('name1').val()
            var pwd =  $('#user-pass-signup').attr('type')
              if (pwd == 'password'){
                  $('#user-pass-signup').attr('type', 'text')
                  $('#btnpass-signup').html('<i class="fa-sharp fa-solid fa-eye-slash"></i>')
      
              } else{
                  $('#user-pass-signup').attr('type', 'password')
                  $('#btnpass-signup').html(' <i class="fa-sharp fa-solid fa-eye"></i>')
                
              }

          })

          $('#btnpass-login').click(function(){
          //   var name =  $('name1').val()
            var pwd =  $('#user-pass-login').attr('type')
              if (pwd == 'password'){
                  $('#user-pass-login').attr('type', 'text')
                  $('#btnpass-login').html('<i class="fa-sharp fa-solid fa-eye-slash"></i>')
      
              } else{
                  $('#user-pass-login').attr('type', 'password')
                  $('#btnpass-login').html(' <i class="fa-sharp fa-solid fa-eye"></i>')
                
              }

          })
    
  })

</script>

</body>
</html>
 