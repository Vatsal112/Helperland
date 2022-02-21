<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Login to your account</h4>
                <span aria-hidden="true" data-dismiss="modal" class="close-btn">&times;</span>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class='status-message'>
                        <p class='text-success' id="text-ok2"></p>
                        <a onclick='hideMessage()'><i class='fa fa-close'></i></a>
                    </div>
                    <div class="response-text">
                        <p id="response" class="text-danger"></p>
                    </div>
                    <div class="form-group">
                        <div class="login-email">
                            <?php
                            if (isset($_COOKIE['email']) && isset($_COOKIE['pass']) && isset($_COOKIE['remember-me'])) {
                            ?>
                                <input type="email" name="email" id="uname" placeholder="Email" value="<?php echo $_COOKIE['email']; ?>" required>
                                <img src="assets/images/user-login-icon.png" alt="">
                        </div>

                        <div class="login-password">
                            <input type="password" name="pass" id="pass" placeholder="Password" value="<?php echo $_COOKIE['pass']; ?>" required>
                            <img src="assets/images/password-icon.png" alt="">
                        </div>

                        <div class="remember-me">
                            <input type="checkbox" name="remember" id="remember-me" value="1" class="form-check-input" <?php echo $_COOKIE['remember-me']; ?>>
                            <label for="form-check-label">Remember Me</label>
                        </div>

                    <?php } else { ?>
                        <input type="email" name="email" id="uname" placeholder="Email" value="" required>
                        <img src="assets/images/user-login-icon.png" alt="">
                    </div>

                    <div class="login-password">
                        <input type="password" name="pass" id="pass" placeholder="Password" value="" required>
                        <img src="assets/images/password-icon.png" alt="">
                    </div>

                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember-me" value="1" class="form-check-input">
                        <label for="form-check-label">Remember Me</label>

                    <?php } ?>

                    </div>

                    <div class="btn-login">
                        <button type="submit" id="btn-login" name="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="forget-pass">
                    <a href="" data-target="#forget-pass-modal" data-toggle="modal" data-dismiss="modal">Forget password?</a>
                </div>
                <div class="create-account">
                    <span>Don't have an account? </span><a href="<?php echo $arr['base_url'] . '?controller=home&function=customerReg'; ?>">Create an account</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'forget-pass-modal.php';
?>
<!--  Homepage modal for login end -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#btn-login', function(e) {

            var email = $('#uname').val();
            var pass = $('#pass').val();
            var remember;

            e.preventDefault();

            if ($('#remember-me:checked').val() == 1) {
                remember = 1;
            } else {
                remember = 0;
            }

            if ($('.status-message').css('display', 'flex')) {
                $('.status-message').css('display', 'none')
            }

            if ($('.response-text').css('display', 'block')) {
                $('.response-text').css('display', 'none')
            }

            $.ajax({
                type: "post",
                url: "http://localhost/Helperland/?controller=user&function=userLogin",
                data: {
                    email: email,
                    pass: pass,
                    remember: remember
                },
                dataType: 'JSON',
                success: function(response) {
                   
                    res = JSON.parse(JSON.stringify(response));
                    if (response.status) {
                        console.log(response);
                        if(response.type == 2){
                            window.location.href = "http://localhost/Helperland/?controller=home&function=servicerDashboard";
                        }else{
                            window.location.href = "http://localhost/Helperland/?controller=home&function=customerDashboard";
                        }
                    } else {
                        $('.response-text').css('display', 'block');
                        $('.text-danger').html(res);
                        console.log(res);
                    }
                }
            });
        });
    });
</script>