<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Pro</title>
    <style>
        <?php
        include 'assets/css/style.css';
        include 'assets/css/responsive.css';

        ?>
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

<body>

    <!--********** Sp banner start ************-->
    <section class="sp-banner">
        <header>
            <nav class="navbar navbar-expand-lg fixed-top " id="navbar">
                <a class="navbar-brand" href="index.html" target="blank"><img src="assets/images/white-logo-transparent-background.png" alt="" class="logo" id="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class=" nav-item rounded-btn">
                            <a class="nav-link active " aria-current="page" href="book-service.html" target="blank">Book a Cleaner</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="Prices.html" target="blank">Prices</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="# ">Our Guarantee</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="# ">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="contact.html" target="blank">Contact us</a>
                        </li>
                        <li class="nav-item login-rounded-btn">
                            <a class="nav-link " data-target="#login-modal" data-toggle="modal" data-dismiss="modal">Login</a>
                        </li>
                        <li class="nav-item rounded-btn">
                            <a class="nav-link " href="sp-reg.html" target="blank">Become a Helper</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="sp-reg">
            <div class="banner-form-text">
                <p>Register Now!</p>
            </div>
            <div class="sp-reg-form">
                <form action="<?php echo $arr['base_url'] . '?controller=user&function=spRegister'; ?>" method="POST">

                <?php
                    if(isset($_GET['status'])==1){
                        echo "<div class='status-message'>";
                        echo "<p class='text-success'>We have send an account activation link for your account kindly check your mail.</p>";
                        echo "<a  onclick='hideMessage()'><i class='fa fa-close'></i></a>";
                        echo "</div>";
                    }

                    if(isset($_GET['message']) && $_GET['message']!=''){
                        foreach(explode(",",$_GET['message'])as $e){
                            echo "<p class='text-danger mb-0'>";
                            echo $e;
                            echo "</p>";
                        }
                    }
                ?>
                    <input type="text" placeholder="First name" class="form-control" name="firstname" required>
                    <input type="text" placeholder="Last name" class="form-control" name="lastname" required>
                    <input type="email"  id="" placeholder="Email" class="form-control" name="email" required autocomplete="TRUE"> 
                    <div class="input-group-prepend ">
                        <div class="input-group-text">+91</div>
                        <input type="number" class="form-control phone-no" name="phone" id="inlineFormInputGroup" placeholder="Phone number" required>
                    </div>
                    <input type="password" name="pass" id="" class="form-control" placeholder="Password" required>
                    <input type="password" name="c-pass" id="" class="form-control" placeholder="Confirm Password" required>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="newsletter" id="newsletter-check" required>
                        <label class="form-check-label" for="newsletter-check">Send me newsletters from helperland</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="terms" id="terms-check" required>
                        <label class="form-check-label" for="terms-check">I accept <span class="sp-terms-text">terms and conditions</span> & <span class="sp-terms-text">privacy policy</span></label>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6Lf0nsEdAAAAAKsRo81aQlkhP92FPXbgDi3HMP-4" aria-required="true"></div>
                    <div class="btn-getstarted">
                        <button type="submit" class="form-submit sp-reg-btn">Get Started <img src="assets/images/arrow-white.png" alt=""></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="down-btn">
            <div class="down-arrow">
                <a href="#how-it-works"><img src="assets/images/down-arrow.png" alt=""></a>
            </div>
        </div>

    <?php
        include 'views/popup-modal/login-modal.php'
    ?>
    </section>
    <!--********** Sp banner end ************-->


    <!--********** Sp working-info start ************-->
    <section class="working-info" id="how-it-works">
        <div class="container-fluid">
            <div class="how-it-works">
                <div class="graphics">
                    <div class="left-bg">
                        <img src="assets/images/blog-left-bg.png" alt="">
                    </div>

                    <div class="right-bg">
                        <img src="assets/images/blog-right-bg.png" alt="">
                    </div>
                </div>

                <h2>How it Works</h2>

                <div class="sp-content">
                    <div class="content1">
                        <div class="sp1">
                            <h3>Register yourself</h3>
                            <p>Provide your basic information to register</p>
                            <p>yourself as a service provider.</p>
                            <div class="readmore">
                                <a href="#" class="sp-readmore">Read More <img src="assets/images/arrow-right.svg" alt="" class="sp-arrow-img"></a>
                            </div>
                        </div>
                        <div class="sp-img">
                            <img src="assets/images/sp-content-img1.png" alt="" class="sp-img1">
                        </div>
                    </div>
                    <div class="content2">
                        <div class="sp-img-round">
                            <img src="assets/images/sp-content-img2.png" alt="">
                        </div>
                        <div class="sp1">
                            <h3>Get service requests</h3>
                            <p>You will get service requests from</p>
                            <p> customes depend on service area and profile.</p>
                            <div class="readmore">
                                <a href="#" class="sp-readmore">Read More <img src="assets/images/arrow-right.svg" alt="" class="sp-arrow-img"></a>
                            </div>
                        </div>

                    </div>
                    <div class="content3">
                        <div class="sp1">
                            <h3>Complete service</h3>
                            <p>Accept service requests from your customers </p>
                            <p>and complete your work.</p>
                            <div class="readmore">
                                <a href="#" class="sp-readmore">Read More <img src="assets/images/arrow-right.svg" alt="" class="sp-arrow-img"></a>
                            </div>
                        </div>
                        <div class="sp-img-round">
                            <img src="assets/images/sp-content-img3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--********** Sp working-info end ************-->


    <!--********** Sp newsletter start ************-->
    <section class="newsletter">
        <div class="sp-newsletter">
            <h5 class="text-center newsletter-heading">GET OUR NEWSLETTER</h5>

            <form action=" ">
                <div class="sp-newsletter-input">
                    <input type="email" class="form-control sp-email" id="InputEmail" aria-describedby="emailHelp " placeholder="YOUR EMAIL">
                    <button type="submit" class="btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <!--********** Sp newsletter end ************-->



    <!--********** Sp footer start ************-->
    <div class="container-fluid footer-section faq-footer">
        <footer>
            <div class="footer-content ">
                <a href="index.html" target="blank"><img src="assets/images/footer-logo.png " alt=" "></a>
                <nav class="nav footer-nav justify-content-center ">
                    <a class="nav-link " href="index.html" target="blank">Home</a>
                    <a class="nav-link " href="about.html" target="blank">About</a>
                    <a class="nav-link " href="# " target="blank">Testimonials</a>
                    <a class="nav-link " href="FAQ's.html" target="blank">faqs</a>
                    <a class="nav-link " href="# ">Insurance Policy</a>
                    <a class="nav-link " href="# ">Impressum</a>
                </nav>
                <div class="footer-icon">
                    <i class="fa fa-facebook fb-icon "></i>
                    <i class="fa fa-instagram insta-icon "></i>
                </div>

            </div>
            <p class="text-center copyrights ">©2018 Helperland. All rights reserved. &nbsp;&nbsp;&nbsp;<a href="">Terms and Conditions</a> <span>&nbsp;|&nbsp;</span> <a href="">Privacy Policy</a> </p>
        </footer>
    </div>

    <!--********** Sp footer end ************-->

    <script src="assets/js/main.js"></script>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js "></script>

</body>

</html>