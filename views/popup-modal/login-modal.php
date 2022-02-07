
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
                            <input type="email" name="email" id="uname" placeholder="Email" required>
                            <img src="assets/images/user-login-icon.png" alt="">
                        </div>

                        <div class="login-password">
                            <input type="password" name="pass" id="pass" placeholder="Password" required>
                            <img src="assets/images/password-icon.png" alt="">
                        </div>

                        <div class="remember-me">
                            <input type="checkbox" name="remember" id="remember-me" class="form-check-input">
                            <label for="form-check-label">Remember Me</label>
                        </div>
                    </div>

                    <div class="btn-login">
                        <button type="submit" id="btn-login" name="submit">Login</button>
                        <!-- <input type="submit" name="submit" value="Login"> -->
                        <!-- <a id="loginBtn" class="btn btn-primary"></a> -->
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
        $('#btn-login').click(function(e) {
            var email = $('#uname').val();
            var pass = $('#pass').val();
            e.preventDefault();

            if ($('.status-message').css('display', 'flex')) {
                $('.status-message').css('display', 'none')
            }

            if ($('.response-text').css('display', 'block')) {
                $('.response-text').css('display', 'none')
            }

            $.ajax({
                type: "post",
                url: "http://localhost/Helperland/?controller=user&function=userLogin",
                data: {email : email ,pass : pass},
                dataType:'JSON',
                success: function(response) {
                    res = JSON.parse(JSON.stringify(response));
                    console.log(res);
                    if (response.status) {
                        <?php
                            $_SESSION['islogin'] = true;    
                        ?>
                        console.log(response);
                        // setCookie("isLogin", true,15)
                        // localStorage.setItem("isLogin", true);
                        // localStorage.setItem("loginToken", response.loginToken);
                       window.location.href = 'http://localhost/Helperland';
                    
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