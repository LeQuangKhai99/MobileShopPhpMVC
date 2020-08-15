<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Change password!</h1>
                        </div>
                        <form method="post" action="<?php echo constant("path")?>Login/postChangePass" class="user">
                            <?php
                            if (isset($data['err'])){
                                echo '<div id="thongbao" class="alert alert-danger" role="alert">
                                          '.$data["err"].'
                                        </div>';
                            }
                            ?>
                            
                            <div class="form-group">
                                <input required type="email" name="email" class="form-control form-control-user" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input required type="password" name="pass" class="form-control form-control-user" placeholder="Curent Password">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input required type="password" name="pass1" class="form-control form-control-user" placeholder="New Password">
                                </div>
                                <div class="col-sm-6">
                                    <input required type="password" name="pass2" class="form-control form-control-user" placeholder="Repeat New Password">
                                </div>
                            </div>
                            <button name="change" class="btn btn-primary btn-user btn-block">
                                Change Password
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo constant("path")?>/Login/Register/">Create an account</a>
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