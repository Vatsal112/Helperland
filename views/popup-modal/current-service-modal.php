
    <!--customer screen dashboard modal start-->
    <div class="modal fade" id="current-service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <p class="modal-datetime"><?php echo $sDate . " " . $sTime . "-" . $endtime; ?></p>
                        <span class="modal-duration"><b>Duration: </b><?php echo $sHours; ?> Hrs</span>
                    </div>

                    <div class="modal-body">
                        <span class="body-text"><b>Service Id: </b><?php echo $id; ?></span>
                        <span class="body-text"><b>Extras:</b> Inside oven, Laundry wash & dry</span>
                        <span class="body-text"><b>Net Amount:</b> <span class="payment">$<?php echo $payment; ?></span></span>

                        <div class="customer-details">
                            <span class="body-text"><b>Service Address:</b> <?php echo $address['AddressLine1']; ?></span>
                            <span class="body-text"><b>Billing Address:</b> Same as cleaning adress</span>
                            <span class="body-text"><b>Phone:</b> +41 <?php echo $address['Mobile']; ?></span>
                            <span class="body-text"><b>Email:</b> <?php echo $address['Email']; ?></span>

                        </div>

                        <div class="customer-details">
                            <b>Comments</b>
                            <p class="mb-0 "><?php echo $comments;?></p>

                            <?php if($pets == 0){?>
                                <div class="pets">
                                <img src="assets/images/not-included.png" alt=" ">
                                <p>I have Pets at home.</p>
                            </div>
                            <?php }else{?>
                            <div class="pets">
                                <img src="assets/images/included.png" alt=" ">
                                <p>I have Pets at home.</p>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-accept">
                            <img src="assets/images/reschedule-icon-small.png" alt="">Reschedule</button>
                        <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--customer screen dashboard modal end-->
