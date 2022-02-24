    <!--customer screen banner start-->
    <?php
    if (isset($_SESSION['islogin']) == false) {
        echo "<script>alert('you must have to login first before accessing this page.');</script>";
        echo "<script>window.location.href='$arr[base_url]';</script>";
    }
    ?>
    <?php
    include 'controllers/custDashboardController.php';
    $ser = new custDashboardController();
    $services = $ser->newServices();
    ?>
    <!--customer screen banner end-->

    <!--customer screen sidebar for mobile view start-->
    <?php
    include 'views/sidebar.php';
    ?>

    <!--customer screen sidebar for mobile view end-->

    <!--customer screen welcome area start-->

    <section class="welcome-user">
        <div class="welcome-text">
            <h2>Welcome, <?php echo $_SESSION['userName']; ?></h2>
        </div>
    </section>

    <!--customer screen welcome area end-->

    <!--customer screen left vertical tabs-->
    <section class="tab-sections">
        <div class="container">
            <div class="row main-content">
                <div class="col-sm-5 col-md-2 col-lg-3">
                    <div class="nav flex-column nav-tab v-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                        <a class="nav-link" id="v-pills-service-history-tab" data-toggle="pill" href="#v-pills-service-history" role="tab" aria-controls="v-pills-service-history" aria-selected="true">Service History</a>
                        <a class="nav-link" id="v-pills-service-sche-tab" data-toggle="pill" href="#v-pills-service-sche" role="tab" aria-controls="v-pills-service-sche" aria-selected="false">Service Schedule</a>
                        <a class="nav-link" id="v-pills-favourite-pros-tab" data-toggle="pill" href="#v-pills-favourite-pros" role="tab" aria-controls="v-pills-favourite-pros" aria-selected="false">Favourite Pros</a>
                        <a class="nav-link" id="v-pills-invoices-tab" data-toggle="pill" href="#v-pills-invoices" role="tab" aria-controls="v-pills-invoices" aria-selected="false">Invoices</a>
                        <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false">Notification</a>
                    </div>
                </div>

                <!--customer screen dashboard area start-->
                <div class="col-sm-12 col-md-10 col-lg-9 cust-dashboard">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active dashboard" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                            <div class="current-service-req">
                                <h5>Current Service Request</h5>
                                <button>Add New Service Request</button>
                            </div>
                            <!--customer screen dashboard table start-->
                            <div class="table-responsive-sm current-service-req-table">
                                <table class="table">
                                    <thead class="table-header">
                                        <tr>
                                            <th scope="col">Service Id</th>
                                            <th scope="col">Service Date</th>
                                            <th scope="col">Service Provider</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($services as $s) {
                                            if ($s['Status'] == 1 || $s['Status'] == 2) {

                                                $address = $ser->getAddress($s['ServiceRequestId']);
                                                $extra = $ser->getExtraServices($s['ServiceRequestId']);
                                                $id = $s['ServiceId'];
                                                $datetime = new DateTime($s['ServiceStartDate']);
                                                $sDate = $datetime->format('Y-m-d');
                                                $sTime = $datetime->format('H:i');
                                                $sHours = $s['ServiceHours'];
                                                $time = (strtotime($sTime) + (60 * 60 * $sHours));
                                                $endtime = date('H:i', $time);
                                                $payment = $s['TotalCost'];
                                                $comments = $s['Comments'];
                                                $pets = $s['HasPets'];



                                        ?>
                                                <tr>
                                                    <td class="s-id"><?php echo $id; ?></td>

                                                    <td>
                                                        <div class="service-info service-modal-toggler">
                                                            <div class="service-datetime-icons">
                                                                <a href="#"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                                <a href="#"><img src="assets/images/sp-timericon.png" alt=" "></a>

                                                                <?php
                                                                include 'popup-modal/current-service-modal.php';
                                                                ?>
                                                            </div>
                                                            <div class="service-datetime-texts">
                                                                <a href="#"><strong><?php echo $sDate; ?></strong></a>
                                                                <a href="#">
                                                                    <p><?php echo $sTime . "-" . $endtime; ?></p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($s['ServiceProviderId'] == null) { ?>

                                                        <?php } else {
                                                            $spData = $ser->getServicerData($s['ServiceProviderId']);
                                                        ?>
                                                            <div class="sp-content">
                                                                <div class="sp-avatar">
                                                                    <img src="assets/images/avatar-hat.png" alt="">
                                                                </div>
                                                                <div class="sp-name-rating">
                                                                    <b class="spName"><?php echo $spData['FirstName'] . " " . $spData['LastName']; ?></b>
                                                                    <div class="sp-rating">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/grey-small-star.png" alt="">
                                                                        <span>3.67</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="payment-content">
                                                            <b>$<?php echo $payment; ?></b>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn-reschedule" data-toggle="modal" data-target="#reschedule-modal">Reschedule</button>
                                                            <div class="modal fade" id="reschedule-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle">Reschedule Service Request</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>Select new date & time</span>
                                                                            <div class="select-date-time">
                                                                                <div class="form-group">
                                                                                    <input type="date" name="" id="" class="date-picker">
                                                                                    <select name="" id="">
                                                                                        <option value="">08:00</option>
                                                                                        <option value="">08:30</option>
                                                                                        <option value="">09:00</option>
                                                                                        <option value="">09:30</option>
                                                                                        <option value="">10:00</option>
                                                                                        <option value="">10:30</option>
                                                                                        <option value="">11:00</option>
                                                                                        <option value="">11:30</option>
                                                                                        <option value="">12:00</option>
                                                                                        <option value="">12:30</option>
                                                                                        <option value="">01:00</option>
                                                                                        <option value="">01:30</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn-modal-accept">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn-cancel" data-target="#cancel-modal" data-toggle="modal">Cancel</button>
                                                            <div class="modal fade" id="cancel-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLongTitle">Cancel Service Request</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <span>Why you want to cancel the service request?</span>
                                                                            <div class="form-group">
                                                                                <textarea name=""></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn-modal-accept">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                        <?php }
                                        } ?>

                                    </tbody>
                                </table>
                                <div class="row total-records">
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="shown-records">
                                            <span>Show</span>
                                            <select name=" " id=" ">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                            </select>
                                            <span>entries total record: <span>1</span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="navigate-page">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link " href="# " aria-label="Previous">
                                                            <span aria-hidden="true"><img src="assets/images/first-page.png" alt=""></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item "><a class="page-link " href="# "><span><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                    <li class="page-item "><a class="page-link active" href="# ">1</a></li>
                                                    <li class="page-item "><a class="page-link" href="#"><span class="next-icon"><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                    <li class="page-item">
                                                        <a class="page-link " href="# " aria-label="Next">
                                                            <span aria-hidden="true" class="next-icon"><img src="assets/images/first-page.png" alt=""></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--customer screen dashboard table end-->

                        </div>
                        <!--customer screen dashboard area end-->

                        <!--customer screen service history tab start-->
                        <div class="tab-pane fade service-history" id="v-pills-service-history" role="tabpanel" aria-labelledby="v-pills-service-history-tab">

                            <!-- <div class="tab-label">
                                <h5>Service History</h5>
                                <a href="#"><img src="assets/images/filter.png" alt=""></a>
                            </div> -->
                            <div class="row total-records">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="shown-records payment-and-export">
                                        <h5>Service History</h5>
                                        <div class="export-btn">
                                            <button type="button">Export</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--customer screen service history table start-->
                            <div class="table-responsive-sm cust-service-history-table">
                                <table class="table">
                                    <thead class="table-header">
                                        <tr>
                                            <th scope="col">Service Id</th>
                                            <th scope="col">Service Date</th>
                                            <th scope="col">Service Provider</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Rate SP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($services as $s) {
                                            if ($s['Status'] == 3 || $s['Status'] == 4 || $s['Status']==5) {

                                                $address = $ser->getAddress($s['ServiceRequestId']);
                                                $extra = $ser->getExtraServices($s['ServiceRequestId']);
                                                $id = $s['ServiceId'];
                                                $datetime = new DateTime($s['ServiceStartDate']);
                                                $sDate = $datetime->format('Y-m-d');
                                                $sTime = $datetime->format('H:i');
                                                $sHours = $s['ServiceHours'];
                                                $time = (strtotime($sTime) + (60 * 60 * $sHours));
                                                $endtime = date('H:i', $time);
                                                $payment = $s['TotalCost'];
                                                $comments = $s['Comments'];
                                                $pets = $s['HasPets'];
                                        ?>
                                                <tr>
                                                    <td class="s-id"><?php echo $id; ?></td>
                                                    <td>
                                                        <div class="service-history-table" >
                                                            <div class="service-info2">
                                                                <div class="service-datetime-icons">
                                                                    <a href="#" ><img src="assets/images/calender-icon.png" alt=" "></a>
                                                                    <a href="#"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                                    <!--customer screen service history modal start-->
                                                                    <?php
                                                                    include 'popup-modal/service-history-modal.php';
                                                                    ?>
                                                                    <!--customer screen service history modal end-->

                                                                </div>
                                                                <div class="service-datetime-texts">
                                                                    <a href="#" data-toggle="modal" data-target="#cust-service-history-modal"><strong><?php echo $sDate; ?></strong></a>
                                                                    <a href="#" data-toggle="modal" data-target="#cust-service-history-modal">
                                                                        <p><?php echo $sTime . "-" . $endtime; ?></p>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        if ($s['ServiceProviderId'] == null) { ?>

                                                        <?php } else {
                                                            $spData = $ser->getServicerData($s['ServiceProviderId']);
                                                        ?>
                                                            <div class="sp-content">
                                                                <div class="sp-avatar">
                                                                    <img src="assets/images/avatar-hat.png" alt="">
                                                                </div>
                                                                <div class="sp-name-rating">
                                                                    <b class="spName-sh"><?php echo $spData['FirstName'] . " " . $spData['LastName']; ?></b>
                                                                    <div class="sp-rating">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/yellow-small-star.png" alt="">
                                                                        <img src="assets/images/grey-small-star.png" alt="">
                                                                        <span>3.67</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="payment-content">
                                                            <b>$<?php echo $payment; ?></b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if ($s['Status'] == 3) { ?>
                                                            <div class="status-completed">
                                                                <span>Completed</span>
                                                            </div>
                                                        <?php } else if ($s['Status'] == 4) { ?>
                                                            <div class="status-cancelled">
                                                                <span>Cancelled</span>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="status-refund">
                                                                <span>Refund</span>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="action-buttons">
                                                            <button class="btn-rate-sp" data-toggle="modal" data-target="#rate-sp-modal2">Rate SP</button>

                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--customer screen service history table end-->

                            <!--customer screen pagination start-->
                            <div class="row total-records">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="shown-records">
                                        <span>Show</span>
                                        <select name=" " id=" ">
                                            <option value=" ">10</option>
                                            <option value=" ">20</option>
                                            <option value=" ">30</option>
                                        </select>
                                        <span>entries total record: <span>1</span></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="navigate-page ">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination ">
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Previous ">
                                                        <span aria-hidden="true "><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only ">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item "><a class="page-link " href="# "><span><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item "><a class="page-link active " href="# ">1</a></li>
                                                <li class="page-item "><a class="page-link " href="# "><span class="next-icon"><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Next ">
                                                        <span aria-hidden="true " class="next-icon"><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only ">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!--customer screen pagination end-->

                        </div>
                        <!--customer screen service history tab end-->

                        <div class="tab-pane fade" id="v-pills-service-sche" role="tabpanel" aria-labelledby="v-pills-service-sche-tab">
                            ...
                        </div>

                        <!--customer screen my rating tab content start-->
                        <div class="tab-pane fade my-rating" id="v-pills-favourite-pros" role="tabpanel" aria-labelledby="v-pills-favourite-pros-tab">
                            <div class="tab-label">
                                <h5>Favourite Pros</h5>
                            </div>
                            <div class="favourite-sp">

                                <div class="card">
                                    <div class="card-image">
                                        <img src="assets/images/avatar-hat.png" alt="">
                                    </div>
                                    <h5>First Customer</h5>
                                    <div class="rating-stars">
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/grey-small-star.png" alt=""></a>
                                        <span>0</span>
                                    </div>
                                    <p class="text-center">0 cleaning</p>
                                    <div class="favourite-pro-btns">
                                        <div class="btn-remove">
                                            <button type="button">Remove</button>
                                        </div>
                                        <div class="btn-block">
                                            <button type="button">Block</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-image">
                                        <div class="card-image">
                                            <img src="assets/images/avatar-car.png" alt="">
                                        </div>
                                    </div>
                                    <h5>First Customer</h5>
                                    <div class="rating-stars">
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/yellow-small-star.png" alt=""></a>
                                        <a href=""><img src="assets/images/grey-small-star.png" alt=""></a>
                                        <span>3.67</span>
                                    </div>
                                    <p class="text-center">16 cleaning</p>
                                    <div class="favourite-pro-btns">
                                        <div class="btn-remove">
                                            <button type="button">Remove</button>
                                        </div>
                                        <div class="btn-block">
                                            <button type="button">Block</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row total-records">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="shown-records">
                                        <span>Show</span>
                                        <select name=" " id=" ">
                                            <option value=" ">10</option>
                                            <option value=" ">20</option>
                                            <option value=" ">30</option>
                                        </select>
                                        <span>entries total record: <span>1</span></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="navigate-page ">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination ">
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Previous ">
                                                        <span aria-hidden="true "><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only ">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item "><a class="page-link " href="# "><span><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item "><a class="page-link active " href="# ">1</a></li>
                                                <li class="page-item "><a class="page-link " href="# "><span class="next-icon"><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Next ">
                                                        <span aria-hidden="true " class="next-icon"><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only ">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--customer screen my rating tab content end-->

                        <!--customer screen invoices tab start-->
                        <div class="tab-pane fade" id="v-pills-invoices" role="tabpanel" aria-labelledby="v-pills-invoices-tab">
                            <div class="row total-records">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="shown-records">
                                        <span>Show</span>
                                        <select name=" " id=" ">
                                            <option value=" ">10</option>
                                            <option value=" ">20</option>
                                            <option value=" ">30</option>
                                        </select>
                                        <span>entries total record: <span>1</span></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="navigate-page ">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination ">
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Previous ">
                                                        <span aria-hidden="true "><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only ">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item "><a class="page-link " href="# "><span><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item "><a class="page-link active " href="# ">1</a></li>
                                                <li class="page-item "><a class="page-link " href="# "><span class="next-icon"><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Next ">
                                                        <span aria-hidden="true " class="next-icon"><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only ">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--customer screen invoices tab end-->

                        <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">
                            ...
                        </div>

                        <!--customer screen dropdown my setting content start-->
                        <div class="tab-pane fade my-setting" id="v-pills-my-setting" role="tabpanel" aria-labelledby="pills-settings-tab">
                            <nav>
                                <!--customer screen dropdown my setting tabs-->
                                <div class="nav nav-tabs" id="nav-tab" role="tablistd">
                                    <a class="nav-item nav-link active" id="nav-my-details-tab" data-toggle="tab" href="#nav-my-details" role="tab" aria-controls="nav-my-details-tab" aria-selected="true">My Details</a>
                                    <a class="nav-item nav-link" id="nav-change-pass-tab" data-toggle="tab" href="#nav-my-address" role="tab" aria-controls="nav-my-address" aria-selected="false">My Address</a>
                                    <a class="nav-item nav-link" id="nav-change-pass-tab" data-toggle="tab" href="#nav-change-pass" role="tab" aria-controls="nav-change-pass" aria-selected="false">Change Password</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <!--customer screen dropdown my setting in My details tab content start-->
                                <div class="tab-pane fade show active" id="nav-my-details" role="tabpanel" aria-labelledby="nav-my-details-tab">
                                    <div class="details">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="firstname ">First name</label>
                                                        <input type="email " class="form-control form-control-lg " id="firstname ">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="lastname ">Last name</label>
                                                        <input type="email " class="form-control form-control-lg " id="lastname ">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="email ">E-mail address</label>
                                                        <input type="email " class="form-control form-control-lg " id="email " value="abc@yopmail.com " disabled>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <div class="sp-reg-form">
                                                    <form action=" ">
                                                        <label for="phone">Phone number</label>
                                                        <div class="input-group-prepend ">
                                                            <div class="input-group-text ">+91</div>
                                                            <input type="tel " class="form-control phone-no" id="phone" placeholder="Phone number" required>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 dob spaces">
                                                <label for=" ">Date of birth</label>
                                                <div class="dob-fields ">
                                                    <form action=" " class="day ">
                                                        <div class="form-group ">
                                                            <select class="form-control-lg date-select " id="date ">
                                                                <option>01</option>
                                                                <option>02</option>
                                                                <option>03</option>
                                                                <option>04</option>
                                                                <option>05</option>
                                                                <option>06</option>
                                                                <option>07</option>
                                                                <option>08</option>
                                                                <option>09</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                                <option>13</option>
                                                                <option>14</option>
                                                                <option>15</option>
                                                                <option>16</option>
                                                                <option>17</option>
                                                                <option>18</option>
                                                                <option>19</option>
                                                                <option>20</option>
                                                                <option>21</option>
                                                                <option>22</option>
                                                                <option>23</option>
                                                                <option>24</option>
                                                                <option>25</option>
                                                                <option>26</option>
                                                                <option>27</option>
                                                                <option>28</option>
                                                                <option>29</option>
                                                                <option>30</option>
                                                                <option>31</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                    <form action=" " class="month ">
                                                        <div class="form-group ">
                                                            <select class="form-control-lg " id="month ">
                                                                <option>January</option>
                                                                <option>February</option>
                                                                <option>March</option>
                                                                <option>April</option>
                                                                <option>May</option>
                                                                <option>June</option>
                                                                <option>July</option>
                                                                <option>August</option>
                                                                <option>September</option>
                                                                <option>October</option>
                                                                <option>November</option>
                                                                <option>December</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                    <form action=" " class="year">
                                                        <div class="form-group">
                                                            <select class="form-control-lg" id="year">
                                                                <option>1982</option>
                                                                <option>1983</option>
                                                                <option>1984</option>
                                                                <option>1985</option>
                                                                <option>1986</option>
                                                                <option>1987</option>
                                                                <option>1988</option>
                                                                <option>1989</option>
                                                                <option>1990</option>
                                                                <option>1991</option>
                                                                <option>1992</option>
                                                                <option>1993</option>
                                                                <option>1994</option>
                                                                <option>1995</option>
                                                                <option>1996</option>
                                                                <option>1997</option>
                                                                <option>1998</option>
                                                                <option>1999</option>
                                                                <option>2000</option>
                                                                <option>2001</option>
                                                                <option>2002</option>
                                                                <option>2003</option>
                                                                <option>2004</option>
                                                                <option>2005</option>
                                                                <option>2006</option>
                                                                <option>2007</option>
                                                                <option>2008</option>
                                                                <option>2009</option>
                                                                <option>2010</option>
                                                                <option>2011</option>
                                                                <option>2012</option>
                                                                <option>2013</option>
                                                                <option>2014</option>
                                                                <option>2015</option>
                                                                <option>2016</option>
                                                                <option>2017</option>
                                                                <option>2018</option>
                                                                <option>2019</option>
                                                                <option>2020</option>
                                                                <option>2021</option>
                                                                <option>2022</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="preferred-lang">
                                                    <p>My Preferred Language</p>
                                                </div>
                                                <div class="form-group language-select">
                                                    <select name="" id="">
                                                        <option value="">English</option>
                                                        <option value="">Hindi</option>
                                                    </select>
                                                </div>
                                                <div class="btn-save">
                                                    <button type="button">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--customer screen dropdown my setting in My details tab content end-->

                                <!--customer screen dropdown my setting in My address tab content start-->
                                <div class="tab-pane fade" id="nav-my-address" role="tabpanel" aria-labelledby="nav-my-address-tab">
                                    <div class="address-table">
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <thead class="table-header">
                                                    <tr>
                                                        <th scope="col">Addresses</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="address-phone-data">
                                                            <b>Address: </b><span>Koenigstrasse 112, 99879 Tambach-Dietharz</span><br>
                                                            <b>Phone number: </b><span>8844775532</span>
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#edit-addr-modal"><img src="assets/images/edit-icon.png" alt=""></a>
                                                            <a data-toggle="modal" data-target="#delete-addr-modal"><img src="assets/images/delete-icon.png" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="address-phone-data">
                                                            <b>Address: </b><span>Koenigstrasse 112, 99879 Tambach-Dietharz</span><br>
                                                            <b>Phone number: </b><span>8844775532</span>
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#edit-addr-modal"><img src="assets/images/edit-icon.png" alt=""></a>
                                                            <a data-toggle="modal" data-target="#delete-addr-modal"><img src="assets/images/delete-icon.png" alt=""></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="address-phone-data">
                                                            <b>Address: </b><span>Koenigstrasse 112, 99879 Tambach-Dietharz</span><br>
                                                            <b>Phone number: </b><span>8844775532</span>
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#edit-addr-modal"><img src="assets/images/edit-icon.png" alt=""></a>
                                                            <a data-toggle="modal" data-target="#delete-addr-modal"><img src="assets/images/delete-icon.png" alt=""></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="add-new-addr-btn">
                                            <button type="button" data-toggle="modal" data-target="#add-addr-modal">Add New Address</button>
                                        </div>

                                        <!--customer screen my address tab edit address modal start-->
                                        <div class="modal fade" id="edit-addr-modal" tabindex="-1" role="dialog" aria-labelledby="edit-addr-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Edit Address</h4>

                                                        <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="edit-details">
                                                            <div class="address-fields">
                                                                <div class="street-name">
                                                                    <label for="street">Street Name</label>
                                                                    <input type="text" name="" id="street" class="form-control" value="Koenigstrasse">
                                                                </div>
                                                                <div class="house-no">
                                                                    <label for="house">House Number</label>
                                                                    <input type="text" name="" id="house" class="form-control" value="112">
                                                                </div>
                                                            </div>
                                                            <div class="postalcode-city">
                                                                <div class="postalcode">
                                                                    <label for="postalcode">Postal Code</label>
                                                                    <input type="tel" name="" id="postalcode" class="form-control" value="99897">
                                                                </div>
                                                                <div class="city">
                                                                    <label for="city">City</label>
                                                                    <select name="" id="city">
                                                                        <option value="">Tambach-Dietharz</option>
                                                                        <option value="">Tambach-Dietharz</option>
                                                                        <option value="">Tambach-Dietharz</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="edit-phone">
                                                                <form action=" ">
                                                                    <label for="phone">Phone number</label>
                                                                    <div class="input-group-prepend">

                                                                        <div class="input-group-text ">+91</div>
                                                                        <input type="tel " class="form-control phone-no" id="phone" placeholder="Phone number" value="8844775532" required>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn-edit">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--customer screen my address tab edit address modal end-->

                                        <!--customer screen my address tab add address modal start-->
                                        <div class="modal fade" id="add-addr-modal" tabindex="-1" role="dialog" aria-labelledby="add-addr-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Add New Address</h4>

                                                        <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="edit-details">
                                                            <div class="address-fields">
                                                                <div class="street-name">
                                                                    <label for="street">Street Name</label>
                                                                    <input type="text" name="" id="street" class="form-control">
                                                                </div>
                                                                <div class="house-no">
                                                                    <label for="house">House Number</label>
                                                                    <input type="text" name="" id="house" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="postalcode-city">
                                                                <div class="postalcode">
                                                                    <label for="postalcode">Postal Code</label>
                                                                    <input type="tel" name="" id="postalcode" class="form-control">
                                                                </div>
                                                                <div class="city">
                                                                    <label for="city">City</label>
                                                                    <select name="" id="city">
                                                                        <option value="">Tambach-Dietharz</option>
                                                                        <option value="">Tambach-Dietharz</option>
                                                                        <option value="">Tambach-Dietharz</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="edit-phone">
                                                                <form action=" ">
                                                                    <label for="phone">Phone number</label>
                                                                    <div class="input-group-prepend">

                                                                        <div class="input-group-text ">+91</div>
                                                                        <input type="tel " class="form-control phone-no" id="phone" placeholder="Phone number" required>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn-edit">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--customer screen my address tab add address modal end-->

                                        <!--customer screen my address tab delete address modal start-->
                                        <div class="modal fade" id="delete-addr-modal" tabindex="-1" role="dialog" aria-labelledby="delete-addr-modal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Delete Address</h4>

                                                        <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this address?</p>

                                                        <div class="btn-delete">
                                                            <button type="button">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--customer screen my address tab delete address modal end-->
                                    </div>

                                </div>
                                <!--customer screen dropdown my setting in My address tab content end-->
                                <div class="tab-pane fade" id="nav-change-pass" role="tabpanel" aria-labelledby="nav-change-pass-tab">
                                    <div class="change-password">
                                        <div class="row details">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group">
                                                        <label for="old-pass ">Old password</label>
                                                        <input type="password" class="form-control form-control-lg " id="old-pass ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row details ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="new-pass ">New password</label>
                                                        <input type="password " class="form-control form-control-lg " id="new-pass ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row details ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="confirm-pass ">Confirm password</label>
                                                        <input type="password " class="form-control form-control-lg " id="confirm-pass ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row address-field ">
                                            <div class="btn-setting-save ">
                                                <button type="button ">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--customer screen dropdown my setting content end-->
                    </div>
                </div>
            </div>
    </section>
    <!--footer start-->

    <script src="assets/js/custDashboard.js"></script>
    <script>
        // <?php
            //     include 'assets/js/custDashboard.js';
            // 
            ?>


        // $(document).on("click", ".service-modal-toggler", function(e) {
        //     var data = $(this).first().data('service');
        //     var address = $(this).first().data('address');
        //     var extra = $(this).first().data('extra');
        //     $("#current-service-modal").data('service', data);
        //     $("#current-service-modal").data('address', address);
        //     $("#current-service-modal").data('extra', extra);
        //     $("#current-service-modal").modal('show');

        // });

        // $(document).on('show.bs.modal', '#current-service-modal', function(e) {
        //     var data = $(this).data('service');
        //     var address = $(this).data('address');
        //     var extra = $(this).data('extra');

        //     console.log(data);
        //     // alert(data.ServiceStartDate)

        //     $('#sid').html(data.UserId);
        //     console.log(address);
        //     console.log(extra);


        // });

        // $(document).on('hidden.bs.modal', '#current-service-modal', function(e) {
        //     $(this).data(null);
        //     $("#current-service-modal").modal('hide');
        // });
    </script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
function showLoader(){
  $.LoadingOverlay("show",{
    background  : "rgba(0, 0, 0, 0.7)"
  });
}
$.LoadingOverlay("hide"); -->

    <?php
    include 'views/footer.php';
    ?>