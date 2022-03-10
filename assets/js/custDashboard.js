let settingTab = document.getElementById('toggle-id').value;
let dashboardContent = document.getElementById('v-pills-dashboard');
let tabContent = document.getElementById('v-pills-my-setting');
let publicDashboardHeader = document.getElementById('v-pills-dashboard-tab');

if (settingTab != undefined) {
    tabContent.classList.add('show', 'active');
    dashboardContent.classList.remove('show', 'active');
}

publicDashboardHeader.addEventListener('click', function() {
    tabContent.classList.remove('show', 'active');
    dashboardContent.classList.add('show', 'active');
});


let serviceRequestRowsPerPage = document.getElementById(
    "dashboard-table-rows-per-page"
).value;
let serviceHistoryRowsPerPage = document.getElementById(
    "sh-table-rows-per-page"
).value;

let serviceRequestTotalRecordsValue = document.getElementById(
    "service-request-total-records"
).value;

let currentPage = 1;
let startIndex = 0;
let endIndex = serviceRequestRowsPerPage;
let pendingRequestTotalRecords = 0;
let pageCount = 1;
let serviceHistoryLastRecordIndex = 0;

let serviceHistoryCurrentPage = 1;
let serviceHistoryPageCount = 1;
let serviceHistoryNextPage = 0;
let serviceHistoryIsNext = 0;
let serviceHistoryPreviousPage = 0;

var onTimeRating = 0;
var friendlyRating = 0;
var qualityRating = 0;

$(document).ready(function() {
    getPendingServiceRequests();
    getServiceHistoryData();
});

function getPendingServiceRequests() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=getPendingServiceRequests",
        dataType: "json",
        data: {
            startIndex,
            endIndex,
        },
        success: function(response) {
            var action = '';
            pendingRequestTotalRecords = response.length;
            let data = response.slice(startIndex, endIndex);

            $("#tbody").html("");

            for (let i = 0; i < data.length; i++) {

                if (data[i].Status == 7 && data[i].ServiceProviderId != null) {
                    action = `<div class="reschedule-msg"><p class='text-success mb-0' >You have rescheduled service request. Your SP will accept it soon.</p></div>`
                } else {
                    action = `<div class="action-buttons">
                    <button class="btn-reschedule" data-toggle="modal" onclick="rescheduleService(${data[i].ServiceId})">Reschedule</button>
                    <div class="modal fade" id="reschedule-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    </div>
                    <button class="btn-cancel" onclick='cancelServiceRequestModal${data[i].ServiceId})'>Cancel</button>
                    <div class="modal fade" id="cancel-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> 
                    </div>
                </div>`;
                }

                if (data[i].ServiceProviderId == null) {
                    spcontent = "";
                } else {
                    spcontent = `
                        <div class="sp-content">
                            <div class="sp-avatar">
                                <img src="assets/images/avatar-hat.png" alt="">
                            </div>
                            <div class="sp-name-rating">
                                <b class="spName">${data[i].SpData["FirstName"]} ${data[i].SpData["LastName"]}</b>
                                <div class="sp-rating">
                                    <img src="assets/images/yellow-small-star.png" alt="">
                                    <img src="assets/images/yellow-small-star.png" alt="">
                                    <img src="assets/images/yellow-small-star.png" alt="">
                                    <img src="assets/images/yellow-small-star.png" alt="">
                                    <img src="assets/images/grey-small-star.png" alt="">
                                    <span>3.67</span>
                                </div>
                            </div>
                        </div>`;
                }

                $("#tbody").append(`<tr>
                <td class="s-id">${data[i].ServiceId}</td>

                <td>
                    <div class="service-info service-modal-toggler" onclick="serviceInfo(${data[i].ServiceId})">
                        <div class="service-datetime-icons">
                            <a href="#"><img src="assets/images/calender-icon.png" alt=" "></a>
                            <a href="#"><img src="assets/images/sp-timericon.png" alt=" "></a>

                            <div class='modal fade' id='current-service-modal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle'  aria-hidden='true'></div>
                        </div>
                        <div class="service-datetime-texts">
                            <a href="#"><strong>${data[i].StartDate}</strong></a>
                            <a href="#">
                                <p>${data[i].StartTime}-${data[i].EndTime}</p>
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    ${spcontent}
                </td>
                <td>
                    <div class="payment-content">
                        <b>$${data[i].TotalCost}</b>
                    </div>
                </td>

                <td>
                    ${action}
                </td>

            </tr>`);
            }

            pageCount = Math.ceil(response.length / serviceRequestRowsPerPage);
            $("#currentPage").text(currentPage);
            $("#service-request-total-records").html(response.length);
        },
        error: function(e) {
            console.log(e);
        },
    });
}

function serviceInfo(sId) {
    var label = "";
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=getDashboardData",
        data: {
            sId: sId,
        },
        dataType: "JSON",
        success: function(response) {
            var status = '';
            var include = "";

            if (response.Status == 7 && response.ServiceProviderId != null) {
                status = '';
            } else {
                status = `<button type="button" class="btn btn-modal-accept" data-toggle="modal" onclick="rescheduleService(${response.ServiceId})">
                <img src="assets/images/reschedule-icon-small.png" alt="" ">Reschedule</button>
            <button type="button" class="btn btn-modal-close" data-dismiss="modal"><i class='fa fa-close'></i>Cancel</button>`;
            }
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
                                            <b>${response.Spname}</b>
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
                               ${status}
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
                                <button type="button" class="btn btn-modal-accept" data-toggle="modal" onclick="rescheduleService(${response.ServiceId})">
                                    <img src="assets/images/reschedule-icon-small.png" alt="" ">Reschedule</button>
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
}

function getServiceHistoryData() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=getServiceHistoryData",
        data: {
            pageno: serviceHistoryCurrentPage,
            serviceHistoryRowsPerPage: serviceHistoryRowsPerPage,
            serviceHistoryLastRecordIndex: serviceHistoryLastRecordIndex,
            serviceHistoryIsNext,
        },
        dataType: "JSON",
        success: function(response) {
            count = Object.keys(response).length;

            for (i = 0; i < count - 4; i++) {
                let spcontent = '';
                var isDisable = "";
                var stars = '';
                // data.push(response[i].ServiceRequestId);
                if (response[i].ServiceProviderId === null) {
                    spcontent = "";
                } else {
                    stars = showRatings(response[i].SpRatings);
                    spcontent = `
                    <div class="sp-content">
                        <div class="sp-avatar">
                            <img src="assets/images/avatar-hat.png" alt="">
                        </div>
                        <div class="sp-name-rating">
                            <b class="spName-sh">${response[i].SpData.FirstName} ${response[i].SpData.LastName}</b>
                            <div class="sp-rating service-history-rating" id="">
                                ${stars}
                                <span>${response[i].SpRatings["Ratings"]}</span>
                            </div>
                        </div>
                    </div>`;
                }

                if (response[i].Status == 4) {
                    serviceStatus = `<div class="status-completed">
                        <span>Completed</span>
                     </div>`;
                    isDisable = "";
                } else if (response[i].Status == 5) {
                    serviceStatus = `<div class="status-cancelled">
                    <span>Cancelled</span>
                 </div>`;
                    isDisable = "disabled";
                } else {
                    serviceStatus = `<div class="status-refund">
                    <span>Refund</span>
                 </div>`;
                    isDisable = "disabled";
                }
                $("#cust-service-history").append(` <tr>
                <td class="s-id">${response[i].ServiceId}</td>
                <td>
                    <div class="service-history-table" onclick="serviceHistoryModal(${response[i].ServiceId})">
                        <div class="service-info2">
                            <div class="service-datetime-icons">
                                <a href="#"><img src="assets/images/calender-icon.png" alt=" "></a>
                                <a href="#"><img src="assets/images/sp-timericon.png" alt=" "></a>
                                <div class="modal fade" id="cust-service-history-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"></div>
                            </div>
                            <div class="service-datetime-texts">
                                <a href="#" data-toggle="modal" data-target="#cust-service-history-modal"><strong>${response[i].StartDate}</strong></a>
                                <a href="#" data-toggle="modal" data-target="#cust-service-history-modal">
                                    <p>${response[i].StartTime}-${response[i].EndTime}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </td>
                <td>   
                     ${spcontent}
                </td>
                <td>
                    <div class="payment-content">
                        <b>$${response[i].TotalCost}</b>
                    </div>
                </td>
                <td>
                    ${serviceStatus}
                </td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-rate-sp" onclick = "showRatingModal(${response[i].ServiceId},'${response[i].SpData.FirstName}','${response[i].SpData.LastName}')" data-target="#Ratesp" ${isDisable}>Rate SP</button>
                        <div class="modal fade" id="Ratesp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                        </div>
                        
                    </div>
                </td>
            </tr>`);
            }
            // serviceHistoryLastRecordIndex = data.sort((a, b) => b - a)[0];
            serviceHistoryPageCount = Math.ceil(
                response.total_count_service_history /
                response.set_count_service_history
            );
            serviceHistoryCurrentPage = response.current_page_service_history;
            $("#service-history-pageno").text(serviceHistoryCurrentPage);
            $("#service-history-total-record-count").html(count - 4);
            serviceHistoryPreviousPage = response.current_page_service_history - 1;
            serviceHistoryNextPage = response.current_page_service_history + 1;
        },
    });
}

function showRatings(spRating) {
    var ratingStars = '';
    var k = 0;
    if (spRating !== false) {
        let roundValue = Math.floor(spRating.Ratings);
        for (j = 0; j < roundValue; j++) {
            k++;
            ratingStars += `<i class='fa fa-star checked'></i>`;
        }
        if (roundValue < spRating.Ratings) {
            k++;
            ratingStars += `<i class='fa fa-star-half-o checked'></i>`;
        }
        if (k < 5) {
            for (s = 0; s < 5 - k; s++) {
                ratingStars += `<i class='fa fa-star'></i>`;
            }
        }
    }
    return ratingStars;
}

function serviceHistoryModal(sId) {
    var label = "";

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
                                            <p class="mt-1">1 cleanings</p>
                                        </div>
                                        <div class="sp-name-rating">
                                            <b>${response.Spname}</b>
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
                    display: "flex",
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

            $(".close-btn").click(function() {
                $("#cust-service-history-modal").modal("hide");

                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
            });
        },
    });
}

function changeRowsPerPage(rowsPerPage) {
    currentPage = 1;
    serviceRequestRowsPerPage = rowsPerPage;
    startIndex = 0;
    endIndex =
        pendingRequestTotalRecords < rowsPerPage ?
        pendingRequestTotalRecords :
        rowsPerPage;
}

function changeRowsPerPageServiceHistory(rowsPerPage) {
    serviceHistoryRowsPerPage = rowsPerPage;
}

$("#btn-next").click(function(e) {
    e.preventDefault();

    if (currentPage + 1 <= pageCount) {
        currentPage++;
        let updatedEndIndex = currentPage * serviceRequestRowsPerPage;
        startIndex = endIndex;
        endIndex =
            pendingRequestTotalRecords <= updatedEndIndex ?
            pendingRequestTotalRecords :
            updatedEndIndex;
        getPendingServiceRequests();
    } else {
        console.log("cant next");
    }
});

$("#btn-previous").click(function(e) {
    e.preventDefault();

    if (currentPage - 1 > 0) {
        endIndex = startIndex;
        startIndex = startIndex - serviceRequestRowsPerPage;
        getPendingServiceRequests();
        currentPage--;
    } else {
        console.log("cant prev");
    }
});

$("#pendingRequestFirstPage").click(function(e) {
    e.preventDefault();

    currentPage = 1;
    startIndex = 0;
    endIndex =
        serviceRequestRowsPerPage < pendingRequestTotalRecords ?
        serviceRequestRowsPerPage :
        pendingRequestTotalRecords;
    getPendingServiceRequests();
});

$("#pendingRequestLastPage").click(function(e) {
    e.preventDefault();
    currentPage = pageCount;
    endIndex = pendingRequestTotalRecords;
    startIndex = (currentPage - 1) * serviceRequestRowsPerPage;
    getPendingServiceRequests();
});

$("#serviceHistory-btnNext").click(function(e) {
    e.preventDefault();

    serviceHistoryCurrentPage++;
    serviceHistoryIsNext = 0;

    if (serviceHistoryCurrentPage > serviceHistoryPageCount) {
        // console.log("cant next");
    } else {
        $("#cust-service-history").html("");
        getServiceHistoryData();
    }
});

$("#serviceHistory-btnPrevious").click(function(e) {
    e.preventDefault();

    serviceHistoryCurrentPage--;
    serviceHistoryIsNext = 1;

    if (serviceHistoryCurrentPage <= 0) {
        // console.log("cant prev");
    } else {
        $("#cust-service-history").html("");
        getServiceHistoryData();
    }
});

function rescheduleService(sId) {
    var tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate() + 1);

    $("#reschedule-modal")
        .html(` <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
    
        <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLongTitle'>Reschedule Service Request</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true' class='close-btn'>&times;</span>
            </button>
        </div>   


        <div class='modal-body'>
            <div class='status-message'>
                <p class='text-success' id="text-ok3"></p>
            </div>
            <div class="response-text">
                <p id="response3" class="text-danger mb-0"></p>
            </div>
            <span>Select new date & time</span>
            <div class='select-date-time'>
                <div class='form-group'>
                    <input type='date' name='' id='reschedule-date' class='date-picker' min = '${tomorrow
                      .toISOString()
                      .slice(0, 10)}' value='${tomorrow
    .toISOString()
    .slice(0, 10)}'>
                    <select name='' id='reschedule-time'>
                        <option value='8'>08:00</option>
                        <option value='8.5'>08:30</option>
                        <option value='9'>09:00</option>
                        <option value='9.5'>09:30</option>
                        <option value='10'>10:00</option>
                        <option value='10.5'>10:30</option>
                        <option value='11'>11:00</option>
                        <option value='11.5'>11:30</option>
                        <option value='12'>12:00</option>
                        <option value='12.5'>12:30</option>
                        <option value='13'>13:00</option>
                        <option value='13.5'>13:30</option>
                        <option value='14'>14:00</option>
                        <option value='14.5'>14:30</option>
                        <option value='15'>15:00</option>
                        <option value='15.5'>15:30</option>
                        <option value='16'>16:00</option>
                        <option value='16.5'>16:30</option>
                        <option value='17'>17:00</option>
                        <option value='17.5'>17:30</option>
                    </select>
                </div>
            </div>
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn-modal-accept' id="btn-reschedule-service" onClick = "reschedule(${sId})">Update</button>
        </div>
        
        </div>
    </div>`);
    $("#reschedule-modal").modal("show");

    $(".close-btn").click(function() {
        $("#reschedule-modal").modal("hide");

        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
    });
}

function reschedule(sId) {
    var date = $("#reschedule-date").val();
    var time = $("#reschedule-time").val();

    if ($(".status-message").css("display", "flex")) {
        $(".status-message").css("display", "none");
    }

    if ($(".response-text").css("display", "block")) {
        $(".response-text").css("display", "none");
    }

    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=rescheduleService",
        data: {
            sId: sId,
            newDate: date,
            newTime: time,
        },
        dataType: "json",
        success: function(response) {
            $('#btn-reschedule-service').attr('disabled', 'true');
            $('btn-reschedule-service').css('cursor', 'not-allowed');
            res = JSON.parse(JSON.stringify(response));
            if (res == "Success") {
                $(".text-success").html("Service Rescheduled Successfully");
                $(".status-message").css("display", "flex");
                console.log(res);
            } else {
                $(".response-text").css("display", "block");
                $("#response3").html(res);
                console.log(res);
            }
        },
    });
}

function cancelServiceRequestModal(sId) {
    $("#cancel-modal")
        .html(` <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cancel Service Request</h5>
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <span>Why you want to cancel the service request?</span>
            <div class="form-group">
                <textarea name="" required id="cancel-msg"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-modal-accept" onclick="cancelServiceRequest(${sId})">Cancel</button>
        </div>
    </div>
</div>`);

    $("#cancel-modal").modal("show");

    $(".close-btn").click(function() {
        $("#cancel-modal").modal("hide");

        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
    });
}

function cancelServiceRequest(sId) {
    var msg = $("#cancel-msg").val();
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=cancelService",
        data: {
            sId: sId,
            message: msg,
        },
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));

            if (res == "Success") {
                $("#cancel-modal .modal-body").html(
                    `<h4>This service request ${sId} is cancelled.</h4>`
                );
                $("#cancel-modal .modal-footer").html(
                    ` <button type="button" class="btn-modal-accept close-btn" data-dismiss="modal">Ok</button>`
                );
            }
            $("#cancel-modal").modal("show");

            $(".close-btn").click(function closeModal() {
                $("#cancel-modal").modal("hide");

                $("body").removeClass("modal-open");
                $(".modal-backdrop").remove();
                location.reload();
            });
        },
    });
}

function showRatingModal(sId, firstname, lastname) {
    $("#Ratesp").html(`<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <div>
                <div class="cap d-flex align-items-center justify-content-center">
                    <img src="assets/images/cap.png" alt="">
                </div>
                <div>
                    <span class="text-start">${firstname} ${lastname}</span>
                    <span>
                    <img src="assets/images/yellow-small-star.png" alt="">
                    <img src="assets/images/yellow-small-star.png" alt="">
                    <img src="assets/images/yellow-small-star.png" alt="">
                    <img src="assets/images/yellow-small-star.png" alt="">
                    <img src="assets/images/grey-small-star.png" alt="">
                    </span>
                </div>
            </div>
            <button type="button" class="close ms-auto close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="close-btn">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <p class="rate-title">Rate your service provider</p>
        <hr>
        <div class='status-message'>
            <p class='text-success' id="text-ok3"></p>
        </div>
        <div class="response-text">
            <p id="response3" class="text-danger mb-0"></p>
        </div>
        <div class="rate">
            <div class="rating-name">
                <p>On time arrival</p>
                <p>Friendly</p>
                <p>Quality of service</p>
            </div>
            <div>
                <div class='rating-stars text-center'>
                    <ul id='stars' class="ontime">
                      <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Very Good' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Excellent' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                    </ul>
                </div>
                <div class='rating-stars text-center'>
                    <ul id='stars' class="friendly">
                      <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Very Good' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Excellent' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                    </ul>
                </div>
                <div class='rating-stars text-center'>
                    <ul id='stars' class="quality">
                      <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Very Good' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                      <li class='star' title='Excellent' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="">
            <label for="Feedback" class="form-label">Feedback on service provider</label>
            <textarea class="form-control" id="rating-msg"></textarea>
            <div class="submit mt-3">
                <button onclick= "submitRating(event,${sId})" type="submit" id="rating-submit">Submit</button>
            </div>
        </form>
        </div>

    </div>
</div>`);
    $(".ontime li")
        .on("mouseover", function() {
            var onStar = parseInt($(this).data("value"));
            $(this)
                .parent()
                .children("li.star")
                .each(function(e) {
                    if (e < onStar) {
                        $(this).addClass("hover");
                    } else {
                        $(this).removeClass("hover");
                    }
                });
        })
        .on("mouseout", function() {
            $(this)
                .parent()
                .children("li.star")
                .each(function(e) {
                    $(this).removeClass("hover");
                });
        });
    $(".ontime li").on("click", function() {
        var onStar = parseInt($(this).data("value"));
        var stars = $(this).parent().children("li.star");
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass("selected");
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass("selected");
        }
        onTimeRating = parseInt($(".ontime li.selected").last().data("value"));
    });

    $(".friendly li")
        .on("mouseover", function() {
            var onStar = parseInt($(this).data("value"));
            $(this)
                .parent()
                .children("li.star")
                .each(function(e) {
                    if (e < onStar) {
                        $(this).addClass("hover");
                    } else {
                        $(this).removeClass("hover");
                    }
                });
        })
        .on("mouseout", function() {
            $(this)
                .parent()
                .children("li.star")
                .each(function(e) {
                    $(this).removeClass("hover");
                });
        });
    $(".friendly li").on("click", function() {
        var onStar = parseInt($(this).data("value"));
        var stars = $(this).parent().children("li.star");
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass("selected");
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass("selected");
        }

        friendlyRating = parseInt($(".friendly li.selected").last().data("value"));
    });
    $(".quality li")
        .on("mouseover", function() {
            var onStar = parseInt($(this).data("value"));
            $(this)
                .parent()
                .children("li.star")
                .each(function(e) {
                    if (e < onStar) {
                        $(this).addClass("hover");
                    } else {
                        $(this).removeClass("hover");
                    }
                });
        })
        .on("mouseout", function() {
            $(this)
                .parent()
                .children("li.star")
                .each(function(e) {
                    $(this).removeClass("hover");
                });
        });
    $(".quality li").on("click", function() {
        var onStar = parseInt($(this).data("value"));
        var stars = $(this).parent().children("li.star");
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass("selected");
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass("selected");
        }

        qualityRating = parseInt($(".quality li.selected").last().data("value"));
    });

    $("#Ratesp").modal("show");

    $(".close-btn").click(function() {
        $("#Ratesp").modal("hide");

        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
    });
}

function submitRating(e, sId) {
    $("#rating-submit").attr("disabled", "true");
    $("#rating-submit").css("cursor", "not-allowed");

    if ($(".status-message").css("display", "flex")) {
        $(".status-message").css("display", "none");
    }

    if ($(".response-text").css("display", "block")) {
        $(".response-text").css("display", "none");
    }

    var ratingMessage = $("#rating-msg").val();
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=submitRating",
        data: {
            sId: sId,
            onTimeRating,
            ratingMessage,
            friendlyRating,
            qualityRating,
        },
        dataType: "json",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            if (res == "Success") {
                $(".text-success").html("Thankyou so much for rating.");
                $(".status-message").css("display", "flex");
                console.log(res);
            } else {
                $(".response-text").css("display", "block");
                $("#response3").html(res);
                console.log(res);
            }
        },
    });
}

function customerMyDetails() {
    if ($(".status-message").css("display", "flex")) {
        $(".status-message").css("display", "none");
    }

    if ($(".response-text").css("display", "block")) {
        $(".response-text").css("display", "none");
    }

    var data = {
        Firstname: $("#customer-firstname").val(),
        Lastname: $("#customer-lastname").val(),
        Phone: $("#customer-phone").val(),
        DOB: $("#customer-year").val() +
            "-" +
            $("#customer-month").val() +
            "-" +
            $("#customer-date").val(),
        Language: $("#customer-language").val(),
    };

    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=customerMyDetails",
        data: {
            data,
        },
        dataType: "json",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));

            if (res == "Success") {
                $(".text-success").html("Your details has been updated.");
                $(".status-message").css("display", "flex");
                console.log(res);
            } else {
                $(".response-text").css("display", "block");
                $("#response3").html(res);
                console.log(res);
            }
        },
    });
}

function SubmitEditAddress() {
    if ($(".status-message").css("display", "flex")) {
        $(".status-message").css("display", "none");
    }

    if ($(".response-text").css("display", "block")) {
        $(".response-text").css("display", "none");
    }
    var address = {
        AddressId: $("#address-id").val(),
        Street: $("#edited-street").val(),
        HouseNo: $("#edited-houseno").val(),
        Postalcode: $("#edited-postalcode").val(),
        City: $("#edited-city").val(),
        Phone: $("#edited-phone").val(),
    };

    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=updateAddress",
        data: {
            address,
        },
        dataType: "json",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            if (res == "Success") {
                $("#edit-addr-btn").attr("disabled", "true");
                $("#edit-addr-btn").css("cursor", "not-allowed");
                $("#text-ok4").html("Address has been updated Succesfully.");
                $(".status-message").css("display", "flex");
                console.log(res);
                setTimeout(function() {
                    location.reload(3000);
                }, 2000);
            } else {
                $(".response-text").css("display", "block");
                $("#response4").html(res);
                console.log(res);
            }
        },
    });
}

function getCity() {
    var newCode = $("#new-postalcode").val();

    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=getCity",
        data: {
            newCode,
        },
        dataType: "json",
        success: function(response) {
            if (response.CityName == null) {
                $("#new-city").html(`<option value=""></option>`);
            } else {
                $("#new-city").html(
                    `<option value="${response.CityName}">${response.CityName}</option>`
                );
            }
        },
    });
}

function addNewAddress() {
    if ($(".status-message").css("display", "flex")) {
        $(".status-message").css("display", "none");
    }

    if ($(".response-text").css("display", "block")) {
        $(".response-text").css("display", "none");
    }
    var address = {
        Street: $("#new-street").val(),
        HouseNo: $("#new-house").val(),
        Postalcode: $("#new-postalcode").val(),
        City: $("#new-city").val(),
        Phone: $("#new-phone").val(),
    };

    if (address["City"] == "") {
        alert("Please Enter a valid Zipcode.");
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=custDashboard&function=addNewAddress",
            data: {
                address,
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                res = JSON.parse(JSON.stringify(response));
                if (response["Status"] == true) {
                    $("#add-new-addr-btn").attr("disabled", "true");
                    $("#add-new-addr-btn").css("cursor", "not-allowed");
                    $("#text-ok5").html("New Address added Succesfully.");
                    $(".status-message").css("display", "flex");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    $(".response-text").css("display", "block");
                    $("#response5").html(res);
                    console.log(res);
                }
            },
        });
    }
}

function deleteAddressModal(addressId) {
    $("#delete-addr-modal").html(`
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Delete Address</h4>
                <span aria-hidden="true" class="close-btn" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this address?</p>
                    <div class="btn-delete">
                        <button type="button" onclick="deleteAddress(${addressId})" id="delete-addr-btn">Delete</button>
                    </div>
            </div>
        </div>
    </div>
    `);
}

function deleteAddress(addressId) {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=deleteAddress",
        data: {
            addressId,
        },
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            if (res == "Success") {
                $("#delete-addr-btn").attr("disabled", "true");
                $("#delete-addr-btn").css("cursor", "not-allowed");
                alert("Address has been deleted Successfully");
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        },
    });
}

function changePassword() {
    if ($(".status-message").css("display", "flex")) {
        $(".status-message").css("display", "none");
    }

    if ($(".response-text").css("display", "block")) {
        $(".response-text").css("display", "none");
    }
    var oldPass = $("#old-pass").val();
    var newPass = $("#new-pass").val();
    var confirmPass = $("#confirm-pass").val();

    if (oldPass == "" || newPass == "" || confirmPass == "") {
        alert(
            "Please Enter Correct password or Please Fill all 3 password Details"
        );
    } else {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=custDashboard&function=changePassword",
            data: {
                oldPassword: oldPass,
                newPass,
                confirmPass,
            },
            dataType: "JSON",
            success: function(response) {
                res = JSON.parse(JSON.stringify(response));
                if (res == "Success") {
                    $("#pass-save-btn").attr("disabled", "true");
                    $("#pass-save-btn").css("cursor", "not-allowed");
                    $("#text-ok6").html("Password Updated Successfully.");
                    $(".status-message").css("display", "flex");
                    console.log(res);
                } else {
                    $(".response-text").css("display", "block");
                    $("#response6").html(res);
                    console.log(res);
                }
            },
        });
    }
}

function removeFromFav() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=removeFromFav",
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            console.log(response);
            if (res == "Success") {
                alert("unfavourite");
                $(".favourite-sp .btn-favourite button").css("display", "block");
                $(".favourite-sp .btn-remove button").css("display", "none");
                location.reload();
            }
        },
    });
}

function addFavSp() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=addFavSp",
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            console.log(response);
            if (res == "Success") {
                alert("Favourite");
                $(".favourite-sp .btn-favourite button").css("display", "none");
                $(".favourite-sp .btn-remove button").css("display", "block");
                location.reload();
            }
        },
    });
}

function blockSp() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=blockSp",
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            console.log(response);
            if (res == "Success") {
                alert("Blocked");
                $(".favourite-sp .btn-unblock button").css("display", "block");
                $(".favourite-sp .btn-block button").css("display", "none");
                location.reload();
            }
        },
    });
}

function unblockSp() {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=custDashboard&function=unblockSp",
        dataType: "JSON",
        success: function(response) {
            res = JSON.parse(JSON.stringify(response));
            console.log(response);
            if (res == "Success") {
                alert("Unblocked");
                $(".favourite-sp .btn-unblock button").css("display", "none");
                $(".favourite-sp .btn-block button").css("display", "block");
                location.reload();
            }
        },
    });
}

function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    //define the file type to text/csv  
    csvFile = new Blob([csv], { type: 'text/csv' });
    downloadLink = document.createElement("a");
    downloadLink.download = filename;
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";

    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function exportTableToCSV(filename) {
    //declare a JavaScript variable of array type  
    var csv = [];
    var rows = document.querySelectorAll(".cust-service-history-table table tr");

    //merge the whole data in tabular form   
    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);
        csv.push(row.join(","));
    }
    //call the function to download the CSV file  
    downloadCSV(csv.join("\n"), filename);
}