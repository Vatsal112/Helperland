
        <div class="prices-banner-img ">
            <img src="assets/images/about-banner.png " alt=" ">
        </div>

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Login to your account</h4>
                        <span aria-hidden="true" data-dismiss="modal" class="close-btn">&times;</span>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <div class="login-email">
                                    <input type="email" name="" id="" placeholder="Email" required>
                                    <img src="assets/images/user-login-icon.png" alt="">
                                </div>

                                <div class="login-password">
                                    <input type="password" name="" id="" placeholder="Password" required>
                                    <img src="assets/images/password-icon.png" alt="">
                                </div>

                                <div class="remember-me">
                                    <input type="checkbox" name="" id="remember-me" class="form-check-input">
                                    <label for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="btn-login">
                                <button type="button">Login</button>
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
    </section>
    <!--********* about banner section end************-->

    <!--********* about main section start************-->
    <section>
        <div class="container About">
            <h2 class="faq-heading ">A Few words about us</h2>

            <div class="underline-design ">
                <div class="line " style="margin-right: 10px;"></div>
                <img src="assets/images/faq-star.png " alt=" ">
                <div class="line " style="margin-left: 10px;"></div>
            </div>

            <div class="paragraphs">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie convallis tempor. Duis vestibulum vel risus condimentum dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis
                    enim orci. Fusce risus lacus, sollicitudin eu magna sed, pharetra sodales libero. Proin tincidunt vel erat id porttitor. Donec tristique est arcu, sed dignissim velit vulputate ultricies. </p>
                <p>
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Vivamus eget mauris eget nisl euismod volutpat sed sed libero. Quisque sit amet lectus ex. Ut semper ligula et mauris tincidunt hendrerit. Aenean ut rhoncus
                    orci, vel elementum turpis. Donec tempor aliquet magna eu fringilla. Nam lobortis libero ut odio finibus lobortis. In hac habitasse platea dictumst. Mauris a hendrerit felis. Praesent ac vehicula ipsum, at porta tellus. Sed dolor augue,
                    posuere sed neque eget, aliquam ultricies velit. Sed lacus elit, tincidunt et massa ac, vehicula placerat lorem.
                </p>
            </div>
        </div>
    </section>

    <section>
        <div class="container our-story">
            <h2 class="faq-heading ">Our Story</h2>

            <div class="underline-design ">
                <div class="line " style="margin-right: 10px;"></div>
                <img src="assets/images/faq-star.png " alt=" ">
                <div class="line " style="margin-left: 10px;"></div>
            </div>

            <div class="paragraphs">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean molestie convallis tempor. Duis vestibulum vel risus condimentum dictum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis
                    enim orci. Fusce risus lacus, sollicitudin eu magna sed, pharetra sodales libero. Proin tincidunt vel erat id porttitor. Donec tristique est arcu, sed dignissim velit vulputate ultricies. </p>
                <p>
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. In hac habitasse platea dictumst. Vivamus eget mauris eget nisl euismod volutpat sed sed libero. Quisque sit amet lectus ex. Ut semper ligula et mauris tincidunt hendrerit.
                </p>
                <p>
                    Aenean ut rhoncus orci, vel elementum turpis. Donec tempor aliquet magna eu fringilla. Nam lobortis libero ut odio finibus lobortis. In hac habitasse platea dictumst. Mauris a hendrerit felis. Praesent ac vehicula ipsum, at porta tellus. Sed dolor augue,
                    posuere sed neque eget, aliquam ultricies velit. Sed lacus elit, tincidunt et massa ac, vehicula placerat lorem.
                </p>
            </div>
        </div>
    </section>
    <!--********* about banner section end************-->

<?php
    include 'footer.php';
?>