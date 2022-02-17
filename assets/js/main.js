document.addEventListener("scroll", () => {
    var logo = document.getElementById("logo");
    if (window.scrollY > 10 || window.screen.width < 600) {
        logo.src = "assets/images/logo-small.png";
        document.getElementById("navbar").style.background = "rgba(0,0,0,0.8)";
        document.getElementById("notification-count").style.top = "10px";
    } else {
        logo.src = "assets/images/white-logo-transparent-background.png";
        document.getElementById("navbar").style.background = "none";
        document.getElementById("notification-count").style.top = "30%";
    }
});

function privacy_policy_btn() {
    $(".privacy-policy-sec").css("display", "none");
}

var open = false;
let openSideBar = () => {
    if (!open) {
        open = true;
        document.getElementById("sidebar").classList.add("active");
    } else {
        open = false;
        document.getElementById("sidebar").classList.remove("active");
    }
};

let changeAvatar = (e) => {
    let all = document.getElementsByClassName("selected");
    let activeAvatar = document.getElementById("active-avatar");
    for (let i = 0; i <= all.length; i++) {
        if (all[i].classList.contains("active")) {
            all[i].classList.remove("active");
            e.target.classList.add("active");
            activeAvatar.src = e.target.src;
        } else {
            continue;
        }
    }
};

let removeActive = (e) => {
    let all = document.getElementsByClassName("dropdown-item");
    for (let i = 0; i <= all.length; i++) {
        if (all[i].classList.contains("active")) {
            all[i].classList.remove("active");
            e.target.classList.add("active");
            e.target.classList.toggle("active");
        } else {
            continue;
        }
    }
};

let closeSideBar = () => {
    open = false;
    document.getElementById("sidebar").classList.remove("active");
};

function initMap() {
    // The location of Uluru
    const uluru = { lat: 51.165691, lng: 10.451526 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 9,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}

// Change Icon for Booking services
const setup = document.getElementById("setup-service");
const your_detail = document.getElementById("your-details");
const schedule = document.getElementById("schedule");
const payment = document.getElementById("payment");

//tabs and its content
const setup_service_content = document.getElementById("setup-service-tab");
const schedule_tab_content = document.getElementById("schedule-tab");
const yourDetailsTabContent = document.getElementById("your-details-tab");
const paymentTabContent = document.getElementById("payment-tab");

// images
const setup_img = document.getElementById("setup-img");
const schedule_img = document.getElementById("schedule-img");
const your_details_img = document.getElementById("detail-img");
const payment_img = document.getElementById("payment-img");

setup.addEventListener("click", () => {
    setup_img.setAttribute("src", "assets/images/setup-service-white.png");
    schedule_img.setAttribute("src", "assets/images/schedule.png");
    your_details_img.setAttribute("src", "assets/images/details.png");
    payment_img.setAttribute("src", "assets/images/payment.png");

    showTabContent(setup, setup_service_content);

    removeContent(schedule, schedule_tab_content);

    removeContent(your_detail, yourDetailsTabContent);

    removeContent(payment, paymentTabContent);
});

schedule.addEventListener("click", () => {
    schedule_img.setAttribute("src", "assets/images/schedule-white.png");
    setup_img.setAttribute("src", "assets/images/setup-service-white.png");
    your_details_img.setAttribute("src", "assets/images/details.png");
    payment_img.setAttribute("src", "assets/images/payment.png");

    showTabContent(schedule, schedule_tab_content);

    removeContent(your_detail, yourDetailsTabContent);

    removeContent(payment, paymentTabContent);
});

your_detail.addEventListener("click", () => {
    your_details_img.setAttribute("src", "assets/images/details-white.png");
    setup_img.setAttribute("src", "assets/images/setup-service-white.png");
    schedule_img.setAttribute("src", "assets/images/schedule-white.png");
    payment_img.setAttribute("src", "assets/images/payment.png");

    showTabContent(your_detail, yourDetailsTabContent);

    removeContent(payment, paymentTabContent);
});

payment.addEventListener("click", () => {
    payment_img.setAttribute("src", "assets/images/payment-white.png");
    setup_img.setAttribute("src", "assets/images/setup-service.png");
    your_details_img.setAttribute("src", "assets/images/details.png");
    schedule_img.setAttribute("src", "assets/images/schedule.png");
});

function showTabContent(tab, tabContent) {
    tab.classList.add("active");
    tabContent.classList.add("show", "active");
}

function removeContent(tab, tabContent) {
    tab.classList.remove("active");
    tabContent.classList.remove("show", "active");
    tab.style.pointerEvents = "none";
    tab.style.background = "#f3f3f3";
    tab.style.color = "#646464";
}

// function onlyNumberKey(evt) {
//     // Only ASCII character in that range allowed
//     var ASCIICode = (evt.which) ? evt.which : evt.keyCode
//     if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
//         return false;
//     } else {
//         return true;
//     }
// }

function addSlash(e) {
    let ch = e.target.value;
    let text = ch.slice(0, 2);

    if (text >= 12) {
        alert("invalid month");
        e.target.value = "";
    } else {
        if (ch.length == 2) {
            e.target.value = ch + "/";
        }
    }
}

let closeAddressDialog = () => {
    const closeDialog = document.getElementById("address-dialog");
    const btnNewAddress = document.getElementById("btn-new-address");
    closeDialog.style.display = "none";
    btnNewAddress.style.display = "block";
};

function showMessage(id) {
    var t = document.getElementById(id);
    let message = document.getElementsByClassName("msg-text");
    let contact_msg = document.getElementById("textarea-msg");

    if (t.id == "fname") {
        if (t.value == "") {
            message[0].innerHTML = "Please enter a firstname";
        } else {
            message[0].innerHTML = "";
            message[0].style.marginBottom = "0";
        }
    } else if (t.id == "lname") {
        if (t.value == "") {
            message[1].innerHTML = "Please enter a Lastname";
        } else {
            message[1].innerHTML = "";
            message[1].style.marginBottom = "0";
        }
    } else if (t.id == "email") {
        if (t.value == "") {
            message[2].innerHTML = "Please enter a valid email address";
        } else {
            message[2].innerHTML = "";
            message[2].style.marginBottom = "0";
        }
    } else if (t.id == "phone") {
        if (t.value == "") {
            message[3].innerHTML = "Please enter a mobile number";
        } else {
            message[3].innerHTML = "";
            message[3].style.marginBottom = "0";
        }
    } else if (t.id == "pass") {
        if (t.value == "") {
            message[4].innerHTML = "Please enter a password";
        }
    } else if (t.id == "c-pass") {
        if (t.value == "") {
            message[5].innerHTML = "Please enter a confirm password";
        } else {
            message[5].innerHTML = "";
            message[5].style.marginBottom = "0";
        }
    } else if (t.id == "contact-msg") {
        if (t.value == "") {
            contact_msg.innerHTML = "Please enter a message";
        } else {
            contact_msg.innerHTML = "";
            contact_msg.style.marginBottom = "0";
        }
    }
}

function checkPass(id) {
    let p = document.getElementById(id);
    let password = document.getElementById("pass").value;
    var pass = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"
    );
    let message = document.getElementsByClassName("msg-text");

    if (p.id == "pass") {
        if (pass.test(p.value)) {
            message[4].innerHTML = "";
        } else {
            message[4].innerHTML =
                "You must enter At least one upper case, one lower case, one digit and Minimum eight in length";
        }
    }

    if (p.id == "c-pass") {
        if (p.value == password.value) {
            message[5].innerHTML = "";
        } else {
            message[5].innerHTML = "Password does not match the confirm password!";
        }
    }
}

function hideMessage() {
    document.getElementsByClassName("status-message")[0].style.display = "none";
}

var postalCode;
var hasPets;
var checkboxes = [];

$(document).ready(function() {
    $("#postalCode-btn").click(function(e) {
        e.preventDefault();

        let pCode = document.getElementById("input-postalCode").value;
        let serviceDate = document.getElementById("service-date");
        let perCleaning = document.querySelectorAll(".per-cleaning");
        let totalAmount = document.querySelectorAll(".payment-amt");
        let cardHour = document.querySelectorAll(".basic-service-duration");
        serviceDate.value = new Date().toISOString().slice(0, 10);

        if ($(".response-text1").css("display", "block")) {
            $(".response-text1").css("display", "none");
        }

        if (pCode == "") {
            alert("enter postal code");
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=service&function=checkZipCode",
                data: { postalCode: pCode },
                dataType: "JSON",
                success: function(response) {
                    res = JSON.parse(JSON.stringify(response));
                    if (response) {
                        postalCode = response["ZipcodeValue"];

                        for (let i = 0; i < perCleaning.length; i++) {
                            perCleaning[i].innerHTML = "$54";
                            totalAmount[i].innerHTML = "$54";
                            cardHour[i].innerHTML = "3.0 Hrs";
                        }
                        changeTabs(
                            schedule,
                            schedule_tab_content,
                            setup,
                            setup_service_content
                        );
                        schedule_img.setAttribute(
                            "src",
                            "assets/images/schedule-white.png"
                        );
                    } else {
                        $(".response-text1").css("display", "block");
                        $("#response1").html(res);
                    }
                },
            });
        }
    });

    $("#secondTabContinue-btn").click(function(e) {
        e.preventDefault();
        if ($(".response-text2").css("display", "block")) {
            $(".response-text2").css("display", "none");
        }
        changeTabs(
            your_detail,
            yourDetailsTabContent,
            schedule,
            schedule_tab_content
        );
        your_details_img.setAttribute(
            "src",
            "assets/images/details-white.png"
        );

        $('input[name="extra"]:checked').each(function() {
            checkboxes.push(this.value);
        });

        if ($("#pets-label:checked").val() == 1) {
            hasPets = 1;
        } else {
            hasPets = 0;
        }
        var array = {
            serviceDate: $("#service-date").val(),
            serviceTime: $("#s-time").val(),
            serviceHours: $("#s-hours").val(),
            extraService: checkboxes,
            comments: $("#comments").val(),
            pets: hasPets,
        };
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=service&function=checkScheduleTab",
            data: { arr: array },
            dataType: "JSON",
            success: function(response) {
                res = JSON.parse(JSON.stringify(response));
                if (response) {
                    addAddress(response);
                } else {
                    $(".response-text2").css("display", "block");
                    $("#response2").html(res);
                }
            },
        });
    });

    $("#btn-add-new-address").click(function(e) {
        e.preventDefault();
        if ($(".response-text2").css("display", "block")) {
            $(".response-text2").css("display", "none");
        }
        let array = {
            streetName: $("#street").val(),
            houseNum: $("#house").val(),
            postalCode: $("#new-postalCode").val(),
            city: $("#new-city").val(),
            phone: $("#new-phone").val(),
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=service&function=addNewAddress",
            data: { array: array },
            dataType: "JSON",
            success: function(response) {
                res = JSON.parse(JSON.stringify(response));
                if (response) {
                    alert("Success");
                    $("#new-address").append(
                        `<div class="address-radio form-group">
                                <input type="radio" name="address" id="radio2" value="${response['AddressLine1']}">
                
                                <div class="radio-labels">
                                    <label for="radio2">Address:
                                        <span class="radio-text">${response["AddressLine1"]}</span>
                                    </label>
                                    <label for="radio2">Phone number:
                                        <span class="radio-text-phone" id="mobile">${response["Mobile"]}</span>
                                    </label>
                                </div>
                            </div>`
                    );
                    closeAddressDialog();
                } else {
                    $(".response-text2").css("display", "block");
                    $(".text-danger").html(res);
                }
            },
        });
    });

    $('#your-details-continue').click(function(e) {
        e.preventDefault();
        var address = '';
        $('.your-details-content input[type="radio"]:checked').each(function() {
            address = $(this).val();
        });
        let serviceDate = $("#service-date").val();

        let data = {
            addressLine: address,
            date: serviceDate
        };


        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=service&function=validateAddress",
            data: {
                data: data
            },
            dataType: "JSON",
            success: function(response) {
                alert(response);

                changeTabs(payment, paymentTabContent, your_detail, yourDetailsTabContent);
                payment_img.setAttribute("src", "assets/images/payment-white.png");
            }
        });
    });

    $('#complete-booking-btn').click(function(e) {
        e.preventDefault();
        var address = '';
        $('.your-details-content input[type="radio"]:checked').each(function() {
            address = $(this).val();
        });
        let serviceData = {
            ZipcodeValue: postalCode,
            serviceDate: $("#service-date").val(),
            serviceTime: $("#s-time").val(),
            serviceHours: $("#s-hours").val(),
            totalCost: $('#total-amt').text(),
            extraService: checkboxes,
            comments: $("#comments").val(),
            pets: hasPets,
            address: address
        };

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=service&function=submitServiceReq",
            data: {
                serviceData: serviceData
            },
            dataType: "JSON",
            success: function(response) {
                if (response) {
                    $('#complete-booking-modal').modal('show');
                    $('#service-id').html(response['ServiceId']);
                    console.log('service booked');
                }
            }
        });
    });

    $('#complete-booking-modal-ok-btn').click(function(e) {
        $('#complete-booking-modal').modal('hide');
        window.location.href = "http://localhost/Helperland/?controller=home&function=bookService"
    });
});
let showAddressDialog = () => {
    const addressDialog = document.getElementById("address-dialog");
    const btnNewAddress = document.getElementById("btn-new-address");
    addressDialog.style.display = "block";
    btnNewAddress.style.display = "none";

    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/?controller=service&function=getData",
        dataType: "JSON",
        success: function(response) {
            console.log(response);
            for (let i = 0; i < response.length; i++) {
                $("#new-postalCode").val(response[i]["PostalCode"]);
                $("#new-city").append(
                    `<option value="${response[i]["City"]}">${response[i]["City"]}</option>`
                );
            }
        },
    });
};

let flag = true;

function addAddress(response) {
    if (flag == true) {
        for (let i = 0; i < response.length; i++) {
            checked = response[i].IsDefault == 1 ? "checked" : "";
            $(".user-address").append(
                `<div class="address-radio form-group">
                    <input type="radio" name="address" id="radio1" value="${response[i]['AddressLine1']}
                    " ${checked}>
    
                    <div class="radio-labels">
                        <label for="radio1">Address:
                            <span class="radio-text">${response[i]["AddressLine1"]}</span>
                        </label>
                        <label for="radio1">Phone number:
                            <span class="radio-text-phone" id="mobile">${response[i]["Mobile"]}</span>
                        </label>
                    </div>
                </div>`
            );
            flag = false;
        }
    }
}

function changeTabs(currentTab, currentTabContent, prevTab, PreTabContent) {
    prevTab.classList.remove("active");
    PreTabContent.classList.remove("show", "active");
    currentTab.classList.add("active");
    currentTab.style.background = "#1d7a8c";
    currentTab.style.color = "#fff";
    currentTabContent.classList.add("show", "active");
    prevTab.style.background = "#1d7a8c";
    prevTab.style.color = "white";
    prevTab.style.pointerEvents = "all";
}

let hour = 3.0;
let amount = 54;
let temp = 54;

function addToCard(checkId, lableId) {
    let check = document.getElementById(checkId);
    let extra = document.getElementsByClassName("card-extra-services");
    let serviceHour = document.getElementById("s-hours");
    let perCleaning = document.querySelectorAll(".per-cleaning");
    let totalAmount = document.querySelectorAll(".payment-amt");

    function checkSelectoption(val) {
        for (let i = 0; i <= serviceHour.length; i++) {
            if (val == serviceHour[i].value) {
                hour = val;
                serviceHour.options[i].selected = true;
            }
        }
    }
    if (check.checked) {
        switch (lableId) {
            case "labelCabinet":
                for (let i = 0; i < extra.length; i++) {
                    extra[i].innerHTML +=
                        "<div class='service-info labelCabinet'><span>Inside Cabinets (extra)</span><span class='service-duration'>30 min</span></div>";
                }

                hour = hour + 0.5;
                temp = temp + 9;
                for (let j = 0; j < perCleaning.length; j++) {
                    perCleaning[j].innerHTML = "$" + temp;
                    totalAmount[j].innerHTML = "$" + temp;
                }
                document.querySelectorAll(".total-duration")[0].innerHTML =
                    hour + " Hrs";
                document.querySelectorAll(".total-duration")[1].innerHTML =
                    hour + " Hrs";
                checkSelectoption(hour);

                break;
            case "labelFridge":
                for (let i = 0; i < extra.length; i++) {
                    extra[i].innerHTML +=
                        "<div class='service-info labelFridge'><span>Inside Fridge (extra)</span><span class='service-duration'>30 min</span></div>";
                }
                hour = hour + 0.5;
                temp = temp + 9;
                for (let j = 0; j < perCleaning.length; j++) {
                    perCleaning[j].innerHTML = "$" + temp;
                    totalAmount[j].innerHTML = "$" + temp;
                }
                document.querySelectorAll(".total-duration")[0].innerHTML =
                    hour + " Hrs";
                document.querySelectorAll(".total-duration")[1].innerHTML =
                    hour + " Hrs";
                checkSelectoption(hour);
                break;
            case "labelOven":
                for (let i = 0; i < extra.length; i++) {
                    extra[i].innerHTML +=
                        "<div class='service-info labelOven'><span>Inside Oven (extra)</span><span class='service-duration'>30 min</span></div>";
                }
                hour = hour + 0.5;
                temp = temp + 9;
                for (let j = 0; j < perCleaning.length; j++) {
                    perCleaning[j].innerHTML = "$" + temp;
                    totalAmount[j].innerHTML = "$" + temp;
                }
                document.querySelectorAll(".total-duration")[0].innerHTML =
                    hour + " Hrs";
                document.querySelectorAll(".total-duration")[1].innerHTML =
                    hour + " Hrs";
                checkSelectoption(hour);
                break;
            case "labelWash":
                for (let i = 0; i < extra.length; i++) {
                    extra[i].innerHTML +=
                        "<div class='service-info labelWash'><span>Laundry wash & dry (extra)</span><span class='service-duration'>30 min</span></div>";
                }
                hour = hour + 0.5;
                temp = temp + 9;
                for (let j = 0; j < perCleaning.length; j++) {
                    perCleaning[j].innerHTML = "$" + temp;
                    totalAmount[j].innerHTML = "$" + temp;
                }
                document.querySelectorAll(".total-duration")[0].innerHTML =
                    hour + " Hrs";
                document.querySelectorAll(".total-duration")[1].innerHTML =
                    hour + " Hrs";
                checkSelectoption(hour);
                break;
            case "labelWindow":
                for (let i = 0; i < extra.length; i++) {
                    extra[i].innerHTML +=
                        "<div class='service-info labelWindow'><span>Interior Windows (extra)</span><span class='service-duration'>30 min</span></div>";
                }
                hour = hour + 0.5;
                temp = temp + 9;
                for (let j = 0; j < perCleaning.length; j++) {
                    perCleaning[j].innerHTML = "$" + temp;
                    totalAmount[j].innerHTML = "$" + temp;
                }
                document.querySelectorAll(".total-duration")[0].innerHTML =
                    hour + " Hrs";
                document.querySelectorAll(".total-duration")[1].innerHTML =
                    hour + " Hrs";
                checkSelectoption(hour);
                break;
        }
    } else {
        document.querySelectorAll("." + lableId)[1].remove();
        document.querySelectorAll("." + lableId)[1].remove();
        hour = hour - 0.5;
        temp = temp - 9;
        for (let j = 0; j < perCleaning.length; j++) {
            perCleaning[j].innerHTML = "$" + temp;
            totalAmount[j].innerHTML = "$" + temp;
        }
        document.querySelectorAll(".total-duration")[0].innerHTML = hour + " Hrs";
        document.querySelectorAll(".total-duration")[1].innerHTML = hour + " Hrs";
        checkSelectoption(hour);
    }
}

function cardInfo() {
    let bed = document.getElementById("infoBed");
    let bath = document.getElementById("infoBath");
    let sTime = document.getElementById("s-time");
    let infoBed = document.querySelectorAll(".bed");
    let infoBath = document.querySelectorAll(".bath");
    let serviceDate = document.getElementById("service-date").value;
    let serviceHour = document.getElementById("s-hours");
    let perCleaning = document.querySelectorAll(".per-cleaning");
    let totalAmount = document.querySelectorAll(".payment-amt");
    let cardHour = document.querySelectorAll(".basic-service-duration");
    let totalDuration = document.querySelectorAll(".total-duration");
    let cardTime = document.getElementsByClassName("service-time");
    let check1 = document.getElementById("check1").checked;
    let check2 = document.getElementById("check2").checked;
    let check3 = document.getElementById("check3").checked;
    let check4 = document.getElementById("check4").checked;
    let check5 = document.getElementById("check5").checked;
    let sHour = serviceHour[serviceHour.selectedIndex].value;
    let currentDate = new Date().toISOString().slice(0, 10);

    let optionBed = bed.options[bed.selectedIndex];
    let optionBath = bath.options[bath.selectedIndex];
    let optionTime = sTime.options[sTime.selectedIndex];
    let optionHour = serviceHour[serviceHour.selectedIndex];

    document.getElementById("s-date").innerHTML = serviceDate;
    document.getElementById("s-date2").innerHTML = serviceDate;

    if (
        check1 == false &&
        check2 == false &&
        check3 == false &&
        check4 == false &&
        check5 == false
    ) {
        hour = serviceHour[serviceHour.selectedIndex];
    } else {
        if (sHour <= totalDuration[0].textContent) {
            alert(
                "Booking time is less than recommended, we may not be able to finish the job. Please confirm if you wish to proceed with your booking?"
            );
            window.location.href =
                "http://localhost/Helperland/?controller=home&function=bookService";
        }
    }
    hour = parseFloat(optionHour.value);

    for (let i = 0; i < infoBed.length; i++) {
        infoBed[i].innerHTML = optionBed.text;
    }

    for (let i = 0; i < infoBath.length; i++) {
        infoBath[i].innerHTML = optionBath.text;
    }
    cardTime[0].innerHTML = optionTime.text;
    cardTime[1].innerHTML = optionTime.text;

    for (let i = 0; i < cardHour.length; i++) {
        cardHour[i].innerHTML = optionHour.text;
    }
    for (let i = 0; i < totalDuration.length; i++) {
        totalDuration[i].innerHTML = optionHour.text;
    }

    for (let i = 0; i <= serviceHour.length; i++) {
        amount = 54;
        if (serviceHour.options[i].selected == true) {
            amount = amount + 9 * i;
            for (let j = 0; j < perCleaning.length; j++) {
                perCleaning[j].innerHTML = "$" + amount;
                totalAmount[j].innerHTML = "$" + amount;
            }

            temp = amount;
        }
    }
}