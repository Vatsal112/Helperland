    <?php
    $toggle = "";
    if (isset($_GET['parameter'])) {
        $toggle = $_GET['parameter'];
    }
    ?>

    <?php
    if (isset($_SESSION['islogin']) == false) {
        echo "<script>alert('you must have to login first before accessing this page.');</script>";
        echo "<script>window.location.href='$arr[base_url]';</script>";
    }
    ?>
    <!--customer screen banner end-->

    <!--customer screen sidebar for mobile view start-->
    <?php
    include 'views/sidebar.php';
    include 'controllers/custDashboardController.php';
    $dashboard = new custDashboardController();
    $customerData = $dashboard->loadCustomerData();
    $customerAddress = $dashboard->loadCustomerAddress();
    ?>

    <!--customer screen sidebar for mobile view end-->

    <!--customer screen welcome area start-->

    <section class="welcome-user">
        <div class="welcome-text">
            <input type="hidden" value="<?php echo $toggle; ?>" id="toggle-id">
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
                        <a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
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
                                <button onclick=window.location.href="<?php echo $arr['base_url'] . '?controller=home&function=bookService'; ?>">Add New Service Request</button>
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
                                    <tbody id="tbody">

                                    </tbody>

                                </table>
                                <div class="row total-records">
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="shown-records">
                                            <span>Show</span>
                                            <select id="dashboard-table-rows-per-page" onchange="changeRowsPerPage(this.value); getPendingServiceRequests()">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <!-- <option value="">30</option> -->
                                            </select>
                                            <span>entries total record: <span id="service-request-total-records">1</span></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="navigate-page">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination" id="current-service-pagiation">
                                                    <li class="page-item">
                                                        <a class="page-link " href="#" id="pendingRequestFirstPage" aria-label="Previous">
                                                            <span aria-hidden="true"><img src="assets/images/first-page.png" alt=""></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item "><a class="page-link" href="# " id="btn-previous"><span><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                    <li class="page-item "><a class="page-link active" href="# " id="currentPage">1</a></li>
                                                    <li class="page-item "><a class="page-link" id="btn-next" href="#"><span class="next-icon"><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                    <li class="page-item">
                                                        <a class="page-link " href="# " aria-label="Next" id="pendingRequestLastPage">
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
                                            <button type="button" onclick="exportTableToCSV('service-history')">Export</button>
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
                                    <tbody id="cust-service-history">
                                    </tbody>
                                </table>
                            </div>
                            <!--customer screen service history table end-->

                            <!--customer screen pagination start-->
                            <div class="row total-records">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="shown-records">
                                        <span>Show</span>
                                        <select name=" " id="sh-table-rows-per-page" onchange="changeRowsPerPageServiceHistory(this.value); getServiceHistoryData()">

                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                        </select>
                                        <span>entries total record: <span id="service-history-total-record-count">1</span></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-lg-6">
                                    <div class="navigate-page ">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination ">
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Previous" id="serviceHistoryFirstPageBtn">
                                                        <span aria-hidden="true"><img src="assets/images/first-page.png" alt=""></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#" id="serviceHistory-btnPrevious"><span><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item "><a class="page-link active " href="# " id="service-history-pageno">1</a></li>
                                                <li class="page-item "><a class="page-link " href="# " id="serviceHistory-btnNext"><span class="next-icon"><img src="assets/images/keyboard-right-arrow-button-copy.png" alt=""></span></a></li>
                                                <li class="page-item ">
                                                    <a class="page-link " href="# " aria-label="Next" id="serviceHistoryLastPageBtn">
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
                                <?php
                                // foreach ($getFavSp as $favsp) {

                                //     $totalCleaning = 0;
                                // foreach ($ratings as $favSpRating) {
                                //     $rating = $favSpRating['AvgRatings'];
                                //     for ($i = 0; $i < floor($rating); $i++) {
                                //         $j++;
                                //         $spStar .= "<i class='fa fa-star checked'></i>";
                                //     }
                                //     if (floor($rating) < $favSpRating['AvgRatings']) {
                                //         $j++;
                                //         $spStar .= "<i class='fa fa-star-half-o checked'></i>";
                                //     }
                                //     if ($j < 5) {
                                //         for ($k = 0; $k < 5 - $j; $k++) {
                                //             $spStar .= "<i class='fa fa-star-o'></i>";
                                //         }
                                //     }
                                ?>
                            
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
                                        <div class='status-message'>
                                            <p class='text-success' id="text-ok3"></p>
                                        </div>
                                        <div class="response-text">
                                            <p id="response3" class="text-danger mb-0"></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">

                                                <form action=" ">
                                                    <div class="form-group">
                                                        <label for="firstname">First name</label>
                                                        <input type="text" class="form-control form-control-lg" id="customer-firstname" value="<?php echo $customerData['FirstName']; ?>">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="lastname ">Last name</label>
                                                        <input type="text" class="form-control form-control-lg " id="customer-lastname" value="<?php echo $customerData['LastName']; ?>">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="email">E-mail address</label>
                                                        <input type="email" class="form-control form-control-lg " id="customer-email" value="<?php echo $customerData['Email']; ?>" disabled>
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
                                                            <input type="tel " class="form-control phone-no" id="customer-phone" placeholder="Phone number" value="<?php echo $customerData['Mobile']; ?>" required>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <?php
                                            if ($customerData['DateOfBirth'] != null) {
                                                $dob = explode("-", $customerData['DateOfBirth']);
                                                $dob[2] = substr($dob[2], 0, 2);
                                                $month = date("F", mktime(0, 0, 0, $dob[1]));
                                            ?>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 dob spaces">
                                                    <label for=" ">Date of birth</label>
                                                    <div class="dob-fields ">
                                                        <form action=" " class="day ">
                                                            <div class="form-group ">
                                                                <select class="form-control-lg date-select" id="customer-date">

                                                                    <option value="<?php echo $dob[2]; ?>"><?php echo $dob[2]; ?></option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                        <form action=" " class="month ">
                                                            <div class="form-group ">
                                                                <select class="form-control-lg " id="customer-month">
                                                                    <option value="<?php echo $dob[1]; ?>"><?php echo $month; ?></option>
                                                                    <option value="01">January</option>
                                                                    <option value="02">February</option>
                                                                    <option value="03">March</option>
                                                                    <option value="04">April</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">June</option>
                                                                    <option value="07">July</option>
                                                                    <option value="08">August</option>
                                                                    <option value="09">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                        <form action=" " class="year">
                                                            <div class="form-group">
                                                                <select class="form-control-lg" id="customer-year">
                                                                    <option value="<?php echo $dob[0]; ?>"><?php echo $dob[0]; ?></option>
                                                                    <option value="1982">1982</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1989">1989</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 dob spaces">
                                                    <label for=" ">Date of birth</label>
                                                    <div class="dob-fields ">
                                                        <form action=" " class="day ">
                                                            <div class="form-group ">
                                                                <select class="form-control-lg date-select" id="customer-date">

                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                        <form action=" " class="month ">
                                                            <div class="form-group ">
                                                                <select class="form-control-lg " id="customer-month">
                                                                    <option value="01">January</option>
                                                                    <option value="02">February</option>
                                                                    <option value="03">March</option>
                                                                    <option value="04">April</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">June</option>
                                                                    <option value="07">July</option>
                                                                    <option value="08">August</option>
                                                                    <option value="09">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                        <form action=" " class="year">
                                                            <div class="form-group">
                                                                <select class="form-control-lg" id="customer-year">
                                                                    <option value="1982">1982</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1989">1989</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="preferred-lang">
                                                    <p>My Preferred Language</p>
                                                </div>
                                                <div class="form-group language-select">
                                                    <select name="" id="customer-language">
                                                        <option value="1">English</option>
                                                        <option value="2">Hindi</option>
                                                    </select>
                                                </div>
                                                <div class="btn-save">
                                                    <button type="button" onclick="customerMyDetails()">Save</button>
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
                                                    <?php
                                                    foreach ($customerAddress as $address) {
                                                        if ($address['IsDeleted'] == 0) {
                                                    ?>
                                                            <tr>
                                                                <td class="address-phone-data">
                                                                    <input type="hidden" value="<?php echo $address['AddressId'] ?>" id="delete-address-id">
                                                                    <b>Address: </b><span><?php echo $address['AddressLine1']; ?></span><br>
                                                                    <b>Phone number: </b><span><?php echo $address['Mobile']; ?></span>
                                                                </td>
                                                                <td>
                                                                    <a data-toggle="modal" data-target="#edit-addr-modal" onclick='editAddress(<?php echo json_encode($address); ?>)' data-dismiss="modal"><img src="assets/images/edit-icon.png" alt=""></a>
                                                                    <a data-toggle="modal" data-target="#delete-addr-modal" data-dismiss="modal" onclick='deleteAddressModal(<?php echo json_encode($address["AddressId"]); ?>)'><img src="assets/images/delete-icon.png" alt=""></a>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="add-new-addr-btn">
                                            <button type="button" data-toggle="modal" data-target="#add-addr-modal" data-dismiss="modal">Add New Address</button>
                                        </div>
                                        <!--customer screen my address tab edit address modal start-->
                                        <div class="modal fade" id="edit-addr-modal" tabindex="-1" role="dialog" aria-labelledby="edit-addr-modal" aria-hidden="true">
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
                                                            <div class='status-message'>
                                                                <p class='text-success' id="text-ok5"></p>
                                                            </div>
                                                            <div class="response-text">
                                                                <p id="response5" class="text-danger mb-0"></p>
                                                            </div>
                                                            <div class="address-fields">
                                                                <div class="street-name">
                                                                    <label for="street">Street Name</label>
                                                                    <input type="text" name="" id="new-street" class="form-control" required>
                                                                </div>
                                                                <div class="house-no">
                                                                    <label for="house">House Number</label>
                                                                    <input type="text" name="" id="new-house" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="postalcode-city">
                                                                <div class="postalcode">
                                                                    <label for="postalcode">Postal Code</label>
                                                                    <input type="tel" name="" id="new-postalcode" class="form-control" oninput="getCity()" required>
                                                                </div>
                                                                <div class="city">
                                                                    <label for="city">City</label>
                                                                    <select name="" id="new-city" required>
                                                                        <option value=""></option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="edit-phone">
                                                                <form action=" ">
                                                                    <label for="phone">Phone number</label>
                                                                    <div class="input-group-prepend">

                                                                        <div class="input-group-text ">+91</div>
                                                                        <input type="tel " class="form-control phone-no" id="new-phone" placeholder="Phone number" required>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn-edit" id="add-new-addr-btn" onclick="addNewAddress()">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--customer screen my address tab add address modal end-->

                                        <!--customer screen my address tab delete address modal start-->
                                        <div class="modal fade" id="delete-addr-modal" tabindex="-1" role="dialog" aria-labelledby="delete-addr-modal" aria-hidden="true">
                                        </div>
                                        <!--customer screen my address tab delete address modal end-->
                                    </div>

                                </div>
                                <!--customer screen dropdown my setting in My address tab content end-->
                                <div class="tab-pane fade" id="nav-change-pass" role="tabpanel" aria-labelledby="nav-change-pass-tab">
                                    <div class="change-password">
                                        <div class='status-message'>
                                            <p class='text-success' id="text-ok6"></p>
                                        </div>
                                        <div class="response-text">
                                            <p id="response6" class="text-danger mb-0"></p>
                                        </div>
                                        <div class="row details">
                                            <div class="col-md-4 col-sm-12 spaces ">

                                                <form action=" ">
                                                    <div class="form-group">
                                                        <label for="old-pass">Old password</label>
                                                        <input type="password" class="form-control form-control-lg " id="old-pass">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row details ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="new-pass">New password</label>
                                                        <input type="password" class="form-control form-control-lg " id="new-pass">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row details ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="confirm-pass">Confirm password</label>
                                                        <input type="password" class="form-control form-control-lg " id="confirm-pass">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row address-field ">
                                            <div class="btn-setting-save">
                                                <button type="button" onclick="changePassword()" id="pass-save-btn">Save</button>
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
        function editAddress(address) {
            var addressLine = address['AddressLine1'].substr(0, address['AddressLine1'].indexOf(","));
            var street = addressLine.split(/[ ,]+/);
            $('#edit-addr-modal').html(`
            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <h4 class="modal-title" id="exampleModalLongTitle">Edit Address</h4>

                                                        <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class='status-message'>
                                                        <p class='text-success' id="text-ok4"></p>
                                                    </div>
                                                    <div class="response-text">
                                                        <p id="response4" class="text-danger mb-0"></p>
                                                    </div>
                                                        <div class="edit-details">
                                                            <div class="address-fields">
                                                                <div class="street-name">
                                                                    <input type="hidden" value="${address['AddressId']}" id="address-id">
                                                                    <label for="street">Street Name</label>
                                                                    <input type="text" name="" id="edited-street" class="form-control" value="${street[0]}">
                                                                </div>
                                                                <div class="house-no">
                                                                    <label for="house">House Number</label>
                                                                    <input type="text" name="" id="edited-houseno" class="form-control" value="${street[1]}">
                                                                </div>
                                                            </div>
                                                            <div class="postalcode-city">
                                                                <div class="postalcode">
                                                                    <label for="postalcode">Postal Code</label>
                                                                    <input type="tel" name="" id="edited-postalcode" class="form-control" value="${address['PostalCode']}">
                                                                </div>
                                                                <div class="city">
                                                                    <label for="city">City</label>
                                                                    <select name="" id="edited-city">
                                                                        <option value="${address['City']}">${address['City']}</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="edit-phone">
                                                                <form action=" ">
                                                                    <label for="phone">Phone number</label>
                                                                    <div class="input-group-prepend">

                                                                        <div class="input-group-text ">+91</div>
                                                                        <input type="tel" class="form-control phone-no" id="edited-phone" placeholder="Phone number" value="${address['Mobile']}" required>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn-edit" id="edit-addr-btn" onclick="SubmitEditAddress()">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            `);

            $('#edit-addr-modal').modal('show');

            $(".close-btn").click(function() {
                $("#edit-addr-modal").modal("hide");

                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
            });
        }
    </script>


    <?php
    include 'views/footer.php';
    ?>