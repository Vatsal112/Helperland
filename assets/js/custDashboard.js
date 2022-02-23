$(document).ready(function() {

    $('.service-info').click(function() {

        var sId = $(this).parent().parent().find('.s-id').text();
        var label = '';

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=custDashboard&function=getDashboardData",
            data: {
                sId: sId
            },
            dataType: "JSON",
            success: function(response) {
                var include = '';
                if (response.HasPets == 0) {
                    include = 'not-';
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
                            label += "Inside Cabinet, "
                        }
                        if (extraId[i] == 2) {
                            label += "Inside Fridge, "
                        }
                        if (extraId[i] == 3) {
                            label += "Inside Oven, "
                        }
                        if (extraId[i] == 4) {
                            label += "Laundry wash & dry, "
                        }
                        if (extraId[i] == 5) {
                            label += "Interior windows, "
                        }
                    }
                }

                $('#current-service-modal').html(` <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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

                $('#current-service-modal').modal('show');
                $('#current-service-modal').modal('hide');
            }
        });

    });
});