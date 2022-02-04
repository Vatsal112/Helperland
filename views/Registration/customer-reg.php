<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

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
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
</head>

<body>
    <!--  Customer Registration banner start-->
    <section class="customer-reg-banner">

        <header>
            <nav class="faq-nav navbar navbar-expand-lg fixed-top">

                <a class="navbar-brand" href="index.php"><img src="assets/images/logo-small.png" alt="" class="logo" id="faq-nav"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" id="toggle-icon" onclick="openSideBar()" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <i class="fa fa-navicon"></i></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto" id="cust-nav">
                        <li class=" nav-item rounded-btn">
                            <a class="nav-link active " aria-current="page " href="book-service.php" target="_blank">Book a Cleaner</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>" target="_blank">Prices</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#">Our Guarantee</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>" target="_blank">Contact us</a>
                        </li>
                        <li class="nav-item rounded-btn">
                            <a class="nav-link " href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
                        <li class="nav-item rounded-btn">
                            <a class="nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=sp-reg' ?>" target="_blank">Become a Helper</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

    </section>

    <?php
    include 'views/popup-modal/login-modal.php'
    ?>
    <!--  Customer Registration banner end -->

    <!--  Customer Registration page sidebar for mobile view start -->
    <section class="sidebar" id="sidebar">
        <div class="create-account-customer">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="" onclick="closeSideBar()">Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Prices.html" onclick="closeSideBar()">Prices & Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" onclick="closeSideBar()">Warranty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" onclick="closeSideBar()">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html" onclick="closeSideBar()">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#login-modal" onclick="closeSideBar()">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sp-reg.html" onclick="closeSideBar()">Become a Helper</a>
                </li>
            </ul>

            <div class="sidebar-social-icons">
                <i class="fa fa-facebook fb-icon"></i>
                <i class="fa fa-instagram insta-icon"></i>
            </div>
        </div>
    </section>
    <!--  Customer Registration page sidebar for mobile view end -->

    <!--  Customer Registration page reg-form start -->
    <section class="create-account-cust">
        <div class="container">
            <h2 class="faq-heading ">Create an Account</h2>

            <div class="underline-design ">
                <div class="line"></div>
                <img src="assets/images/faq-star.png " alt=" ">
                <div class="line"></div>
            </div>

            <div class="reg-form">
                <form method="POST">
                    <div class='status-message'>
                        <p class='text-success' id="text-ok2"></p>
                        <a onclick='hideMessage()'><i class='fa fa-close'></i></a>
                    </div>
                    <div class="response-text">
                        <p id="response3" class="text-danger mb-0"></p>
                        <p id="res" class="text-danger mb-0"></p>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="text" class="form-control" name="firstname" placeholder="First name" id="fname" onfocusout="showMessage(this.id)" required>
                            <p class="text-danger msg-text mb-0"></p>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="text" class="form-control" placeholder="Last name" name="lastname" id="lname" onfocusout="showMessage(this.id)" required>
                            <p class="text-danger msg-text mb-0"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="email" name="email" id="emailId" placeholder="E-mail address" onfocusout="showMessage(this.id)" class="form-control" required>
                            <p class="text-danger msg-text mb-0"></p>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="input-group-prepend ">
                                <div class="input-group-text">+91</div>
                                <input type="number" class="form-control phone-no" id="phone" name="phone" onfocusout="showMessage(this.id)" placeholder="Phone number" required>
                            </div>
                            <p class="text-danger msg-text mb-0"></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="password" class="form-control" id="password" name="pass" placeholder="Password" onkeydown="checkPass(this.id)" onfocusout="showMessage(this.id)" required>
                            <p class="text-danger msg-text mb-0"></p>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="password" class="form-control" id="c-pass" name="cpass" onkeydown="checkPass(this.id)" onfocusout="showMessage(this.id)" placeholder="Confirm Password" required>
                            <p class="text-danger msg-text mb-0"></p>
                        </div>
                    </div>

                    <div class="form-group form-check d-flex align-items-center">
                        <input type="checkbox" class="form-check-input" id="terms-check" name="reg-check" required>
                        <label class="form-check-label" for="terms-check">I have read the <a href="">Privacy & Policy</a></label>
                    </div>

                    <div class="btn-reg">
                        <button type="submit" name="submit" id="register">Register</button>
                    </div>
                </form>

                <div class="already-account text-center mt-3">
                    <span>Already registered? </span><a href="" data-toggle="modal" data-target="#login-modal">Login now</a>
                </div>
            </div>
        </div>

        <!--  Customer Registration page modal for login start -->
        <?php
        include 'views/popup-modal/login-modal.php'
        ?>
        <!--  Customer Registration page modal for forget-pass end -->
    </section>
    <!--  Customer Registration page reg-form end -->

    <!--  Customer Registration page footer start -->
    <script>
        // <?php
            // include 'assets/js/main.js';
            // 
            ?>
    </script>

    <script>
        $(document).ready(function() {
            $('#register').click(function(e) {
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var email = $('#emailId').val();
                var phone = $('#phone').val();
                var pass = $('#password').val();
                var cpass = $('#c-pass').val();

                e.preventDefault();

                if ($('.status-message').css('display', 'flex')) {
                    $('.status-message').css('display', 'none')
                }

                if ($('.response-text').css('display', 'block')) {
                    $('.response-text').css('display', 'none')
                }

                $.ajax({
                    type: "post",
                    url: "http://localhost/Helperland/?controller=user&function=register_Customer",
                    data: {
                        firstname: fname,
                        lastname: lname,
                        emailId: email,
                        phone: phone,
                        password: pass,
                        cpass: cpass
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        res = JSON.parse(JSON.stringify(response));

                        if (res == "We have send an account activation link for your account kindly check your mail.") {
                            $('#text-ok2').html(res);
                            $('.status-message').css('display', 'flex');
                            console.log(res);
                        } else {
                            $('.response-text').css('display', 'block');
                            $('#res').html(res);

                            console.log(res);
                        }
                    }
                });
            });
        });
    </script>