let settingTab = document.getElementById("servicer-toggle-id").value;
let upcomingSerContent = document.getElementById("v-pills-upcoming-ser");
let tabContent = document.getElementById("s-pills-my-setting");
let publicDashboardHeader = document.getElementById("v-pills-dashboard");

if (settingTab != undefined) {
    tabContent.classList.add("show", "active");
    upcomingSerContent.classList.remove("show", "active");
}

publicDashboardHeader.addEventListener("click", function() {
    tabContent.classList.remove("show", "active");
    upcomingSerContent.classList.add("show", "active");
});

let newServiceRowsPerPage = document.getElementById(
    "new-service-table-rows-per-page"
).value;

let newServicesTotalCountRecords = document.getElementById(
    "new-services-total-count"
);

let currentPage = 1;
let startIndex = 0;
let endIndex = newServiceRowsPerPage;
let pendingRequestTotalRecords = 0;
let pageCount = 1;
let newServices = [];

$(document).ready(function() {
    getNewServices();
});

function getFilteredNewServices(hasPets) {
    return newServices.filter(service => service.HasPets === (hasPets ? "1" : "0"));
}

function getNewServices() {
    return $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=getNewServices",
        data: {
            startIndex,
            endIndex
        },
        dataType: "JSON",
        success: function(response) {
            newServices = [...response];
            // newServices.push(...response.slice(startIndex, endIndex));
        },
    });
}

function fillNewServiceTable() {
    const hasPets = document.getElementById('checkHasPets').checked;
    const data = getFilteredNewServices(hasPets);

    $('#new-service-req-table').html("");

    for (var i = 0; i < data.length; i++) {
        $('#new-service-req-table').append(`
        <tr>
        <td>${data[i].ServiceId}</td>
        <td>
            <div class="service-info" onclick="serviceInfo(${data[i].ServiceRequestId});">
                <div class="service-datetime-icons">
                    <a ><img src="assets/images/calender-icon.png" alt=" "></a>
                    <a ><img src="assets/images/sp-timericon.png" alt=" "></a>
                    <!--service provider screen new service content modal start-->
                    <div class="modal fade" id="service-info-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    </div>
                    <!--service provider screen new service content modal end-->
                </div>
                <div class="service-datetime-texts">
                    <a href="#">${data[i].StartDate}</strong></a>
                    <a href="#">
                        <p>${data[i].StartTime}-${data[i].EndTime} </p>
                    </a>
                </div>
            </div>
        </td>
        <td class="td-address">
            <a onclick="serviceInfo(${data[i].ServiceRequestId});">
                <p>${data[i].custData.FirstName} ${data[i].custData.LastName}</p>
                <div class="service-info">
                    <div class="service-home-icon">
                        <img src="assets/images/home-icon.png" alt=" ">
                    </div>
                    <div class="service-address-texts">
                        <p>${data[i].custAddress.AddressLine1}</p>
                    </div>
                </div>
            </a>
        </td>
        <td>
            <div class="payment-content">
                <b>$${data[i].TotalCost}</b>
            </div>
        </td>
        <td></td>
        <td class="btn-cancel">
            <button type="button" onclick="acceptServiceReq(${data[i].ServiceRequestId})" id="btn-accept-service">Accept</button>
        </td>
    </tr>
        `);
    }
}



function serviceInfo(sId) {

    var extras = '';
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=getUserData",
        data: {
            sId
        },
        dataType: "JSON",
        success: function(response) {
            var include = "";
            var email = '';
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

            extras = getExtraServices(response.ServiceExtraId);
            $('#service-info-modal2').html(`<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                        <span class="body-text"><b>Service Id:</b> ${response.ServiceId}</span>
                        <span class="body-text"><b>Extras:</b> ${extras}</span>
                        <span class="body-text"><b>Total Payment:</b> <span class="payment">$${response.TotalCost}</span></span>
    
                        <div class="customer-details">
                            <span class="body-text"><b>Customer Name:</b> ${response.UserName}</span>
                            <span class="body-text"><b>Service Address:</b> ${response.AddressLine1}</span>
                            <span class="body-text"><b>Phone:</b> ${response.Mobile}</span>
                            <span class="body-text"><b>Email:</b> ${email}</span>
                            <span class="body-text"><b>Distance:</b> unable to calculate the distance</span>
                        </div>
    
                        <div class="customer-details">
                            <b>Comments</b>
                            <p class="mb-0">${response.Comments}</p>
    
                            <div class="pets">
                                <img src="assets/images/${include}included.png" alt=" ">
                                <p>I have Pets at home.</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-accept" onclick="acceptServiceReq(${response.ServiceRequestId})"><img src="assets/images/ic-check.png" alt=""> Accept</button>
                        <!-- <button type="button" class="btn btn-modal-close" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>`);

            $("#service-info-modal2").modal("show");

            $(".close-btn").click(function() {
                $("#service-info-modal2").modal("hide");

                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
            });
        }

    });


}


function getExtraServices(ServiceExtraId) {
    var label = '';
    if (ServiceExtraId == null) {
        label = "";
    } else {
        const extraId = Array.from(String(ServiceExtraId), Number);
        for (var i = 0; i <= extraId.length; i++) {
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

    return label;
}

function acceptServiceReq(sId, ) {
    if ($('.response-text').css('display', 'block')) {
        $('.response-text').css('display', 'none')
    }
    $.LoadingOverlay("show");
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=acceptServiceRequest",
        data: {
            sId
        },
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));

            if (res == "Success") {
                $('#btn-accept-service').attr('disabled', 'disabled');
                $('#btn-accept-service').css('cursor', 'not-allowed');
                alert("Service Accepted Successfully.");
                getNewServices().then(response => {
                    fillNewServiceTable();
                });
            } else {
                $('.response-text').css('display', 'block');
                $('#response-service-accept').html(res);
                console.log(res);
            }
        }
    });
    $.LoadingOverlay("hide");
}