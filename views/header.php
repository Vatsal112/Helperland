<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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


</head>


<body>

<?php
    include 'views/popup-modal/login-modal.php';
?>

    <!--********* prices banner section start************-->
    <section class="prices-banner" id="prices-banner">
        <header>
            <nav class="faq-nav navbar navbar-expand-lg fixed-top" id="common-navbar">
                <a class="navbar-brand" href="index.php" target="blank"><img src="assets/images/logo-small.png" alt="" class="logo" id="faq-nav"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class=" nav-item booknow-rounded-btn">
                            <a class="nav-link active " aria-current="page " href="<?php echo $arr['base_url'].'?controller=home&function=book-now';?>" target="blank">Book Now</a>
                        </li>
                        <li class="nav-item rounded-btn">
                            <a class="nav-link " href="<?php echo $arr['base_url'].'?controller=home&function=prices';?>" target="blank">Prices & Services</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="# ">Warrantee</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="# ">Blog</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo $arr['base_url'].'?controller=home&function=contact';?>" target="blank">Contact us</a>
                        </li>
                        <li class="nav-item faq-login rounded-btn">
                            <a class="nav-link " data-target="#login-modal" data-toggle="modal" data-dismiss="modal">Login</a>
                        </li>
                        <li class="nav-item rounded-btn helper">
                            <a class=" nav-link " href="<?php echo $arr['base_url'].'?controller=home&function=sp-reg';?>" target="blank">Become a Helper</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    