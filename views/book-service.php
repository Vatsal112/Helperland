<?php
    if(isset($_SESSION)){
        if($_SESSION['userType']==2){
            echo "<script>alert('service provider can not book a service');</script>";
            echo "<script>window.location.href='$arr[base_url]';</script>";
        }
    }
?>
<div class="service-banner-img">
    <img src="assets/images/book-service-banner.jpg" alt="">
</div>

<!-- login modal -->
<?php
include 'popup-modal/login-modal.php';
?>

<!-- Book service page banner end -->

<!-- Book service page sidebar for mobile screen start -->
 <?php 
    include 'views/sidebar.php';
?>
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
                    <div class="response-text1">
                        <p id="response1" class="text-danger"></p>
                    </div>
                    <!-- Book service page main tab setup service start -->
                    <div class="tab-pane fade show active" id="setup-service-tab" role="tabpanel" aria-labelledby="setup-service">
                        <form method="post">
                            <div class="response-text2">
                                <p id="response2" class="text-danger"></p>
                            </div>
                            <div class="setup-service-content">
                                <span>Enter your Postal Code</span>

                                <div class="form-group mt-2">
                                    <input type="number" class="form-control" id="input-postalCode" placeholder="Postal Code">
                                    <div class="btn-availability">
                                        <button type="submit" id="postalCode-btn" value="<?php $_SESSION['userType']?>">Check Availability</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Book service page main tab setup service end -->
                    <!-- Book service page main tab schedule service start -->
                    <div class="tab-pane fade" id="schedule-tab" role="tabpanel" aria-labelledby="schedule">
                        <div class="service-schedule-content">
                            <form method="post">
                                <span>Select number of rooms and bath</span>

                                <div class="select-room-bath form-group">
                                    <select name="" id="infoBed" onchange="cardInfo()">
                                        <option value="1 bed">1 bed</option>
                                        <option value="2 bed">2 bed</option>
                                        <option value="3 bed">3 bed</option>
                                        <option value="4 bed">4 bed</option>
                                    </select>

                                    <select name="" id="infoBath" onchange="cardInfo()">
                                        <option value="1 bath">1 bath</option>
                                        <option value="2 bath">2 bath</option>
                                        <option value="3 bath">3 bath</option>
                                        <option value="4 bath">4 bath</option>
                                    </select>
                                </div>

                                <div class="service-duration">
                                    <div class="service-date-time">
                                        <span>When do you need the cleaner?</span>
                                        <div class="service-datetime-input">
                                            <input type="date" name="" id="service-date" min="<?php echo date('Y-m-d'); ?>" onchange="cardInfo()">
                                            <select name="" id="s-time" onchange="cardInfo()">
                                                <option value="8">08:00 AM</option>
                                                <option value="8.5">08:30 AM</option>
                                                <option value="9">09:00 AM</option>
                                                <option value="9.5">09:30 AM</option>
                                                <option value="10">10:00 AM</option>
                                                <option value="10.5">10:30 AM</option>
                                                <option value="11">11:00 AM</option>
                                                <option value="11.5">11:30 AM</option>
                                                <option value="12">12:00 PM</option>
                                                <option value="12.5">12:30 PM</option>
                                                <option value="13">13:00 PM</option>
                                                <option value="13.5">13:30 PM</option>
                                                <option value="14">14:00 PM</option>
                                                <option value="14.5">14:30 PM</option>
                                                <option value="15">15:00 PM</option>
                                                <option value="15.5">15:30 PM</option>
                                                <option value="16">16:00 PM</option>
                                                <option value="16.5">16:30 PM</option>
                                                <option value="17">17:00 PM</option>
                                                <option value="17.5">17:30 PM</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="cleaner-to-stay">
                                        <span>How long do you need your cleaner to stay?</span>

                                        <div class="cleaner-hrs">
                                            <select name="" id="s-hours" onchange="cardInfo()">
                                                <option value="3.0">3.0 Hrs</option>
                                                <option value="3.5">3.5 Hrs</option>
                                                <option value="4.0">4.0 Hrs</option>
                                                <option value="4.5">4.5 Hrs</option>
                                                <option value="5.0">5.0 Hrs</option>
                                                <option value="5.5">5.5 Hrs</option>
                                                <option value="6.0">6.0 Hrs</option>
                                                <option value="6.5">6.5 Hrs</option>
                                                <option value="7.0">7.0 Hrs</option>
                                                <option value="7.5">7.5 Hrs</option>
                                                <option value="8.0">8.0 Hrs</option>
                                                <option value="8.5">8.5 Hrs</option>
                                                <option value="9.0">9.0 Hrs</option>
                                                <option value="9.5">9.5 Hrs</option>
                                                <option value="10.0">10.0 Hrs</option>
                                                <option value="10.5">10.5 Hrs</option>
                                                <option value="11.0">11.0 Hrs</option>
                                                <option value="11.5">11.5 Hrs</option>
                                                <option value="12.0">12.0 Hrs</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-danger" id="error-total-time"></p>


                                <div class="extra-services">
                                    <span>Extra Services</span>

                                    <div class="services">

                                        <div class="outer">
                                            <input type="checkbox" name="extra" value="1" id="check1" class="check" onclick="addToCard(this.id,'labelCabinet')">
                                            <label for="check1" class="labelCabinet">Inside cabinet</label>
                                        </div>
                                        <div class="outer">
                                            <input type="checkbox" name="extra" value="2" id="check2" class="check" onclick="addToCard(this.id,'labelFridge')">
                                            <label for="check2" class="labelFridge">Inside fridge</label>
                                        </div>
                                        <div class="outer">
                                            <input type="checkbox" name="extra" value="3" id="check3" class="check" onclick="addToCard(this.id,'labelOven')">
                                            <label for="check3" class="labelOven">Inside oven</label>
                                        </div>
                                        <div class="outer">
                                            <input type="checkbox" name="extra" value="4" id="check4" class="check" onclick="addToCard(this.id,'labelWash')">
                                            <label for="check4" class="labelWash">Laundry wash & dry</label>
                                        </div>
                                        <div class="outer">
                                            <input type="checkbox" name="extra" value="5" id="check5" class="check" onclick="addToCard(this.id,'labelWindow')">
                                            <label for="check5" class="labelWindow">Interior windows</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="comments">
                                    <span>Comments</span>
                                    <div class="comment-textarea">
                                        <textarea name="" id="comments"></textarea>
                                    </div>
                                </div>

                                <div class="pets-checkbox">
                                    <input type="checkbox" name="" id="pets-label" value="1">
                                    <label for="pets-label">I have pets at home</label>
                                </div>

                                <?php
                                if (isset($_SESSION['islogin'])) {
                                ?>
                                    <div class="btn-continue">
                                        <button type="submit" id="secondTabContinue-btn">Continue</button>
                                    </div>
                                <?php } else { ?>
                                    <div class="btn-continue">
                                        <button type="button" data-toggle="modal" data-target="#login-modal">Continue</button>
                                    </div>
                                <?php } ?>

                            </form>
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
                            <div class="response-text2">
                                <p id="response" class="text-danger"></p>
                            </div>
                            <form method="POST">

                                <div class="user-address" id="user-address">
                                    <!-- <div class="address-radio form-group">
                                    <input type="radio" name="address" id="radio1" value="
                                    " checked>

                                    <div class="radio-labels">
                                        <label for="radio1">Address:
                                            <span class="radio-text"></span>
                                        </label>
                                        <label for="radio1">Phone number:
                                            <span class="radio-text-phone" id="mobile"></span>
                                        </label>
                                    </div>
                                </div> -->
                                </div>

                                <div id="new-address">

                                </div>
                                <div class="add-new-address">
                                    <button type="button" onclick="showAddressDialog()" id="btn-new-address">+ Add New Address</button>
                                </div>

                                <div class="add-new-address-content">

                                    <div class="outer" id="address-dialog">
                                        <div class="response-text2">
                                            <p id="response" class="text-danger"></p>
                                        </div>
                                        <div class="address-fields">
                                            <div class="street-name">
                                                <label for="street">Street Name</label>
                                                <input type="text" name="" id="street" class="form-control">
                                            </div>
                                            <div class="house-no">
                                                <label for="house">House Number</label>
                                                <input type="number" name="" id="house" class="form-control">
                                            </div>
                                        </div>
                                        <div class="postalcode-city">
                                            <div class="postalcode">
                                                <label for="postalcode">Postal Code</label>
                                                <input type="tel" name="" id="new-postalCode" class="form-control" disabled>
                                            </div>
                                            <div class="city">
                                                <label for="city">City</label>
                                                <select name="" id="new-city">
                                                    <!-- <option value="">Tambach-Dietharz</option>
                                                <option value="">Tambach-Dietharz</option>
                                                <option value="">Tambach-Dietharz</option> -->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="edit-phone">

                                            <label for="phone">Phone number</label>
                                            <div class="input-group-prepend">

                                                <div class="input-group-text ">+91</div>
                                                <input type="tel " class="form-control phone-no" id="new-phone" placeholder="Phone number" required>
                                            </div>

                                        </div>


                                        <div class="btn-save-close">
                                            <button type="button" class="save" id="btn-add-new-address">Save</button>
                                            <button type="button" class="cancel" onclick="closeAddressDialog()">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                                    <div class="favourite-sp">
                                        <span>Your Favourite Service Providers</span>
                                        <p class="radio-text">you can choose your favourite service provider from the below list.</p>

                                        <div class="fav-sp-info">
                                            <img src="assets/images/avatar-hat.png" alt="">
                                            <span class="sp-name">Sandip Patel</span>
                                            <button type="button">Select</button>
                                        </div>
                                    </div> -->

                                <div class="btn-continue">
                                    <button type="button" id="your-details-continue">Continue</button>
                                </div>
                            </form>

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
                                <input type="tel" name="" id="" placeholder="Card number" class="credit-card-text" maxlength="19" required>
                                <input type="text" placeholder="MM / YY" maxlength="7" class="card-date" onkeypress="return onlyNumberKey(event)" onkeyup="addSlash(event)" required>
                                <input type="password" placeholder="CVC" maxlength="3" class="card-cvv" required>
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
                                <input type="checkbox" name="" id="privacy-check" required>
                                <label for="privacy-check">I accept <a href="">terms and conditions</a>, the <a href="">cancellation policy </a>and the <a href="">privacy policy.</a></label>
                            </div>

                            <div class="btn-continue">
                                <button type="button" id="complete-booking-btn">Complete Booking</button>
                            </div>
                            <div class="btn-sm-payment-summary">
                                <button type="button" data-toggle="modal" data-target="#payment-summary-modal" data-dismiss="modal">Payment Summary</button>
                            </div>
                        </div>
                        <!-- Book service page complete booking modal start -->
                        <?php 
                            include 'popup-modal/complete-booking-modal.php';
                        ?>
                        <!-- Book service page complete booking modal end -->
                    </div>
                    <!-- Book service page main tab payments end -->
                </div>

                <!-- Book service page payment summary modal for mobile view start -->
                <?php
                include 'popup-modal/payment-summary-modal.php';
                ?>
                <!-- Book service page payment summary modal for mobile view end -->
            </div>
            <!-- Book service page payment summary side card start -->
            <div class="payment-summary" id="payment-summary">
                <div class="payment-text">
                    <span>Payment Summary</span>
                </div>

                <div class="payment-card">
                    <div class="card">
                        <div class="card-body">
                            <span class="service-date" id="s-date">01/01/2018</span><span> @</span>
                            <script>
                                document.getElementById('s-date').innerHTML = new Date().toISOString().slice(0, 10);
                            </script>
                            <span class="service-time" id="s-card-time">08:00 AM</span><br>
                            <span class="bed" id="bed">1 bed, </span>
                            <span class="bed bath" id="bath">1 bath</span>

                            <div class="card-service-duration">
                                <b>Duration</b>
                                <div class="service-info">
                                    <span>Basic</span>
                                    <span class="basic-service-duration" id="s-card-hours">0 Hrs</span>
                                </div>
                                <div class="card-extra-services">

                                </div>
                                <div class="service-info">
                                    <!-- <span>Inside cabinets (extra)</span>
                                    <span class="service-duration">30 min</span> -->
                                </div>
                                <div class="service-info total-required-time">
                                    <b class="total-time">Total Service Time</b>
                                    <b class="total-duration" id="total-duration">3.0 Hrs</b>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <span>Per Cleaning</span>
                                <b id="per-cleaning" class="per-cleaning">$0</b>
                            </li>
                            <li class="list-group-item discount">
                                <span>Discount</span>
                                <b>$0</b>
                            </li>
                        </ul>
                        <ul class="list-group list-group-flush list-2">
                            <li class="list-group-item">
                                <span class="payment-txt">Total Payment</span>
                                <b class="payment-amt" id="total-amt">$0</b>
                            </li>
                            <li class="list-group-item effective-price">
                                <span>Effective Price</span>
                                <b class="effective-amt">$0</b>
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