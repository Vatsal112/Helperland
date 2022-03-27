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

let upcomingServiceRowPerPage = document.getElementById("upcoming-service-table-rows-per-page").value;
let upcomingServiceTotalRecordsCount = document.getElementById("upcoming-service-total-count");

let newServicesTotalCountRecords = document.getElementById(
    "new-services-total-count"
);

let currentPage = 1;
let startIndex = 0;
let endIndex = newServiceRowsPerPage;
let newRequestTotalRecords = 0;
let pageCount = 1;
let newServices = [];

let upcomingServiceCurrentPage = 1;
let upcomingServiceStartIndex = 0;
let upcomingServiceEndIndex = upcomingServiceRowPerPage;
let upcomingServiceTotalRecords = 0;
let upcomingServicePageCount = 1;


$(document).ready(function() {
    getNewServices();
    getUpcomingService();
});

function getFilteredNewServices(hasPets) {
    return newServices.filter(service => service.HasPets === (hasPets ? "1" : "0"));
}

function getNewServices() {
    return $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=getNewServices",
        dataType: "JSON",
        success: function(response) {
            newServices = [...response];
            pageCount = Math.ceil(response.length / newServiceRowsPerPage);
            $("#currentPage").text(currentPage);
        },
    });
}

function fillNewServiceTable() {
    const hasPets = document.getElementById('checkHasPets').checked;
    const data = getFilteredNewServices(hasPets);
    newServicesTotalCountRecords.innerHTML = data.length;
    let newServiceData = data.slice(startIndex, endIndex);

    $('#new-service-req-table').html("");

    for (var i = 0; i < newServiceData.length; i++) {
        $('#new-service-req-table').append(`
        <tr>
        <td>${newServiceData[i].ServiceId}</td>
        <td>
            <div class="service-info" onclick="serviceInfo(${newServiceData[i].ServiceRequestId});">
                <div class="service-datetime-icons">
                    <a ><img src="assets/images/calender-icon.png" alt=" "></a>
                    <a ><img src="assets/images/sp-timericon.png" alt=" "></a>
                    <!--service provider screen new service content modal start-->
                    <div class="modal fade" id="service-info-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    </div>
                    <!--service provider screen new service content modal end-->
                </div>
                <div class="service-datetime-texts">
                    <a href="#">${newServiceData[i].StartDate}</strong></a>
                    <a href="#">
                        <p>${newServiceData[i].StartTime}-${newServiceData[i].EndTime} </p>
                    </a>
                </div>
            </div>
        </td>
        <td class="td-address">
            <a onclick="serviceInfo(${newServiceData[i].ServiceRequestId});">
                <p>${newServiceData[i].custData.FirstName} ${newServiceData[i].custData.LastName}</p>
                <div class="service-info">
                    <div class="service-home-icon">
                        <img src="assets/images/home-icon.png" alt=" ">
                    </div>
                    <div class="service-address-texts">
                        <p>${newServiceData[i].custAddress.AddressLine1}</p>
                    </div>
                </div>
            </a>
        </td>
        <td>
            <div class="payment-content">
                <b>$${newServiceData[i].TotalCost}</b>
            </div>
        </td>
        <td></td>
        <td class="btn-cancel">
            <button type="button" onclick="acceptServiceReq(${newServiceData[i].ServiceRequestId})" id="btn-accept-service">Accept</button>
        </td>
    </tr>
        `);
    }

}

function changeRowsPerPageNewService(rowsPerPage) {
    currentPage = 1;
    newServiceRowsPerPage = rowsPerPage;
    startIndex = 0;
    endIndex =
        newRequestTotalRecords < rowsPerPage ?
        newRequestTotalRecords :
        rowsPerPage;
}

$("#newServiceNextBtn").click(function(e) {
    e.preventDefault();

    if (currentPage + 1 <= pageCount) {
        currentPage++;
        let updatedEndIndex = currentPage * newServiceRowsPerPage;
        startIndex = endIndex;
        endIndex =
            newRequestTotalRecords <= updatedEndIndex ?
            newRequestTotalRecords :
            updatedEndIndex;
        fillNewServiceTable();
    } else {
        console.log("cant next");
    }
});

$("#newServicePrevBtn").click(function(e) {
    e.preventDefault();

    if (currentPage - 1 > 0) {
        endIndex = startIndex;
        startIndex = startIndex - newServiceRowsPerPage;
        fillNewServiceTable();
        currentPage--;
    } else {
        console.log("cant prev");
    }
});

$("#newRequestFirstPage").click(function(e) {
    e.preventDefault();

    currentPage = 1;
    startIndex = 0;
    endIndex =
        newServiceRowsPerPage < newRequestTotalRecords ?
        newServiceRowsPerPage :
        newRequestTotalRecords;
    fillNewServiceTable();
});

$("#newRequestLastPage").click(function(e) {
    e.preventDefault();
    currentPage = pageCount;
    endIndex = newRequestTotalRecords;
    startIndex = (currentPage - 1) * newServiceRowsPerPage;
    fillNewServiceTable();
});


$("#upcomingServiceNextBtn").click(function(e) {
    e.preventDefault();

    if (upcomingServiceCurrentPage + 1 <= upcomingServicePageCount) {
        upcomingServiceCurrentPage++;
        let updatedEndIndex = upcomingServiceCurrentPage * upcomingServiceRowPerPage;
        upcomingServiceStartIndex = upcomingServiceEndIndex;
        upcomingServiceEndIndex =
            upcomingServiceTotalRecords <= updatedEndIndex ?
            upcomingServiceTotalRecords :
            updatedEndIndex;
        getUpcomingService();
    } else {
        console.log("cant next");
    }
});


$("#upcomingServicePrevBtn").click(function(e) {
    e.preventDefault();

    if (upcomingServiceCurrentPage - 1 > 0) {
        upcomingServiceEndIndex = upcomingServiceStartIndex;
        upcomingServiceStartIndex = upcomingServiceStartIndex - upcomingServiceRowPerPage;
        getUpcomingService();
        currentPage--;
    } else {
        console.log("cant prev");
    }
});

$("#upcomingServiceFirstPage").click(function(e) {
    e.preventDefault();

    upcomingServiceCurrentPage = 1;
    upcomingServiceStartIndex = 0;
    upcomingServiceEndIndex =
        upcomingServiceRowPerPage < upcomingServiceTotalRecords ?
        upcomingServiceRowPerPage :
        upcomingServiceTotalRecords;
    getUpcomingService();
});

$("#upcomingServiceLastPage").click(function(e) {
    e.preventDefault();
    upcomingServiceCurrentPage = upcomingServicePageCount;
    upcomingServiceEndIndex = upcomingServiceTotalRecords;
    upcomingServiceStartIndex = (upcomingServiceCurrentPage - 1) * upcomingServiceRowPerPage;
    getUpcomingService();
});

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

function acceptServiceReq(sId) {
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
                console.log(response);
                getNewServices().then(response => {
                    fillNewServiceTable();
                });
                getUpcomingService();
            } else {
                $('.response-text').css('display', 'block');
                $('#response-service-accept').html(res);
                console.log(res);
            }
        },
        complete: function(data) {
            $.LoadingOverlay("hide");
        }
    });

}

function getUpcomingService() {
    $('#upcoming-service-table').html("");
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=getUpcomingService",
        dataType: "JSON",
        success: function(response) {
            let data = response.slice(upcomingServiceStartIndex, upcomingServiceEndIndex);
            fillUpcomingServiceTable(data);
            $('#upcomingServiceCurrentPage').html(upcomingServiceCurrentPage);
            upcomingServiceTotalRecordsCount.innerHTML = response.length;
            upcomingServicePageCount = Math.ceil(response.length / upcomingServiceRowPerPage);
        }
    });
}

function fillUpcomingServiceTable(data) {
    $('#upcoming-service-table').html("");
    for (var i = 0; i < data.length; i++) {
        $('#upcoming-service-table').append(`
        <tr>
        <td>${data[i].ServiceId}</td>
        <td>
            <div class="service-info" onclick='upcomingServiceInfo(${data[i].ServiceRequestId})'>
                <div class="service-datetime-icons">

                    <a href="#" ><img src="assets/images/calender-icon.png" alt=" "></a>
                    <a href="#" ><img src="assets/images/sp-timericon.png" alt=" "></a>

                    <div class="modal fade" id="service-info-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        
                    </div>
                </div>
                <div class="service-datetime-texts">
                    <a href="#"><strong>${data[i].StartDate}</strong></a>
                    <a href="#">
                        <p>${data[i].StartTime} - ${data[i].EndTime}</p>
                    </a>
                </div>
            </div>
        </td>
        <td class="td-address">
            <a href="#" data-toggle="modal" data-target="#service-info-modal">
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
        <td>$${data[i].TotalCost}</td>
        <td></td>
        <td class="btn-cancel">
            <button type="button" onclick = 'cancelServiceRequest(${data[i].ServiceRequestId})'>Cancel</button>
        </td>
    </tr>
        `);
    }
}

function upcomingServiceInfo(sId) {
    var time = new Date();
    var date = moment().format('YYYY-MM-DD');
    let accept = '';
    let currentTime = time.getHours() + ":" + time.getMinutes();

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

            if (date == response.date) {

                if (currentTime > response.endTime) {
                    accept = `<button type="button" class="btn btn-modal-accept" onclick='completeServiceRequest(${response.ServiceRequestId})'>
                   <img src="assets/images/ic-check.png" alt="" > Complete</button>`;
                } else {
                    accept = "";
                }
            } else {
                accept = `<button type="button" class="btn btn-modal-accept" onclick='completeServiceRequest(${response.ServiceRequestId})'>
                   <img src="assets/images/ic-check.png" alt="" > Complete</button>`;
            }


            extras = getExtraServices(response.ServiceExtraId);

            $('#service-info-modal').html(`
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
                        <p class="modal-datetime">${response.date} ${response.startTime} - ${response.endTime}</p>
                        <span class="modal-duration"><b>Duration: </b>${response.ServiceHours} Hrs</span>
                    </div>

                    <div class="modal-body">
                        <span class="body-text"><b>Service Id:</b> ${response.ServiceId}</span>
                        <span class="body-text"><b>Extras:</b> ${extras}</span>
                        <span class="body-text"><b>Total Payment:</b> <span class="payment">$${response.TotalCost}</span></span>

                        <div class="customer-details">
                            <span class="body-text"><b>Customer Name:</b> ${response.UserName}</span>
                            <span class="body-text"><b>Service Address:</b> ${response.AddressLine1}</span>
                            <span class="body-text"><b>Phone:</b> +41 ${response.Mobile}</span>
                            <span class="body-text"><b>Email:</b> ${email}</span>
                            <span class="body-text"><b>Distance:</b> unable to calculate the distance</span>
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
                        ${accept}
                        <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
            `);

            $("#service-info-modal").modal("show");

            $(".close-btn").click(function() {
                $("#service-info-modal").modal("hide");

                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
            });
        }
    });
}

function completeServiceRequest(sId) {

    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=completeServiceRequest",
        data: {
            sId
        },
        dataType: "JSON",
        success: function(response) {
            if (JSON.parse(JSON.stringify(response)) == "Success") {
                alert('Service Completed Successfully.');
            }
            getUpcomingService();
            $('#service-info-modal').modal('hide');
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
        }
    });

}

function cancelServiceRequest(sId) {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=servicerDashboard&function=cancelServiceRequest",
        data: {
            sId
        },
        dataType: "JSON",
        success: function(response) {
            if (JSON.parse(JSON.stringify(response)) == "Success") {
                alert('Cancelled Request');
                getUpcomingService();
                fillNewServiceTable();
            }
        }
    });
}