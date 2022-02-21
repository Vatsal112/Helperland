    <!--customer screen banner start-->
    <?php
    if(isset($_SESSION['islogin'])==false){
        echo "<script>alert('you must have to login first before accessing this page.');</script>";
        echo "<script>window.location.href='$arr[base_url]';</script>";
    }
?>
    <!--service provider screen banner section end-->

    <!--service provider sidebar for mobile view start-->
<?php
    include 'views/sidebar.php';
?>
    <!--service provider sidebar for mobile view end-->

    <!--service provider screen welcome text area start-->
    <section class="welcome-user">
        <div class="welcome-text">
            <h2>Welcome,  <?php echo $_SESSION['userName']; ?></h2>
        </div>
    </section>
    <!--service provider screen welcome text area end-->


    <!--service provider screen tabs and its content start-->
    <section class="tab-sections">
        <div class="container">
            <div class="row main-content">
                <div class="col-sm-5 col-md-2 col-lg-3">
                    <!--service provider screen v-tabs-->
                    <div class="nav flex-column nav-tab v-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                        <a class="nav-link" id="v-pills-new-service-req-tab" data-toggle="pill" href="#v-pills-new-service-req" role="tab" aria-controls="v-pills-new-service-req" aria-selected="true">New Service Request</a>
                        <a class="nav-link active" id="v-pills-upcoming-ser-tab" data-toggle="pill" href="#v-pills-upcoming-ser" role="tab" aria-controls="v-pills-upcoming-ser" aria-selected="false">Upcoming Services</a>
                        <a class="nav-link" id="v-pills-service-sche-tab" data-toggle="pill" href="#v-pills-service-sche" role="tab" aria-controls="v-pills-service-sche" aria-selected="false">Service Schedule</a>
                        <a class="nav-link" id="v-pills-service-history-tab" data-toggle="pill" href="#v-pills-service-history" role="tab" aria-controls="v-pills-service-history" aria-selected="false">Service History</a>
                        <a class="nav-link" id="v-pills-my-rating-tab" data-toggle="pill" href="#v-pills-my-rating" role="tab" aria-controls="v-pills-my-rating" aria-selected="false">My Ratings</a>
                        <a class="nav-link" id="v-pills-block-cust-tab" data-toggle="pill" href="#v-pills-block-cust" role="tab" aria-controls="v-pills-block-cust" aria-selected="false">Block Customer</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-10 col-lg-9 sp-dashboard">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!--service provider screen dashboard area start-->
                        <div class="tab-pane fade dashboard" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                            <div class="tab-label">
                                <h5>Dashboard</h5>
                                <a href="#"><img src="assets/images/filter.png" alt=""></a>
                            </div>

                        </div>
                        <!--service provider screen dashboard area end-->

                        <!--service provider screen new service content area start-->
                        <div class="tab-pane fade new-service" id="v-pills-new-service-req" role="tabpanel" aria-labelledby="v-pills-new-service-req-tab">
                            <div class="tab-label">
                                <h5>New Service Request</h5>
                                <a href="#"><img src="assets/images/filter.png" alt=""></a>
                            </div>
                            <div class="table-responsive-sm">
                                <div class="row total-records">
                                    <div class="col-md-6 col-sm-12 col-lg-6">
                                        <div class="shown-records">
                                            <span>Service Area</span>
                                            <select name=" " id=" ">
                                                <option value=" " selected>25 km</option>
                                                <option value=" ">20 km</option>
                                                <option value=" ">10 km</option>
                                            </select>
                                            <div class="form-check">
                                                <input class=" form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" checked>
                                                <label class="form-check-label" for="inlineCheckbox1">Include pet at home</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--service provider screen new service content table start-->
                                <table class="table">
                                    <thead class="table-header">
                                        <tr>
                                            <th scope="col"><a href=" ">Service Id <img src="assets/images/sort.png" alt=" "></a></th>
                                            <th scope="col"><a href=" ">Service Date</a></th>
                                            <th scope="col"><a href=" ">Customer Details </a></th>
                                            <th scope="col"><a href=" ">Payment</a></th>
                                            <th scope="col"><a href=" ">Time Conflict</a></th>
                                            <th scope="col"><a href=" ">Actions</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                        <!--service provider screen new service content modal start-->
                                                        <div class="modal fade" id="service-info-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-part">
                                                                        <div class="modal-header d-block">
                                                                            <div class="d-flex align-items-center">
                                                                                <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                                                                <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                                                                     <span aria-hidden="true" class="close-btn">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <p class="modal-datetime">26/12/2021 08:30 - 12:30</p>
                                                                            <span class="modal-duration"><b>Duration: </b>4.5 Hrs</span>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <span class="body-text"><b>Service Id:</b> 8803.</span>
                                                                            <span class="body-text"><b>Extras:</b> Inside oven, Laundry wash & dry</span>
                                                                            <span class="body-text"><b>Total Payment:</b> <span class="payment">60,75 &euro;</span></span>

                                                                            <div class="customer-details">
                                                                                <span class="body-text"><b>Customer Name:</b> First Customer</span>
                                                                                <span class="body-text"><b>Service Address:</b> Street 54, 53844 Troisdoff</span>
                                                                                <span class="body-text"><b>Phone:</b> +41 2244889910</span>
                                                                                <span class="body-text"><b>Email:</b> cust001@yopmail.com</span>
                                                                                <span class="body-text"><b>Distance:</b> unable to calculate the distance</span>
                                                                            </div>

                                                                            <div class="customer-details">
                                                                                <b>Comments</b>
                                                                                <p class="mb-0">hello</p>

                                                                                <div class="pets">
                                                                                    <img src="assets/images/included.png" alt=" ">
                                                                                    <p>I have Pets at home.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-modal-accept"><img src="assets/images/ic-check.png" alt=""> Accept</button>
                                                                            <!-- <button type="button" class="btn btn-modal-close" data-dismiss="modal">Close</button> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="googleMap">
                                                                        <div id="map"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--service provider screen new service content modal end-->
                                                    </div>
                                                    <div class="service-datetime-texts">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal2">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,35 &euro;</td>
                                            <td></td>
                                            <td class="btn-cancel">
                                                <button type="button" data-toggle="modal" data-target="#service-info-modal2">Accept</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal2">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,35 &euro;</td>
                                            <td></td>
                                            <td class="btn-cancel">
                                                <button type="button ">Accept</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal2">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,35 &euro;</td>
                                            <td></td>
                                            <td class="btn-cancel">
                                                <button type="button">Accept</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal2">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,35 &euro;</td>
                                            <td></td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Accept</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal2">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,35 &euro;</td>
                                            <td></td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Accept</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal2">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal2">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,35 &euro;</td>
                                            <td></td>
                                            <td class="btn-cancel">
                                                <button type="button ">Accept</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--service provider screen new service content table end-->
                            </div>

                            <!--service provider screen new service pagination and record start-->
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
                            <!--service provider screen new service pagination and record end-->
                        </div>
                        <!--service provider screen new service content area end-->

                        <!--service provider screen upcoming service content start-->
                        <div class="tab-pane fade show active upcoming-service" id="v-pills-upcoming-ser" role="tabpanel" aria-labelledby="v-pills-upcoming-ser-tab">
                            <div class="tab-label">
                                <h5>Upcoming Service</h5>
                                <a href="#"><img src="assets/images/filter.png" alt=""></a>
                            </div>
                            <!--service provider screen upcoming service content table start-->
                            <div class="table-responsive-sm">
                                <table class="table upcoming-service-table">
                                    <thead class="table-header">
                                        <tr>
                                            <th scope="col">Service Id</th>
                                            <th scope="col">Service Date</th>
                                            <th scope="col">Customer Details</th>
                                            <th scope="col">Payment</th>
                                            <th scope="col">Distance</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">

                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                        <!--service provider screen upcoming service content modal start-->
                                                        <div class="modal fade" id="service-info-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-part">
                                                                        <div class="modal-header d-block">
                                                                            <div class="d-flex align-items-center">
                                                                                <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                                                                <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                                                                     <span aria-hidden="true" class="close-btn">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <p class="modal-datetime">26/12/2021 08:30 - 12:30</p>
                                                                            <span class="modal-duration"><b>Duration: </b>4.5 Hrs</span>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <span class="body-text"><b>Service Id:</b> 8803.</span>
                                                                            <span class="body-text"><b>Extras:</b> Inside oven, Laundry wash & dry</span>
                                                                            <span class="body-text"><b>Total Payment:</b> <span class="payment">60,75 &euro;</span></span>

                                                                            <div class="customer-details">
                                                                                <span class="body-text"><b>Customer Name:</b> First Customer</span>
                                                                                <span class="body-text"><b>Service Address:</b> Street 54, 53844 Troisdoff</span>
                                                                                <span class="body-text"><b>Phone:</b> +41 2244889910</span>
                                                                                <span class="body-text"><b>Email:</b> cust001@yopmail.com</span>
                                                                                <span class="body-text"><b>Distance:</b> unable to calculate the distance</span>
                                                                            </div>

                                                                            <div class="customer-details">
                                                                                <b>Comments</b>
                                                                                <p class="mb-0 ">hello</p>

                                                                                <div class="pets">
                                                                                    <img src="assets/images/included.png" alt=" ">
                                                                                    <p>I have Pets at home.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-modal-accept">
                                                                               <img src="assets/images/ic-check.png" alt=""> Accept</button>
                                                                            <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="googleMap">
                                                                        <!-- <div id="map"></div> -->
                                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d185920.1358143786!2d10.443064982202559!3d50.95929179850134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1641187206744!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--service provider screen upcoming service content modal end-->
                                                    </div>
                                                    <div class="service-datetime-texts">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel">
                                                <button type="button" data-toggle="modal" data-target="#service-info-modal">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel">
                                                <button type="button">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>123456</td>
                                            <td>
                                                <div class="service-info ">
                                                    <div class="service-datetime-icons ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                    </div>
                                                    <div class="service-datetime-texts ">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="#" data-toggle="modal" data-target="#service-info-modal">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td>56,25 &euro;</td>
                                            <td>296 km</td>
                                            <td class="btn-cancel ">
                                                <button type="button ">Cancel</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!--service provider screen upcoming service content table end-->

                            <!--service provider screen upcoming service pagination and records start-->
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

                            <!--service provider screen upcoming service pagination and records end-->

                        </div>
                        <!--service provider screen upcoming service content end-->
                        <div class="tab-pane fade" id="v-pills-service-sche" role="tabpanel" aria-labelledby="v-pills-service-sche-tab">
                            ...
                        </div>


                        <!--service provider screen service history content start-->
                        <div class="tab-pane fade service-history" id="v-pills-service-history" role="tabpanel" aria-labelledby="v-pills-service-history-tab">

                            <div class="tab-label">
                                <h5>Service History</h5>
                                <a href="#"><img src="assets/images/filter.png" alt=""></a>
                            </div>
                            <div class="row total-records">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="shown-records payment-and-export">
                                        <span>Payments Status</span>
                                        <select name=" " id=" ">
                                            <option value=" ">All</option>
                                            <option value=" ">20</option>
                                            <option value=" ">30</option>
                                        </select>
                                        <div class="export-btn">
                                            <button type="button">Export</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--service provider screen service history table start-->
                            <div class="table-responsive-sm service-history-table">
                                <table class="table">
                                    <thead class="table-header">
                                        <tr>
                                            <th scope="col">Service Id</th>
                                            <th scope="col">Service Date</th>
                                            <th scope="col">Customer Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>123456</td>
                                            <td>
                                                <div class="service-info">
                                                    <div class="service-datetime-icons">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal3"><img src="assets/images/calender-icon.png" alt=" "></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal3"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                                        <!--service provider screen service history modal start-->
                                                        <div class="modal fade" id="service-info-modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-part">
                                                                        <div class="modal-header d-block">
                                                                            <div class="d-flex align-items-center">
                                                                                <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                                                                <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                                                                     <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <p class="modal-datetime">26/12/2021 08:30 - 12:30</p>
                                                                            <span class="modal-duration"><b>Duration: </b>4.5 Hrs</span>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <span class="body-text"><b>Service Id:</b> 8803.</span>
                                                                            <span class="body-text"><b>Extras:</b> Inside oven, Laundry wash & dry</span>
                                                                            <span class="body-text"><b>Total Payment:</b> <span class="payment">60,75 &euro;</span></span>

                                                                            <div class="customer-details">
                                                                                <span class="body-text"><b>Customer Name:</b> First Customer</span>
                                                                                <span class="body-text"><b>Service Address:</b> Street 54, 53844 Troisdoff</span>
                                                                                <span class="body-text"><b>Phone:</b> +41 2244889910</span>
                                                                                <span class="body-text"><b>Email:</b> cust001@yopmail.com</span>
                                                                                <span class="body-text"><b>Distance:</b> unable to calculate the distance</span>
                                                                            </div>

                                                                            <div class="customer-details">
                                                                                <b>Comments</b>
                                                                                <p class="mb-0 ">hello</p>

                                                                                <div class="pets">
                                                                                    <img src="assets/images/included.png" alt=" ">
                                                                                    <p>I have Pets at home.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-modal-accept">
                                                                               <img src="assets/images/ic-check.png" alt=""> Accept</button>
                                                                            <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="googleMap">
                                                                        <!-- <div id="map"></div> -->
                                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d185920.1358143786!2d10.443064982202559!3d50.95929179850134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1641187206744!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--service provider screen service history modal end-->
                                                    </div>
                                                    <div class="service-datetime-texts">
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal3"><strong>09/04/2018</strong></a>
                                                        <a href="#" data-toggle="modal" data-target="#service-info-modal3">
                                                            <p>12:00 - 18:00</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td-address">
                                                <a href="" data-toggle="modal" data-target="#service-info-modal3">
                                                    <p>David Bough</p>
                                                    <div class="service-info">
                                                        <div class="service-home-icon">
                                                            <img src="assets/images/home-icon.png" alt=" ">
                                                        </div>
                                                        <div class="service-address-texts">
                                                            <p>Musterstrabe 5,12345 Bonn</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--service provider screen service history table end-->

                            <!--service provider screen service history pagination and record start-->
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
                            <!--service provider screen service history modal end-->

                        </div>

                        <!--service provider screen service history content end-->

                        <!--service provider screen my rating content start-->
                        <div class="tab-pane fade my-rating" id="v-pills-my-rating" role="tabpanel" aria-labelledby="v-pills-my-rating-tab">
                            <div class="row rating-record">
                                <div class="tab-label">
                                    <h5>My Ratings</h5>
                                </div>
                                <div class="rating-header">
                                    <div class="col-md-6 col-sm-6 col-lg-6">

                                        <div class="shown-records">
                                            <span>Rating</span>
                                            <select name=" " id=" ">
                                                <option value=" ">All</option>
                                                <option value=" ">20</option>
                                                <option value=" ">30</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-lg-6">
                                        <div class="rating-sorting">
                                            <span>Sorting</span>
                                            <img src="assets/images/filter.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="rating-card">
                                        <div class="rating-card-content">
                                            <div class="id-name">
                                                <p>8318</p>
                                                <b>First Customer</b>
                                            </div>
                                            <div class="service-info">
                                                <a href="#"><img src="assets/images/calender-icon.png" alt=" "><strong>27/06/2019</strong></a>
                                                <a href="#"><img src="assets/images/sp-timericon.png" alt=" "><span>08:00 - 11:00</span></a>
                                            </div>

                                            <div class="rating-star">
                                                <b>ratings</b>
                                                <div class="stars">
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/grey-small-star.png" alt=""></a>
                                                    <span>Very Good</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="customer-comment">
                                            <b>Customer Comment</b>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="rating-card">
                                        <div class="rating-card-content">
                                            <div class="id-name">
                                                <p>8318</p>
                                                <b>First Customer</b>
                                            </div>
                                            <div class="service-info">
                                                <a href="#"><img src="assets/images/calender-icon.png" alt=" "><strong>27/06/2019</strong></a>
                                                <a href="#"><img src="assets/images/sp-timericon.png" alt=" "><span>08:00 - 11:00</span></a>
                                            </div>

                                            <div class="rating-star">
                                                <b>ratings</b>
                                                <div class="stars">
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/yellow-small-star.png" alt=""></a>
                                                    <a href="#"><img src="assets/images/grey-small-star.png" alt=""></a>
                                                    <span>Very Good</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="customer-comment">
                                            <b>Customer Comment</b>
                                            <p>Exellent work done by provider.</p>
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
                        <!--service provider screen my rating content end-->

                        <!--service provider screen block customer tab content start-->
                        <div class="tab-pane fade" id="v-pills-block-cust" role="tabpanel" aria-labelledby="v-pills-block-cust-tab">
                            <div class="block-customer">
                                <div class="tab-label">
                                    <h5>Block Customer</h5>
                                </div>
                                <div class="card">
                                    <div class="card-image">
                                        <img src="assets/images/avatar-hat.png" alt="">
                                    </div>
                                    <h5>First Customer</h5>
                                    <div class="btn-block">
                                        <button type="button">Block</button>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-image">
                                        <img src="assets/images/avatar-hat.png" alt="">
                                    </div>
                                    <h5>First Customer</h5>
                                    <div class="btn-block">
                                        <button type="button">Block</button>
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
                        <!--service provider screen block customer tab content start-->

                        <!--service provider screen dropdown my setting content start-->
                        <div class="tab-pane fade my-setting" id="v-pills-my-setting" role="tabpanel" aria-labelledby="pills-settings-tab">
                            <nav>
                                <!--service provider screen dropdown my setting tabs-->
                                <div class="nav nav-tabs" id="nav-tab" role="tablistd">
                                    <a class="nav-item nav-link active" id="nav-my-details-tab" data-toggle="tab" href="#nav-my-details" role="tab" aria-controls="nav-my-details-tab" aria-selected="true">My Details</a>
                                    <a class="nav-item nav-link" id="nav-change-pass-tab" data-toggle="tab" href="#nav-change-pass" role="tab " aria-controls="nav-change-pass" aria-selected="false">Change Password</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <!--service provider screen dropdown my setting my details tab content start-->
                                <div class="tab-pane fade show active" id="nav-my-details" role="tabpanel" aria-labelledby="nav-my-details-tab">
                                    <div class="row ">
                                        <div class="col-12 ">
                                            <div class="account-status">
                                                <h4>Account Status: <span class="status ">Active</span></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-12 ">
                                            <div class="basic-details ">
                                                <h5>Basic Details</h5>
                                                <img src="assets/images/avatar-car.png " alt=" " id="active-avatar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="details ">
                                        <div class="row ">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="firstname ">First name</label>
                                                        <input type="email " class="form-control form-control-lg " id="firstname ">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="lastname ">Last name</label>
                                                        <input type="email " class="form-control form-control-lg " id="lastname ">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="email ">E-mail address</label>
                                                        <input type="email " class="form-control form-control-lg " id="email " value="abc@yopmail.com " disabled>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces ">
                                                <div class="sp-reg-form ">
                                                    <form action=" ">
                                                        <label for="phone ">Phone number</label>
                                                        <div class="input-group-prepend ">
                                                            <div class="input-group-text ">+91</div>
                                                            <input type="tel " class="form-control phone-no " id="phone " placeholder="Phone number " required>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 dob spaces ">
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

                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 spaces">
                                                <form action=" ">
                                                    <div class="form-group nation">
                                                        <label for="nationality ">Nationality</label>
                                                        <select class="form-control-lg " id="nationality ">
                                                            <option>German</option>
                                                            <option>Indian</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-12 gender spaces">
                                                <label for=" ">Gender</label>
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sp-male " value="option1" checked>
                                                            <label class="form-check-label" for="sp-male">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sp-female " value="option2">
                                                            <label class="form-check-label" for="sp-female">Femal</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sp-other " value="option3">
                                                            <label class="form-check-label" for="sp-other">Rather not to say</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="row select-avatar ">
                                            <div class="col-md-12 spaces ">
                                                <label for=" ">Select Avatar</label>
                                                <div class="avatar ">
                                                    <img src="assets/images/avatar-car.png " alt=" " class="selected active " id="avatar-car " onclick="changeAvatar(event); ">
                                                    <img src="assets/images/avatar-female.png " alt=" " class="selected " id="avatar-female " onclick="changeAvatar(event); ">
                                                    <img src="assets/images/avatar-hat.png " alt=" " class="selected " id="avatar-hat " onclick="changeAvatar(event); ">
                                                    <img src="assets/images/avatar-iron.png " alt=" " class="selected " id="avatar-iron " onclick="changeAvatar(event); ">
                                                    <img src="assets/images/avatar-male.png " alt=" " class="selected " id="avatar-male " onclick="changeAvatar(event); ">
                                                    <img src="assets/images/avatar-ship.png " alt=" " class="selected " id="avatar-ship " onclick="changeAvatar(event); ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12 ">
                                            <div class="my-address basic-details ">
                                                <h5>My Adddress</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="address-field details ">
                                        <div class="row ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="streetname ">Street name</label>
                                                        <input type="text " class="form-control form-control-lg " id="streetname ">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="housenumber ">House number</label>
                                                        <input type="tel " class="form-control form-control-lg " id="housenumber ">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="postal-code ">Postal Code</label>
                                                        <input type="tel " class="form-control form-control-lg " id="postal-code ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group city-input ">
                                                        <label for="city ">City</label>
                                                        <input type="text " class="form-control form-control-lg " id="city ">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-4 ">
                                            <div class="outline ">
                                                <hr>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="btn-setting-save ">
                                                <button type="button ">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--service provider screen dropdown my setting my details tab content end-->

                                <!--service provider screen dropdown my setting change password tab content start-->
                                <div class="tab-pane fade" id="nav-change-pass" role="tabpanel" aria-labelledby="nav-change-pass-tab">
                                    <div class="change-password ">
                                        <div class="row details ">
                                            <div class="col-md-4 col-sm-12 spaces ">
                                                <form action=" ">
                                                    <div class="form-group ">
                                                        <label for="old-pass ">Old password</label>
                                                        <input type="password " class="form-control form-control-lg " id="old-pass ">
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
                                <!--service provider screen dropdown my setting change password tab content end-->
                            </div>
                        </div>
                        <!--service provider screen dropdown my setting content end-->

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--service provider screen tabs and its content end-->

    <!--service provider screen footer start-->
<?php
    include 'views/footer.php';
?>