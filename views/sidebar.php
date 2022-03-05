<?php if (isset($_SESSION['islogin']) && isset($_SESSION['expire'])) {

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
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">Dashboard</a>
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">Service History</a>
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">Service Schedule</a>
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">Favourite Pros</a>
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">Invoices</a>
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">Notification</a>
            <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=customerDashboard';?>" onclick="closeSideBar()">My Settings</a>
            <a class="nav-link" data-target="#logout-modal" data-toggle="modal">Logout</a>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=bookService';?>">Book Now</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=prices';?>">Prices & Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Warranty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=contact';?>">Contact</a>
            </li>
        </ul>

        <div class="sidebar-social-icons">
            <i class="fa fa-facebook fb-icon"></i>
            <i class="fa fa-instagram insta-icon"></i>
        </div>
    </nav>
</section>
<?php } else { ?>
<section class="sidebar" id="sidebar">
    <div class="book-service-sidebar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $arr['base_url'].'?controller=home&function=bookService';?>" onclick="closeSideBar()">Book Now</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=prices';?>" onclick="closeSideBar()">Prices & Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" onclick="closeSideBar()">Warranty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" onclick="closeSideBar()">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=contact';?>" onclick="closeSideBar()">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#login-modal" onclick="closeSideBar()">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $arr['base_url'].'?controller=home&function=spReg';?>" onclick="closeSideBar()">Become a Helper</a>
            </li>
        </ul>

        <div class="sidebar-social-icons">
            <i class="fa fa-facebook fb-icon"></i>
            <i class="fa fa-instagram insta-icon"></i>
        </div>
    </div>
</section>
<?php } ?>