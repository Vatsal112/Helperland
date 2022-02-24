$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=newServices",
        dataType: "JSON",
        success: function(response) {
            for (i = 0; i < response.length; i++) {
                console.log(response[i]);
            }

            for (let i = 0; i <= response.length; i++) {
                $("#current-service-table").append(`
                            <tr>
                                <td class="s-id">${response[i]["ServiceId"]}</td>

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
                                            <a href="#"><strong></strong></a>
                                            <a href="#">
                                                <p></p>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="payment-content">
                                        <b>$</b>
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
                   `);
            }
        },
    });

    $(".service-info").click(function() {
        var sId = $(this).parent().parent().find(".s-id").text();
        var label = "";

        var spName = $("#spName").text();

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=custDashboard&function=getDashboardData",
            data: {
                sId: sId,
            },
            dataType: "JSON",
            success: function(response) {
                var include = "";
                if (response.HasPets == 0) {
                    include = "not-";
                } else {
                    include = "";
                }

                if (response.Email == null) {
                    email = "";
                } else {
                    email = response.Email;
                }

                if (response.ServiceExtraId == null) {
                    label = "";
                } else {
                    const extraId = Array.from(String(response.ServiceExtraId), Number);
                    for (i = 0; i <= extraId.length; i++) {
                        if (extraId[i] == 1) {
                            label += "Inside Cabinet, ";
                        }
                        if (extraId[i] == 2) {
                            label += "Inside Fridge, ";
                        }
                        if (extraId[i] == 3) {
                            label += "Inside Oven, ";
                        }
                        if (extraId[i] == 4) {
                            label += "Laundry wash & dry, ";
                        }
                        if (extraId[i] == 5) {
                            label += "Interior windows, ";
                        }
                    }
                }

                if (response.ServiceProviderId != null) {
                    $("#current-service-modal")
                        .html(`<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                    <span class="body-text"><b>Service Id:</b> ${response.ServiceId}</span>
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
                </div>`);
                    $("#current-service-modal .modal-body").css({
                        display: "flex",
                        "justify-content": "space-between",
                    });
                } else {
                    $("#current-service-modal")
                        .html(` <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-part">
                            <div class="modal-header d-block">
                                <div class="d-flex align-items-center">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                    <button type="button" class="close ms-auto" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="close-btn">&times;</span>
                                    </button>
                                </div>
                                <p class="modal-datetime" id="currModal-datetime">${response.date} ${response.startTime}-${response.endTime}</p>
                                <span class="modal-duration"><b>Duration: </b>${response.ServiceHours} Hrs</span>
                            </div>
        
                            <div class="modal-body">
                                <span class="body-text"><b>Service Id: </b>${response.ServiceId}</span>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-modal-accept">
                                    <img src="assets/images/reschedule-icon-small.png" alt="">Reschedule</button>
                                <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>
                            </div>
                        </div>
        
                    </div>
                </div>`);
                }
                $("#current-service-modal").modal("show");
                $("#current-service-modal").modal("hide");
            },
        });
    });

    $(".service-history-table").click(function() {
        var sId = $(this).parent().parent().find(".s-id").text();
        var label = "";

        var spName = $(".spName-sh").text();

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=custDashboard&function=getDashboardData",
            data: {
                sId: sId,
            },
            dataType: "JSON",
            success: function(response) {
                var include = "";
                if (response.HasPets == 0) {
                    include = "not-";
                } else {
                    include = "";
                }

                if (response.Email == null) {
                    email = "";
                } else {
                    email = response.Email;
                }

                if (response.ServiceExtraId == null) {
                    label = "";
                } else {
                    const extraId = Array.from(String(response.ServiceExtraId), Number);
                    for (i = 0; i <= extraId.length; i++) {
                        if (extraId[i] == 1) {
                            label += "Inside Cabinet, ";
                        }
                        if (extraId[i] == 2) {
                            label += "Inside Fridge, ";
                        }
                        if (extraId[i] == 3) {
                            label += "Inside Oven, ";
                        }
                        if (extraId[i] == 4) {
                            label += "Laundry wash & dry, ";
                        }
                        if (extraId[i] == 5) {
                            label += "Interior windows, ";
                        }
                    }
                }

                if (response.ServiceProviderId != null) {
                    $("#cust-service-history-modal")
                        .html(`<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-part">
                            <div class="modal-header d-block">
                                <div class="d-flex align-items-center">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                    <button type="button" class="close ms-auto close-modal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="close-btn">&times;</span>
                                    </button>
                                </div>
                                <p class="modal-datetime">${response.date} ${response.startTime}-${response.endTime}</p>
                                <span class="modal-duration"><b>Duration: </b>${response.ServiceHours} Hrs</span>
                            </div>
            
                            <div class="modal-body">
                                <div class = "modal-information">
                                <span class="body-text"><b>Service Id:</b> ${response.ServiceId}</span>
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
                                                <img src="assets/images/yellow-small-star.png" alt="">                                                                                <img src="assets/images/yellow-small-star.png" alt="">
                                                <img src="assets/images/yellow-small-star.png" alt="">
                                                <img src="assets/images/grey-small-star.png" alt="">                                                                                </div>
                                               <span>3.67</span>
                                                                            </div>
                                                                                </div>
                                                </div>
                            </div>
            
                        </div>
            
                    </div>
                </div>`);

                    $("#cust-service-history-modal .modal-body").css({
                        'display': "flex",
                        "justify-content": "space-between",
                    });
                } else {
                    $("#cust-service-history-modal")
                        .html(`<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-part">
                            <div class="modal-header d-block">
                                <div class="d-flex align-items-center">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Service Details</h4>
                                    <button type="button" class="close ms-auto close-modal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="close-btn"  data-dismiss="modal">&times;</span>
                                    </button>
                                </div>
                                <p class="modal-datetime">${response.date} ${response.startTime}-${response.endTime}</p>
                                <span class="modal-duration"><b>Duration: </b>${response.ServiceHours} Hrs</span>
                            </div>
            
                            <div class="modal-body">
                                <span class="body-text"><b>Service Id:</b> ${response.ServiceId}</span>
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
            
                        </div>
            
                    </div>
                </div>`);
                }

                $("#cust-service-history-modal").modal("show");
                // $("#cust-service-history-modal").modal("hide");
                $(".close-btn").click(function() {
                    $("#cust-service-history-modal").modal("hide");

                    $("body").removeClass("modal-open");
                    $(".modal-backdrop").remove();
                });
            },
        });
    });
});