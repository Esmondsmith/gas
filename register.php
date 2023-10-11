<?php
require_once("partials/header.php");
?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900">Create an Account!</h1>
                                <h6 class="mb-4"><i>Keep cooking with GazEasy</i></h6>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Residential Address. E.g, House number and street">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="City">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <select class="form-control " id="lga_select"
                                            placeholder="Select L.G.A">
                                          <option>Local Govt. Area</option>
                                          <option>Ikeja</option>
                                          <option>Lagos Mainland</option>
                                          <option>Alimosho</option>
                                          <option>Ikorodu</option>
                                          <option>Lagos Island</option>
                                          <option>Surulere</option>
                                          <option>Eti-Osa</option>
                                          <option>Apapa</option>
                                          <option>Oshodi-Isolo</option>
                                          <option>Mushin</option>
                                          </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="state_select"
                                            placeholder="Select State">
                                            <option>State</option>
                                            <option>Lagos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <a href="login.php" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php
    require_once("partials/footer.php");
?>