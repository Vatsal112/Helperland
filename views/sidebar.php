<?php if (isset($_SESSION['islogin']) && isset($_SESSION['expire']) && isset($_SESSION['userType'])) {
     if ($_SESSION['userType'] == 1) {
    $now = time();
    if ($now > $_SESSION['expire']) {
        echo "<script>alert('Session is expired');</script>";
        unset($_SESSION['islogin']);
        echo "<script>window.location.href='$arr[base_url]';</script>";
    }
?>

    <section class="sidebar" id="sidebar">
        <div class="username">
            <p>Welcome, </p>
            <b><?php echo $_SESSION['userName']; ?></b>
        </div>
        <nav class="navigation">
            <div class="nav flex-column nav-tab" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                <a class="nav-link" id="v-pills-service-history-tab" data-toggle="pill" href="#v-pills-service-history" role="tab" aria-controls="v-pills-service-history" aria-selected="true">Service History</a>
                <a class="nav-link" id="v-pills-service-sche-tab" data-toggle="pill" href="#v-pills-service-sche" role="tab" aria-controls="v-pills-service-sche" aria-selected="false">Service Schedule</a>
                <a class="nav-link" id="v-pills-favourite-pros-tab" data-toggle="pill" href="#v-pills-favourite-pros" role="tab" aria-controls="v-pills-favourite-pros" aria-selected="false">Favourite Pros</a>
                <a class="nav-link" id="v-pills-invoices-tab" data-toggle="pill" href="#v-pills-invoices" role="tab" aria-controls="v-pills-invoices" aria-selected="false">Invoices</a>
                <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false">Notification</a>
                <a class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#v-pills-my-setting" role="tab" aria-controls="v-pills-my-setting-tab" aria-selected="false" >My Settings</a>
                <a class="nav-link" data-target="#logout-modal" data-toggle="modal">Logout</a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=bookService'; ?>">Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>">Prices & Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Warranty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>">Contact</a>
                </li>
            </ul>

            <div class="sidebar-social-icons">
                <i class="fa fa-facebook fb-icon"></i>
                <i class="fa fa-instagram insta-icon"></i>
            </div>
        </nav>
    </section>
    <?php } else if ($_SESSION['userType'] == 2) {?>
        <section class="sidebar" id="sidebar">
        <div class="username">
            <p>Welcome, </p>
            <b><?php echo $_SESSION['userName']; ?></b>
        </div>
        <nav class="navigation">
            <div class="nav flex-column nav-tab" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                <a class="nav-link" id="v-pills-new-service-req-tab" data-toggle="pill" href="#v-pills-new-service-req" role="tab" aria-controls="v-pills-new-service-req" aria-selected="true" 
                        onclick="fillNewServiceTable()">New Service Request</a>
                <a class="nav-link" id="v-pills-upcoming-ser-tab" data-toggle="pill" href="#v-pills-upcoming-ser" role="tab" aria-controls="v-pills-upcoming-ser" aria-selected="false" >Upcoming Services</a>
                <a class="nav-link" id="v-pills-service-sche-tab" data-toggle="pill" href="#v-pills-service-sche" role="tab" aria-controls="v-pills-service-sche" aria-selected="false">Service Schedule</a>
                <a class="nav-link" id="v-pills-service-history-tab" data-toggle="pill" href="#v-pills-service-history" role="tab" aria-controls="v-pills-service-history" aria-selected="false">Service History</a>
                <a class="nav-link" id="v-pills-my-rating-tab" data-toggle="pill" href="#v-pills-my-rating" role="tab" aria-controls="v-pills-my-rating" aria-selected="false">My Ratings</a>
                <a class="nav-link" id="v-pills-block-cust-tab" data-toggle="pill" href="#v-pills-block-cust" role="tab" aria-controls="v-pills-block-cust" aria-selected="false">Block Customer</a>
                <a class="nav-link" id="s-pills-settings-tab" data-toggle="pill" href="#s-pills-my-setting" role="tab" aria-controls="s-pills-my-setting-tab" aria-selected="false" >My Settings</a>
                <a class="nav-link" data-target="#logout-modal" data-toggle="modal">Logout</a>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>">Prices & Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Warranty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>">Contact</a>
                </li>
            </ul>

            <div class="sidebar-social-icons">
                <i class="fa fa-facebook fb-icon"></i>
                <i class="fa fa-instagram insta-icon"></i>
            </div>
        </nav>
    </section>
<?php }} else { ?>
    <section class="sidebar" id="sidebar">
        <div class="book-service-sidebar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo $arr['base_url'] . '?controller=home&function=bookService'; ?>" onclick="closeSideBar()">Book Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=prices'; ?>" onclick="closeSideBar()">Prices & Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" onclick="closeSideBar()">Warranty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" onclick="closeSideBar()">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=contact'; ?>" onclick="closeSideBar()">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#login-modal" onclick="closeSideBar()">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $arr['base_url'] . '?controller=home&function=spReg'; ?>" onclick="closeSideBar()">Become a Helper</a>
                </li>
            </ul>

            <div class="sidebar-social-icons">
                <i class="fa fa-facebook fb-icon"></i>
                <i class="fa fa-instagram insta-icon"></i>
            </div>
        </div>
    </section>
<?php } ?>

<script>
    var open = false;
    let openSideBar = () => {
        if (!open) {
            open = true;
            document.getElementById("sidebar").classList.add("active");
        } else {
            open = false;
            document.getElementById("sidebar").classList.remove("active");
        }
    };
    let closeSideBar = () => {
        open = false;
        document.getElementById("sidebar").classList.remove("active");
    };
</script>