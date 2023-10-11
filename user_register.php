<?php
session_start();
require_once "partials/navbar.php";

include_once "classes/State.php";
$sta = new State();
$states = $sta->get_user_state();

include_once "classes/Local.php";
$local = new Local();
$localgov = $local->get_user_govt();

include_once "classes/Address.php";
$sta = new Address();
$states = $sta->fetch_all_states();


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="user_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="user_assets/css/styles.css" rel="stylesheet" type="text/css">
    <link href="user_assets/css/styles2.css" rel="stylesheet" type="text/css">
    <link href="user_assets/animate.css" rel="stylesheet" type="text/css">
    <link href="user_assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image">
                <img src="images/reg_cooking.jpg" height="100%" width="115%" alt="">
            </div>
            <div class="col-lg-7">
                <div class="p-5">
                    
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 my-4">Create an Account!</h1>
                        <?php
                            if(isset($_SESSION['reg_error'])){
                        ?>
                        <p class="text-danger text-center bg-white"><?php echo $_SESSION['reg_error']; ?></p>
                                <!-- unset is used to stop the script -->
                                <?php unset($_SESSION['reg_error']); ?>
                        <?php
                            }
                        ?>
                    </div>

                    <!-- USER REGISTRATION FORM START HERE -->
                    <form action="process/user_reg_process.php" method="post" class="ml-4">
                        
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="user_fullname" class="form-control form-control-user" id="fullname" placeholder="Full Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="user_phone" class="form-control form-control-user" id="exampleLastName" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="user_email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="user_password" class="form-control form-control-user" id="userpwd1" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="user_pass" class="form-control form-control-user" id="userpwd2" placeholder="Repeat Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_address" class="form-control form-control-user" id="useraddress" placeholder="Residential Address. E.g, House number and street">
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_city" class="form-control form-control-user" id="exampleInputEmail" placeholder="City">
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-sm-6">
                                <label value="">Select State</label>
                                <select class="form-control" name="state" id="stateid">
                                    <?php foreach($states as $sta){ ?>
                                    <option value="<?php echo $sta['state_id']; ?>"> <?php echo $sta['state_name']; ?> </option>
                                    <?php  }?>
                                </select>
                            </div>
                            <div class="col-sm-6">      
                                <label for="">Select L.G.A</label>
                                <select class="form-control" name="lga" id="lgaid">
                                    <?php foreach($localgov as $local){ ?>
                                    <option value="<?php echo $local['local_govt_id']; ?>"> <?php echo $local['local_govt_name']; ?> </option>
                                    <?php  }?>
                                </select>
                            </div>
                           
                        </div>
                        
                        <button class="btn btn-primary btn-user btn-block" type="submit" name="user_reg_btn">Register</button>
                        <hr>
                        <div class="text-center">
                                <a class="medium" href="business/business_reg.php">Business Sign Up</a>
                        </div>
                    </form> 
                    <!-- Registration ends here -->
                    <hr>
                    <div class="text-center">
                        <a class="small" href="admin/admin_reg.php">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="login.php">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="user_assets/jquery.js"></script>
        <script >

            $(document).ready(function(){
//If the parent select box is changed, this is the function below.
                $("#stateid").change(function(){
                    var stateid = $("#stateid").val();
                    // alert(stateid);

                    $("#lgaid").load("process/lga_process.php", {"statekey": stateid}, function(response, status, xhr){

                    });
                });


            })

        </script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>