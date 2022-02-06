<div class="service-banner-img">
    <img src="assets/images/book-service-banner.jpg" alt="">
</div>

<!-- login modal -->
<?php
include 'popup-modal/login-modal.php';
?>
</section>
<!-- Book service page banner end -->

<!-- Book service page sidebar for mobile screen start -->
<section class="sidebar" id="sidebar">
    <div class="book-service-sidebar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="" onclick="closeSideBar()">Book Now</a>
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
<!-- Book service page sidebar for mobile screen end -->

<!-- Book service page content start -->
<section class="book-service">
    <div class="container">
        <h2 class="faq-heading ">Set up your cleaning service</h2>

        <div class="underline-design ">
            <div class="line"></div>
            <img src="assets/images/faq-star.png " alt=" ">
            <div class="line"></div>
        </div>

        <!-- Book service page main tabs start -->

        <div class="main-content">
            <div class="booking-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="setup-service" data-toggle="tab" href="#setup-service-tab" role="tab" aria-controls="setup-service-tab" aria-selected="true"><img src="assets/images/setup-service-white.png" id="setup-img" alt=""><span class="tab-name">Setup Service</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="schedule" data-toggle="tab" href="#schedule-tab" role="tab" aria-controls="schedule-tab" aria-selected="false"><img src="assets/images/schedule.png" id="schedule-img" alt=""><span class="tab-name">Schedule & Plan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="your-details" data-toggle="tab" href="#your-details-tab" role="tab" aria-controls="your-details-tab" aria-selected="false"><img src="assets/images/details.png" id="detail-img" alt=""><span class="tab-name">Your Details</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="payment" data-toggle="tab" href="#payment-tab" role="tab" aria-controls="payment-tab" aria-selected="false"><img src="assets/images/payment.png" id="payment-img" alt=""><span class="tab-name">Make Payment</span></a>
                    </li>
                </ul>

                <!-- Book service page main tabs end -->



                <div class="tab-content" id="myTabContent">
                    <!-- Book service page main tab setup service start -->
                    <div class="tab-pane fade show active" id="setup-service-tab" role="tabpanel" aria-labelledby="setup-service">
                        <form action="" method="post">
                            <div class="setup-service-content">
                                <span>Enter your Postal Code</span>

                                <div class="form-group mt-2">
                                    <input type="number" class="form-control" id="bs-input-postalCode" placeholder="Postal Code">
                                    <div class="btn-availability">
                                        <button type="button" onclick="validateFirstTab('bs-input-postalCode')">Check Availability</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Book service page main tab setup service end -->
                    <!-- Book service page main tab schedule service start -->
                    <div class="tab-pane fade" id="schedule-tab" role="tabpanel" aria-labelledby="schedule">
                        <div class="service-schedule-content">
                            <span>Select number of rooms and bath</span>

                            <div class="select-room-bath form-group">
                                <select name="" id="">
                                    <option value="">1 bed</option>
                                    <option value="">2 bed</option>
                                    <option value="">3 bed</option>
                                    <option value="">4 bed</option>
                                </select>

                                <select name="" id="">
                                    <option value="">1 bath</option>
                                    <option value="">2 bath</option>
                                    <option value="">3 bath</option>
                                    <option value="">4 bath</option>
                                </select>
                            </div>

                            <div class="service-duration">
                                <div class="service-date-time">
                                    <span>When do you need the cleaner?</span>
                                    <div class="service-datetime-input">
                                        <input type="date" name="" id="service-date" value="01/01/2018">
                                        <select name="" id="">
                                            <option value="">08:00 AM</option>
                                            <option value="">08:30 AM</option>
                                            <option value="">09:00 AM</option>
                                            <option value="">09:30 AM</option>
                                            <option value="">10:00 AM</option>
                                            <option value="">10:30 AM</option>
                                            <option value="">11:00 AM</option>
                                            <option value="">11:30 AM</option>
                                            <option value="">12:00 PM</option>
                                            <option value="">12:30 PM</option>
                                            <option value="">01:00 PM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="cleaner-to-stay">
                                    <span>How long do you need your cleaner to stay?</span>

                                    <div class="cleaner-hrs">
                                        <select name="" id="">
                                            <option value="">3.0 Hrs</option>
                                            <option value="">3.5 Hrs</option>
                                            <option value="">4.0 Hrs</option>
                                            <option value="">4.5 Hrs</option>
                                            <option value="">5.0 Hrs</option>
                                            <option value="">5.5 Hrs</option>
                                            <option value="">6.0 Hrs</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="extra-services">
                                <span>Extra Services</span>

                                <div class="services">

                                    <div class="outer">
                                        <input type="checkbox" name="" id="check1" onche onclick="addToCard(this.id,'labelCabinet')">
                                        <label for="check1" class="labelCabinet">Inside cabinet</label>
                                    </div>
                                    <div class="outer">
                                        <input type="checkbox" name="" id="check2" onclick="addToCard(this.id,'labelFridge')">
                                        <label for="check2" class="labelFridge">Inside fridge</label>
                                    </div>
                                    <div class="outer">
                                        <input type="checkbox" name="" id="check3" onclick="addToCard(this.id,'labelOven')">
                                        <label for="check3" class="labelOven">Inside oven</label>
                                    </div>
                                    <div class="outer">
                                        <input type="checkbox" name="" id="check4" onclick="addToCard(this.id,'labelWash')">
                                        <label for="check4" class="labelWash">Laundry wash & dry</label>
                                    </div>
                                    <div class="outer">
                                        <input type="checkbox" name="" id="check5" onclick="addToCard(this.id,'labelWindow')">
                                        <label for="check5" class="labelWindow">Interior windows</label>
                                    </div>

                                </div>
                            </div>

                            <div class="comments">
                                <span>Comments</span>
                                <div class="comment-textarea">
                                    <textarea name=""></textarea>
                                </div>
                            </div>

                            <div class="pets-checkbox">
                                <input type="checkbox" name="" id="pets-label">
                                <label for="pets-label">I have pets at home</label>
                            </div>

                            <div class="btn-continue">
                                <button type="button">Continue</button>
                            </div>

                            <div class="btn-sm-payment-summary">
                                <button type="button" data-toggle="modal" data-target="#payment-summary-modal">Payment Summary</button>
                            </div>
                        </div>

                    </div>
                    <!-- Book service page main tab schedule service end -->

                    <!-- Book service page main tab your details start -->
                    <div class="tab-pane fade" id="your-details-tab" role="tabpanel" aria-labelledby="your-details">
                        <div class="your-details-content">
                            <span>Enter your contact details, so we can serve you in better way!</span>

                            <div class="address-radio form-group">
                                <input type="radio" name="address" id="radio1" value="
                                    ">
                                <div class="radio-labels">
                                    <label for="radio1">Address:
                                        <span class="radio-text">koiengstrasse, </span>
                                        <span class="radio-text">112 </span>
                                        <span class="radio-text">Tambach-Dietharz</span>
                                        <span class="radio-text">53844</span>
                                    </label>
                                    <label for="radio1">Phone number:
                                        <span class="radio-text">998855772</span>
                                    </label>
                                </div>
                            </div>

                            <div class="address-radio form-group">
                                <input type="radio" name="address" id="radio2" value="">
                                <div class="radio-labels">
                                    <label for="radio2">Address:
                                        <span class="radio-text">koiengstrasse, </span>
                                        <span class="radio-text">112 </span>
                                        <span class="radio-text">Tambach-Dietharz</span>
                                        <span class="radio-text">53844</span>
                                    </label>
                                    <label for="radio2">Phone number:
                                        <span class="radio-text">998855772</span>
                                    </label>
                                </div>
                            </div>

                            <div class="add-new-address">
                                <button type="button" onclick="showAddressDialog()" id="btn-new-address">+ Add New Address</button>
                            </div>

                            <div class="add-new-address-content">
                                <div class="outer" id="address-dialog">
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

                                    <div class="btn-save-close">
                                        <button type="button" class="save">Save</button>
                                        <button type="button" class="cancel" onclick="closeAddressDialog()">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <div class="favourite-sp">
                                <span>Your Favourite Service Providers</span>
                                <p class="radio-text">you can choose your favourite service provider from the below list.</p>

                                <div class="fav-sp-info">
                                    <img src="assets/images/avatar-hat.png" alt="">
                                    <span class="sp-name">Sandip Patel</span>
                                    <button type="button">Select</button>
                                </div>
                            </div>

                            <div class="btn-continue">
                                <button type="button">Continue</button>
                            </div>

                            <div class="btn-sm-payment-summary">
                                <button type="button" data-toggle="modal" data-target="#payment-summary-modal">Payment Summary</button>
                            </div>
                        </div>
                    </div>
                    <!-- Book service page main tab your details end -->

                    <!-- Book service page main tab payments start -->
                    <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment">
                        <div class="payment-tab-content">
                            <span>Pay securely with helperland payment gateway!</span>
                            <label for="promo-code">Promo code (optional)</label>
                            <div class="promo-code">
                                <input type="number" name="" id="" id="promo-code" placeholder="promo-code (optional)">
                                <button type="button">Apply</button>
                            </div>

                            <div class="payment-card-input">
                                <i class="fa fa-credit-card"></i>
                                <input type="tel" name="" id="" placeholder="Card number" class="credit-card-text" maxlength="19">
                                <input type="text" placeholder="MM / YY" maxlength="7" class="card-date" onkeypress="return onlyNumberKey(event)" onkeyup="addSlash(event)">
                                <input type="password" placeholder="CVC" maxlength="3" class="card-cvv">
                            </div>
                            <div class="accepted-cards-img">
                                <span>Accepted Cards:</span>
                                <div class="card-img">
                                    <img src="assets/images/visa-icon.png" alt="">
                                    <img src="assets/images/master-card-icon.png" alt="">
                                    <img src="assets/images/amrican-exp-icon.png" alt="">
                                </div>
                            </div>

                            <div class="privacy-policy-check">
                                <input type="checkbox" name="" id="privacy-check">
                                <label for="privacy-check">I accept <a href="">terms and conditions</a>, the <a href="">cancellation policy </a>and the <a href="">privacy policy.</a></label>
                            </div>

                            <div class="btn-continue">
                                <button type="button" data-toggle="modal" data-target="#complete-booking-modal">Complete Booking</button>
                            </div>
                            <div class="btn-sm-payment-summary">
                                <button type="button" data-toggle="modal" data-target="#payment-summary-modal" data-dismiss="modal">Payment Summary</button>
                            </div>
                        </div>
                        <!-- Book service page complete booking modal start -->
                        <div class="modal fade logout-modal" id="complete-booking-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-part">
                                        <div class="modal-header d-block">
                                            <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                                        </div>
                                        <div class="modal-body">
                                            <div class="logout-modal-content">
                                                <div class="logout-green-circle">
                                                    <img src="assets/images/ic-check.png" alt="">
                                                </div>
                                                <h5>Booking has been successfully submitted</h5>
                                                <p class="text-center">Service Request Id: <span class="s-id" id="s-id">8303</span></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn-logout-ok" data-dismiss="modal">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Book service page complete booking modal end -->
                    </div>
                    <!-- Book service page main tab payments end -->
                </div>

                <!-- Book service page payment summary modal for mobile view start -->
                <div class="modal fade" id="payment-summary-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Payment Summary</h5>
                                <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
                            </div>
                            <div class="modal-body">
                                <span class="service-date">01/01/2018 @ </span>
                                <span class="service-time">04:00 pm</span><br>
                                <span class="bed">1 bed, </span>
                                <span class="bed">1 bath</span>

                                <div class="card-service-duration">
                                    <b>Duration</b>
                                    <div class="service-info">
                                        <span>Basic</span>
                                        <span class="service-duration">3 hrs</span>
                                    </div>
                                    <div class="service-info">
                                        <span>Inside cabinets (extra)</span>
                                        <span class="service-duration">30 min</span>
                                    </div>
                                    <div class="service-info total-required-time">
                                        <b class="total-time">Total Service Time</b>
                                        <b class="total-duration">3.5 hrs</b>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span>Per Cleaning</span>
                                        <b>$87</b>
                                    </li>
                                    <li class="list-group-item discount">
                                        <span>Discount</span>
                                        <b>-$27</b>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-flush list-2">
                                    <li class="list-group-item">
                                        <span class="payment-txt">Total Payment</span>
                                        <b class="payment-amt">$63</b>
                                    </li>
                                    <li class="list-group-item effective-price">
                                        <span>Effective Price</span>
                                        <b class="effective-amt">$50.4</b>
                                    </li>
                                </ul>
                                <div class="will-save">
                                    <a href=""><span>*</span>You will save 20% according to §35a EStG.</a>
                                </div>

                                <div class="card-footer">
                                    <a href=""><img src="assets/images/smiley.png" alt="">See what is always included</a>
                                </div>

                                <div class="questions">
                                    <span>Questions?</span>

                                    <div class="accordian">
                                        <a href="#que1" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                                        <div class="collapse" id="que1">
                                            <div class="card card-body">
                                                Anyone
                                            </div>
                                        </div>
                                        <a href="#que2" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                                        <div class="collapse" id="que2">
                                            <div class="card card-body">
                                                Anyone
                                            </div>
                                        </div>
                                        <a href="#que3" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                                        <div class="collapse" id="que3">
                                            <div class="card card-body">
                                                Anyone
                                            </div>
                                        </div>
                                        <a href="#que4" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                                        <div class="collapse" id="que4">
                                            <div class="card card-body">
                                                Anyone
                                            </div>
                                        </div>
                                    </div>

                                    <div class="for-more-help">
                                        <a href="">For more help</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Book service page payment summary modal for mobile view end -->
            </div>
            <!-- Book service page payment summary side card start -->
            <div class="payment-summary">
                <div class="payment-text">
                    <span>Payment Summary</span>
                </div>

                <div class="payment-card">
                    <div class="card">
                        <div class="card-body">
                            <span class="service-date">01/01/2018 @ </span>
                            <span class="service-time">04:00 pm</span><br>
                            <span class="bed">1 bed, </span>
                            <span class="bed">1 bath</span>

                            <div class="card-service-duration">
                                <b>Duration</b>
                                <div class="service-info">
                                    <span>Basic</span>
                                    <span class="service-duration">3 hrs</span>
                                </div>
                                <div id="extra-services">

                                </div>
                                <div class="service-info" >
                                    <!-- <span>Inside cabinets (extra)</span>
                                    <span class="service-duration">30 min</span> -->
                                </div>
                                <div class="service-info total-required-time">
                                    <b class="total-time">Total Service Time</b>
                                    <b class="total-duration">3.5 hrs</b>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span>Per Cleaning</span>
                                <b>$87</b>
                            </li>
                            <li class="list-group-item discount">
                                <span>Discount</span>
                                <b>-$27</b>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush list-2">
                            <li class="list-group-item">
                                <span class="payment-txt">Total Payment</span>
                                <b class="payment-amt">$63</b>
                            </li>
                            <li class="list-group-item effective-price">
                                <span>Effective Price</span>
                                <b class="effective-amt">$50.4</b>
                            </li>
                        </ul>

                        <div class="card-body card-bottom-body">
                            <div class="will-save">
                                <a href=""><span>*</span>You will save 20% according to §35a EStG.</a>
                            </div>

                            <div class="card-footer">
                                <a href=""><img src="assets/images/smiley.png" alt="">See what is always included</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="questions">
                    <span>Questions?</span>

                    <div class="accordian">
                        <a href="#que1" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                        <div class="collapse" id="que1">
                            <div class="card card-body">
                                Anyone
                            </div>
                        </div>
                        <a href="#que2" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                        <div class="collapse" id="que2">
                            <div class="card card-body">
                                Anyone
                            </div>
                        </div>
                        <a href="#que3" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                        <div class="collapse" id="que3">
                            <div class="card card-body">
                                Anyone
                            </div>
                        </div>
                        <a href="#que4" data-toggle="collapse" aria-expanded="false" aria-controls="questions">Which helperland professional will come to my place?</a>
                        <div class="collapse" id="que4">
                            <div class="card card-body">
                                Anyone
                            </div>
                        </div>
                    </div>

                    <div class="for-more-help">
                        <a href="">For more help</a>
                    </div>
                </div>
            </div>
            <!-- Book service page payment summary side card end -->
        </div>
    </div>
</section>
<!-- Book service page content end -->

<!-- Book service page newsletter  -->

<script>
    <?php
        include 'assets/js/main.js';
    ?>
</script>
<?php
    require 'footer.php';
?>


