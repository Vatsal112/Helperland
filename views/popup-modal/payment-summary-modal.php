<div class="modal fade" id="payment-summary-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Summary</h5>
                <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
                <span class="service-date" id="s-date2">01/01/2018</span><span> @</span>
                <script>
                    document.getElementById('s-date2').innerHTML = new Date().toISOString().slice(0, 10);
                </script>
                <span class="service-time" id="s-card-time">08:00 AM</span><br>
                <span class="bed" id="bed">1 bed, </span>
                <span class="bed bath" id="bath">1 bath</span>

                <div class="card-service-duration">
                    <b>Duration</b>
                    <div class="service-info">
                        <span>Basic</span>
                        <span class="basic-service-duration" id="s-card-hours">0 hrs</span>
                    </div>
                    <div class="card-extra-services">

                    </div>
                    <div class="service-info total-required-time">
                        <b class="total-time">Total Service Time</b>
                        <b class="total-duration" id="total-duration">0 hrs</b>
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
