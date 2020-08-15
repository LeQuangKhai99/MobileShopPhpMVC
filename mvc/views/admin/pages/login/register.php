<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form method="post" action="<?php echo constant("path")?>Login/postRegister" class="user">
                            <?php
                            if (isset($data['err'])){
                                echo '<div id="thongbao" class="alert alert-danger" role="alert">
                                          '.$data["err"].'
                                        </div>';
                            }
                            ?>
                            <div class="form-group">
                                <input required type="text" name="name" class="form-control form-control-user" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input required type="email" name="email" class="form-control form-control-user" placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="password" name="pass1" class="form-control form-control-user" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input required type="password" name="pass2" class="form-control form-control-user" placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <input required type="number" name="phone" class="form-control form-control-user" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input required type="text" name="address" class="form-control form-control-user" placeholder="Address">
                            </div>
                            <button name="register" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?php echo constant("path")?>Login/">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>