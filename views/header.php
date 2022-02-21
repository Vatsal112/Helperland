<?php
session_start();
?>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js" integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>

</head>


<body>

    <?php
    include 'views/popup-modal/login-modal.php';
    ?>

    <!--********* prices banner section start************-->
    <?php if (isset($_SESSION['islogin']) && isset($_SESSION['expire']) && isset($_SESSION['userType'])) {
        if ($_SESSION['userType'] == 1) {
            $now = time();
            if ($now > $_SESSION['expire']) {
                echo "<script>alert('Session is expired');</script>";
                unset($_SESSION['islogin']);
                echo "<script>window.location.href='$arr[base_url]';</script>";
            }


    ?>
            <section class="customer-screen-banner">

                <header>
                    <nav class="faq-nav navbar navbar-expand-lg fixed-top" id="faq-navbar">

                        <a class="navbar-brand" href="index.php"><img src="assets/images/logo-small.png" alt="" class="logo" id="faq-nav"></a>
                        <div class="notification-icon-smallscreen">
                            <nav class="navbar">
                                <ul class="navbar-nav">
                                    <li class="nav-item notification-icon d-flex">
                                        <span>2</span>
                                        <a class="nav-link" href="#"><img src="assets/images/icon-notification.png" alt=""></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" id="toggle-icon" onclick="openSideBar()" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"> <i class="fa fa-navicon"></i></span>
                        </button>
                        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item text-link book-now">
                                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=bookService'; ?>">Book Now</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>">Prices & Services</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="#">Warranty</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>">Contact</a>
                                </li>
                                <div class="noti-user-icons">
                                    <li class="nav-item notification-icon d-flex">
                                        <span>2</span>
                                        <a class="nav-link" href="#"><img src="assets/images/icon-notification.png" alt=""></a>
                                    </li>
                                    <div class="dropdown user-icon d-flex align-items-center">
                                        <button class="dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <a class="nav-link" href="#"><img src="assets/images/user.png" alt=""></a>
                                            <a class="nav-link" href="#"><img src="assets/images/sp-arrow-down.png" alt="" class="sp-down-arrow"></a>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <div class="username">
                                                <p>Welcome, <b><?php echo $_SESSION['userName']; ?></b></p>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" id="v-pills-dashboard-tab" href="<?php echo $arr['base_url'] . '?controller=home&function=customerDashboard'; ?>"  onclick="removeActive(event)">My Dashborad</a>

                                            <a class="dropdown-item" id="pills-settings-tab" href="<?php echo $arr['base_url'] . '?controller=home&function=customerDashboard'; ?>"  onclick="removeActive(event)">My Setting</a>
                                            <a class="dropdown-item" href="index.html" data-toggle="modal" data-target="#logout-modal">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </nav>
                </header>
            </section>
        <?php } else if ($_SESSION['userType'] == 2) { ?>
            <section class="customer-screen-banner">

                <header>
                    <nav class="faq-nav navbar navbar-expand-lg fixed-top" id="faq-navbar">

                        <a class="navbar-brand" href="index.php"><img src="assets/images/logo-small.png" alt="" class="logo" id="faq-nav"></a>
                        <div class="notification-icon-smallscreen">
                            <nav class="navbar">
                                <ul class="navbar-nav">
                                    <li class="nav-item notification-icon d-flex">
                                        <span>2</span>
                                        <a class="nav-link" href="#"><img src="assets/images/icon-notification.png" alt=""></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" id="toggle-icon" onclick="openSideBar()" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"> <i class="fa fa-navicon"></i></span>
                        </button>
                        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>">Prices & Services</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="#">Warranty</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <li class="nav-item text-link">
                                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>">Contact</a>
                                </li>
                                <div class="noti-user-icons">
                                    <li class="nav-item notification-icon d-flex">
                                        <span>2</span>
                                        <a class="nav-link" href="#"><img src="assets/images/icon-notification.png" alt=""></a>
                                    </li>
                                    <div class="dropdown user-icon d-flex align-items-center">
                                        <button class="dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <a class="nav-link" href="#"><img src="assets/images/user.png" alt=""></a>
                                            <a class="nav-link" href="#"><img src="assets/images/sp-arrow-down.png" alt="" class="sp-down-arrow"></a>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <div class="username">
                                                <p>Welcome, <b><?php echo $_SESSION['userName']; ?></b></p>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" id="v-pills-dashboard-tab" href="<?php echo $arr['base_url'] . '?controller=home&function=servicerDashboard'; ?>"  onclick="removeActive(event)">My Dashborad</a>

                                            <a class="dropdown-item" id="pills-settings-tab" href="<?php echo $arr['base_url'] . '?controller=home&function=servicerDashboard'; ?>"  onclick="removeActive(event)">My Setting</a>
                                            <a class="dropdown-item" href="index.html" data-toggle="modal" data-target="#logout-modal">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </nav>
                </header>
            </section>
        <?php }
    } else { ?>
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
                                <a class="nav-link active " aria-current="page " href="<?php echo $arr['base_url'] . '?controller=home&function=bookService'; ?>" target="blank">Book Now</a>
                            </li>
                            <li class="nav-item rounded-btn">
                                <a class="nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>" target="blank">Prices & Services</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="# ">Warrantee</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="# ">Blog</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>" target="blank">Contact us</a>
                            </li>
                            <li class="nav-item faq-login rounded-btn">
                                <a class="nav-link " data-target="#login-modal" data-toggle="modal" data-dismiss="modal">Login</a>
                            </li>

                            <li class="nav-item rounded-btn helper">
                                <a class=" nav-link " href="<?php echo $arr['base_url'] . '?controller=home&function=sp-reg'; ?>" target="blank">Become a Helper</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
        </section>
    <?php } ?>
    <!--logout modal start-->
    <?php
    include 'popup-modal/logout-modal.php';
    ?>