<!-- FOOTER -->

<div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-0 border-top">
      <p>© 2023 GazEasy, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#" title="Twitter" target="_blank"><i class="fa-brands fa-socials fa-twitter fa-xl"></i></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#" title="Instagram" target="_blank"><i class="fa-brands fa-socials fa-instagram fa-xl"></i></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#" title="Facebook" target="_blank"><i class="fa-brands fa-socials fa-facebook fa-xl"></i></a></li>
      </ul>
    </div>
  </footer>
</div> 


<script src="assets/bootstrap/js/bootstrap.bundle.js"></script> 
<script src="../assets/scripts/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/script.js" crossorigin="anonymous"></script> 


<script src="../assets/jquery.js" type="text/javascript"></script>
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
