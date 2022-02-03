<?php

if (isset($_COOKIE['siteCookie'])) {
    echo "<style>
        .privacy-policy-sec{
            display:none !important;
        }
    </style>";
}else if (isset($_POST['submit-cookie'])) {
    setcookie("siteCookie", "Helperland", time() + 60 * 60 * 24 * 30);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
    <!--********* Main Screen Banner Section start************-->
    <section class="main-screen" id="main-screen">
        <header>
            <nav class="navbar navbar-expand-lg fixed-top " id="navbar">
                <a class="navbar-brand" href="index.php" target="blank"><img src="assets/images/white-logo-transparent-background.png" alt="" class="logo" id="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
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
                        <li class="nav-item login-rounded-btn">
                            <a class="nav-link " href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                        </li>
                        <li class="nav-item rounded-btn">
                            <a class="nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=spReg' ?>" target="_blank">Become a Helper</a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink " role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/flag.png" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-content" aria-labelledby="navbarDropdownMenuLink ">
                                <a class="dropdown-item" href="#">India</a>
                                <a class="dropdown-item" href="#">Bangladesh</a>
                                <a class="dropdown-item" href="#">France</a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>


        <div class="main-text ">
            <h1>Lorem ipsum text</h1>
            <p class="sub-text mb-0 "><img src="assets/images/forma-1-copy-10.svg " alt=" "></i>Lorem ipsum dolor sit amet consectetur adipisicing</p>
            <p class="sub-text mb-0 "><img src="assets/images/forma-1-copy-10.svg " alt=" "></i>Lorem ipsum dolor sit amet consectetur adipisicing</p>
            <p class="sub-text mb-0 ">
                <img src="assets/images/forma-1-copy-10.svg " alt=" "></i>Lorem ipsum dolor sit amet consectetur adipisicing
            </p>
        </div>
        <div class="banner-btn">
            <button type="button " class="mainscreen-btn" onclick='window.location.href="book-service.php"'>Let's Book a Cleaner</button>
        </div>



        <div class="container-fluid">
            <div class="row d-flex align-items-center banner-svgs">
                <div class="svgs col-md-3">
                    <img src="assets/images/forma-1-copy.svg " alt=" ">
                    <p class="sub-text mt-4 ">Enter your postcode</p>
                </div>
                <img src="assets/images/step-arrow-1.png " alt=" " class="curvearrow">

                <div class="svgs col-md-3">
                    <img src="assets/images/group-22.png " alt=" ">
                    <p class="sub-text mt-4 ">Select your plan</p>
                </div>

                <img src="assets/images/step-arrow-1-copy.png " alt=" " class="curvearrow">

                <div class="svgs col-md-3">
                    <img src="assets/images/forma-1.svg " alt=" ">
                    <p class="sub-text mt-4 ">Pay securely online</p>
                </div>

                <img src="assets/images/step-arrow-1.png " alt=" " class="curvearrow">

                <div class="svgs col-md-3">
                    <img src="assets/images/forma-1 (1).svg " alt=" ">
                    <p class="svg-sub-text mt-4 ">Enjoy amazing service</p>
                </div>
            </div>
        </div>


        <div class="down-btn">
            <div class="down-arrow">
                <a href="#feature-section"><img src="assets/images/down-arrow.png" alt=""></a>
            </div>
        </div>

        <!--  Homepage modal for login start -->
        <?php
        include 'views/popup-modal/login-modal.php'
        ?>
        <!--  Homepage modal for forget-pass end -->
    </section>
    <!--********* Main Screen Banner Section end************-->



    <!--********* Features Section start************-->

    <section class="section-feature" id="feature-section">
        <div class="container">
            <h2 class="text-center helperland-txt">Why Helperland</h2>
            <div class="row ms-auto">
                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4">
                    <div class="img-textsection text-center mt-4 ">
                        <img src="assets/images/group-21.png " alt=" ">
                        <h3>Experience & Vetted Professionals</h3>
                        <p>dominate the industry in scale and scope with an adaptable, extensive network that consistently delivers exceptional results.</p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4">
                    <div class="img-textsection text-center mt-4 second-sec">
                        <img src="assets/images/group-23.png " alt=" ">
                        <h3>Secure Online Payment</h3>
                        <p>dominate the industry in scale and scope with an adaptable, extensive network that consistently delivers exceptional results.</p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-lg-6 col-xl-4">
                    <div class="img-textsection text-center mt-4">
                        <img src="assets/images/group-24.png " alt=" ">
                        <h3>Dedicated Customer Service</h3>
                        <p>dominate the industry in scale and scope with an adaptable, extensive network that consistently delivers exceptional results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--********* Features Section end************-->


    <!--********* Blog Section start************-->

    <section class="third-sec blog-section">
        <div class="container-fluid ">
            <div class="blog">
                <div class="left-bg">
                    <img src="assets/images/blog-left-bg.png" alt="">
                </div>

                <div class="right-bg">
                    <img src="assets/images/blog-right-bg.png" alt="">
                </div>

                <div class="container">
                    <div class="row mx-auto blog-sec1">
                        <div class="col">
                            <div class="blog-texts">
                                <h3>Lorem ipsum dolor sit amet, consectetur
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisi sapien, suscipit ut accumsan vitae, pulvinar ac libero.</p>
                                <p>Aliquam erat volutpat. Nullam quis ex odio. Nam bibendum cursus purus, vel efficitur urna finibus vitae. Nullam finibus aliquet pharetra. Morbi in sem dolor. Integer pretium hendrerit ante quis vehicula.</p>
                                <p>Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>.
                            </div>
                        </div>

                        <div class="col">
                            <div class="blog-img">
                                <img src="assets/images/third-sec-img.png" alt="">
                            </div>
                        </div>
                    </div>

                    <h2 class="text-center our-blog-txt">Our Blog</h2>

                    <div class="row mx-auto blog-sec2 ">
                        <div class="col-md-6 col-lg-4 col-sm-12 blog-section-content ">
                            <div class="card ">
                                <img class="card-img-top " src="assets/images/third-subsec-img1.png " alt="Card image cap " width="357px" height="164px">
                                <div class="card-body ">
                                    <h5 class="card-title ">Lorem ipsum dolor sit amet</h5>
                                    <h6 class="card-subtitle mb-2 text-muted " style="font-size: 13px; ">January 28, 2019</h6>
                                    <p class="card-text ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit architecto doloremque qui quis.</p>
                                    <p class="card-text read-post-link">Read the Post <img src="assets/images/arrow-right.svg " alt=" " style="margin-left: 3px; "></p>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-lg-4 col-sm-12 blog-section-content ">
                            <div class="card ">
                                <img class="card-img-top " src="assets/images/third-subsec-img2.png " alt="Card image cap " width="357px" height="164px">
                                <div class="card-body ">
                                    <h5 class="card-title ">Lorem ipsum dolor sit amet</h5>
                                    <h6 class="card-subtitle mb-2 text-muted " style="font-size: 13px; ">January 28, 2019</h6>
                                    <p class="card-text ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit architecto doloremque qui quis.</p>
                                    <p class="card-text read-post-link ">Read the Post <img src="assets/images/arrow-right.svg " alt=" " style="margin-left: 3px; "></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 col-sm-12 blog-section-content ">
                            <div class="card ">
                                <img class="card-img-top " src="assets/images/third-subsec-img3.png " alt="Card image cap " width="357px" height="164px">
                                <div class="card-body ">
                                    <h5 class="card-title ">Lorem ipsum dolor sit amet</h5>
                                    <h6 class="card-subtitle mb-2 text-muted " style="font-size: 13px; ">January 28, 2019</h6>
                                    <p class="card-text ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit architecto doloremque qui quis.</p>
                                    <p class="card-text  read-post-link">Read the Post <img src="assets/images/arrow-right.svg " alt=" " style="margin-left: 3px; "></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--********* Blog Section end************-->


    <!--********* Community Section start************-->

    <div class="container-fluid community-sec ">

        <h2 class="text-center community-title">What our Community say</h2>

        <div class="container ">
            <div class="row ms-auto community">
                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="card sec4-card ">
                        <img class="msg-svg " src="assets/images/message.svg " alt=" " style="cursor: pointer; ">
                        <div class="card-body ">
                            <div class="community-card d-flex align-items-center mb-3 ">
                                <div class=" community-cardimg ">
                                    <img src="assets/images/sec4-cardimg1.png " alt="Card image ">
                                </div>
                                <div class="community-txt ">
                                    <h5 class="card-title ">Lary Watson</h5>
                                    <h6 class="card-subtitle mb-2 text-muted " style="font-size: 13px; ">Manchester</h6>
                                </div>
                            </div>

                            <p class="card-text ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi ducimus odit, voluptate ullam, aperiam esse consequatur.</p>
                            <p class="card-text ">Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
                            <p class="card-text mt-2 " style="font-size: 18px; cursor: pointer; ">Read More <img src="assets/images/arrow-right.svg " alt=" " style="margin-left: 3px; "></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="card sec4-card ">
                        <img class="msg-svg " src="assets/images/message.svg " alt=" " style="cursor: pointer; ">
                        <div class="card-body ">
                            <div class="community-card d-flex align-items-center mb-3 ">
                                <div class=" community-cardimg ">
                                    <img src="assets/images/sec4-cardimg2.png " alt="Card image ">
                                </div>
                                <div class="community-txt ">
                                    <h5 class="card-title ">John Smith</h5>
                                    <h6 class="card-subtitle mb-2 text-muted " style="font-size: 13px; ">Manchester</h6>
                                </div>
                            </div>

                            <p class="card-text ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi ducimus odit, voluptate ullam, aperiam esse consequatur.</p>
                            <p class="card-text ">Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
                            <p class="card-text mt-2 " style="font-size: 18px; cursor: pointer; ">Read More <img src="assets/images/arrow-right.svg " alt=" " style="margin-left: 3px; "></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="card sec4-card ">
                        <img class="msg-svg " src="assets/images/message.svg " alt=" " style="cursor: pointer; ">
                        <div class="card-body ">
                            <div class="community-card d-flex align-items-center mb-3 ">
                                <div class=" community-cardimg ">
                                    <img src="assets/images/sec4-cardimg3.png " alt="Card image ">
                                </div>
                                <div class="community-txt ">
                                    <h5 class="card-title ">Lars Johnson</h5>
                                    <h6 class="card-subtitle mb-2 text-muted " style="font-size: 13px; ">Manchester</h6>
                                </div>
                            </div>

                            <p class="card-text ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi ducimus odit, voluptate ullam, aperiam esse consequatur.</p>
                            <p class="card-text ">Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
                            <p class="card-text mt-2 " style="font-size: 18px; cursor: pointer; ">Read More <img src="assets/images/arrow-right.svg " alt=" " style="margin-left: 3px; "></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="newsletter ">

            <div class="up-arrow">
                <a href="#main-screen"><img src="assets/images/up-arrow.png" alt=""></a>
            </div>

            <div class="newsletter-input">
                <h5 class="text-center newsletter-heading">GET OUR NEWSLETTER</h5>

                <form action=" ">
                    <div class="form-group d-flex flex-wrap align-items-center justify-content-center ">
                        <input type="email " class="form-control " id="InputEmail " aria-describedby="emailHelp " placeholder="YOUR EMAIL ">
                        <button type="submit " class="btn-submit ">Submit</button>
                    </div>
                </form>

            </div>

            <div class="timer-icon">
                <img src="assets/images/timer-icon.png " alt=" ">
            </div>
        </div>
    </div>
    <!--********* Community Section end************-->

    <!--********* Footer Section start************-->
    <div class="container-fluid footer-section ">
        <footer>
            <div class="footer-content">
                <a href="index.php" target="blank"><img src="assets/images/footer-logo.png " alt=" "></a>
                <nav class="nav footer-nav justify-content-center">
                    <a class="nav-link" href="index.php" target="blank">Home</a>
                    <a class="nav-link " href="about.php" target="blank">About</a>
                    <a class="nav-link " href="#" target="blank">Testimonials</a>
                    <a class="nav-link " href="faq.php" target="blank">faqs</a>
                    <a class="nav-link " href="# ">Insurance Policy</a>
                    <a class="nav-link " href="# ">Impressum</a>
                </nav>
                <div class="footer-icon">
                    <i class="fa fa-facebook fb-icon "></i>
                    <i class="fa fa-instagram insta-icon "></i>
                </div>
            </div>

        </footer>
    </div>

    <div class="container-fluid privacy-policy-sec">
        <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea iste pariatur cumque. <span style="color:#6EABEF; ">Privacy Policy</span></p>
        <form action="" method="post">
            <button type="submit" class="btn-ok" id="privacy-policy-accept" name="submit-cookie" onclick="privacy_policy_btn()">OK!</button>
        </form>

    </div>

    <!--********* Footer Section end ************-->
    
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js "></script>

</body>

</html>