
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Login to your account</h4>
                        <span aria-hidden="true" data-dismiss="modal" class="close-btn">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $arr['base_url'].'?controller=auth&function=login';?>" method="request">

                            <div class="form-group">
                                <div class="login-email">
                                    <input type="email" name="email" id="" placeholder="Email" required>
                                    <img src="assets/images/user-login-icon.png" alt="">
                                </div>

                                <div class="login-password">
                                    <input type="password" name="login-pass" id="" placeholder="Password" required>
                                    <img src="assets/images/password-icon.png" alt="">
                                </div>

                                <div class="remember-me">
                                    <input type="checkbox" name="remember" id="remember-me" class="form-check-input">
                                    <label for="form-check-label">Remember Me</label>
                                </div>
                            </div>

                            <div class="btn-login">
                                <input type="submit" value="Login" name="name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="forget-pass">
                            <a href="" data-target="#forget-pass-modal" data-toggle="modal" data-dismiss="modal">Forget password?</a>
                        </div>
                        <div class="create-account">
                            <span>Don't have an account? </span><a href="./customer-reg.php">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Homepage modal for login end -->


        <!--  Homepage modal for forget-pass start -->
        <div class="modal fade" id="forget-pass-modal" tabindex="-1" role="dialog" aria-labelledby="forget-pass-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Forget password</h5>

                        <span aria-hidden="true" data-dismiss="modal" class="close-btn">&times;</span>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" name="" id="" class="form-control" placeholder="Email">
                        </div>
                        <div class="btn-send">
                            <button type="button">Send</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="" data-target="#login-modal" data-toggle="modal" data-dismiss="modal">Login now</a>
                    </div>
                </div>
            </div>
        </div>