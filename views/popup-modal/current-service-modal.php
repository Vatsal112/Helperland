<!--customer screen dashboard modal start-->
<div class="modal fade" id="current-service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<!-- <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-part">
                            <div class="modal-header d-block">
                                <div class="d-flex align-items-center">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                    <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="close-btn">&times;</span>
                                    </button>
                                </div>
                                <p class="modal-datetime">${response.date} ${response.startTime}-${response.endTime}</p>
                                <span class="modal-duration"><b>Duration: </b>${response.ServiceHours} Hrs</span>
                            </div>

                            <div class="modal-body">
                                <div class="modal-information">
                                    <span class="body-text"><b>Service Id:</b><?php echo $sId;?></span>
                                    <span class="body-text"><b>Extras:</b> ${label}</span>
                                    <span class="body-text"><b>Net Amount:</b> <span class="payment">$${response.TotalCost}</span></span>

                                    <div class="customer-details">

                                        <span class="body-text"><b>Service Address:</b> ${response.AddressLine1}</span>
                                        <span class="body-text"><b>Billing Address:</b> Same as cleaning adress</span>
                                        <span class="body-text"><b>Phone:</b> +41 ${response.Mobile}</span>
                                        <span class="body-text"><b>Email:</b> ${email}</span>

                                    </div>

                                    <div class="customer-details">
                                        <b>Comments</b>
                                        <p class="mb-0 ">${response.Comments}</p>

                                        <div class="pets">
                                            <img src="assets/images/${include}included.png" alt=" ">
                                            <p>I have Pets at home.</p>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-sp-details">
                                    <h4>Service Provider Details</h4>
                                    <div class="sp-content">
                                        <div class="sp-avatar">
                                            <img src="assets/images/avatar-hat.png" alt="">
                                            <p class="mt-1">16 cleanings</p>
                                        </div>
                                        <div class="sp-name-rating">
                                            <b>${spName}</b>
                                            <div class="sp-rating">
                                                <img src="assets/images/yellow-small-star.png" alt="">
                                                <img src="assets/images/yellow-small-star.png" alt="">
                                                <img src="assets/images/yellow-small-star.png" alt="">
                                                <img src="assets/images/yellow-small-star.png" alt="">
                                                <img src="assets/images/grey-small-star.png" alt="">

                                            </div>
                                            <span>3.67</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-modal-accept">
                                    <img src="assets/images/reschedule-icon-small.png" alt="">Reschedule</button>
                                <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>
                            </div>
                        </div>

                    </div>
                </div> -->
</div>

<!--customer screen dashboard modal end-->