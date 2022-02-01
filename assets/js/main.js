document.addEventListener("scroll", () => {
    var logo = document.getElementById("logo");
    if (window.scrollY > 10 || window.screen.width < 600) {
        logo.src = "assets/images/logo-small.png";
        document.getElementById("navbar").style.background = "rgba(0,0,0,0.8)";

    } else {
        logo.src = "assets/images/white-logo-transparent-background.png";
        document.getElementById("navbar").style.background = "none";
    }
})

// function privacy_policy_btn() {
//     $(".privacy-policy-sec").css("display", "none");
// }

var open = false;
let openSideBar = () => {

    if (!open) {
        open = true;
        document.getElementById("sidebar").classList.add("active");
    } else {
        open = false;
        document.getElementById("sidebar").classList.remove("active");
    }

}

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
}

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
}

let closeSideBar = () => {
    open = false;
    document.getElementById("sidebar").classList.remove("active");
}

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

//Change Icon for Booking services
const setup = document.getElementById("setup-service");
const your_detail = document.getElementById("your-details");
const schedule = document.getElementById("schedule");
const payment = document.getElementById("payment");

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
})

your_detail.addEventListener("click", () => {
    your_details_img.setAttribute("src", "assets/images/details-white.png");
    setup_img.setAttribute("src", "assets/images/setup-service.png");
    schedule_img.setAttribute("src", "assets/images/schedule.png");
    payment_img.setAttribute("src", "assets/images/payment.png");
})

schedule.addEventListener("click", () => {
    schedule_img.setAttribute("src", "assets/images/schedule-white.png");
    setup_img.setAttribute("src", "assets/images/setup-service.png");
    your_details_img.setAttribute("src", "assets/images/details.png");
    payment_img.setAttribute("src", "assets/images/payment.png");
})

payment.addEventListener("click", () => {
    payment_img.setAttribute("src", "assets/images/payment-white.png");
    setup_img.setAttribute("src", "assets/images/setup-service.png");
    your_details_img.setAttribute("src", "assets/images/details.png");
    schedule_img.setAttribute("src", "assets/images/schedule.png");
})

// function onlyNumberKey(evt) {
//     // Only ASCII character in that range allowed
//     var ASCIICode = (evt.which) ? evt.which : evt.keyCode
//     if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) {
//         return false;
//     } else {
//         return true;
//     }
// }

// function addSlash(e) {
//     let ch = e.target.value;
//     let text = ch.slice(0, 2);
//     let yr = ch.slice(3);
//     console.log(yr);
//     let year = new Date().getFullYear();
//     console.log(year);

//     if (text >= 12) {
//         alert("invalid month");
//         e.target.value = "";
//     } else {
//         if (ch.length == 2) {
//             e.target.value = ch + "/";
//         }
//     }
// }

let showAddressDialog = () => {
    const addressDialog = document.getElementById("address-dialog");
    const btnNewAddress = document.getElementById("btn-new-address");
    addressDialog.style.display = "block";
    btnNewAddress.style.display = "none";

}

let closeAddressDialog = () => {
    const closeDialog = document.getElementById("address-dialog");
    const btnNewAddress = document.getElementById("btn-new-address");
    closeDialog.style.display = "none";
    btnNewAddress.style.display = "block";
}

function showMessage(id) {
    var t = document.getElementById(id);
    let message = document.getElementsByClassName("msg-text");
    let contact_msg = document.getElementById('textarea-msg');

    if (t.id == 'fname') {
        if (t.value == '') {
            message[0].innerHTML = "Please enter a firstname";
        } else {
            message[0].innerHTML = "";
            message[0].style.marginBottom = "0";
        }
    } else if (t.id == 'lname') {
        if (t.value == '') {
            message[1].innerHTML = "Please enter a Lastname";
        } else {
            message[1].innerHTML = "";
            message[1].style.marginBottom = "0";
        }
    } else if (t.id == 'email') {
        if (t.value == '') {
            message[2].innerHTML = "Please enter a valid email address";
        } else {
            message[2].innerHTML = "";
            message[2].style.marginBottom = "0";
        }
    } else if (t.id == 'phone') {
        if (t.value == '') {
            message[3].innerHTML = "Please enter a mobile number";
        } else {
            message[3].innerHTML = "";
            message[3].style.marginBottom = "0";
        }
    } else if (t.id == 'pass') {
        if (t.value == '') {
            message[4].innerHTML = "Please enter a password";
        }
    } else if (t.id == 'c-pass') {
        if (t.value == '') {
            message[5].innerHTML = "Please enter a confirm password";
        } else {
            message[5].innerHTML = "";
            message[5].style.marginBottom = "0";
        }
    } else if (t.id == 'contact-msg') {
        if (t.value == '') {
            contact_msg.innerHTML = "Please enter a message";
        } else {
            contact_msg.innerHTML = "";
            contact_msg.style.marginBottom = "0";
        }
    }
}

function checkPass(id) {
    let p = document.getElementById(id);
    let password = document.getElementById('pass').value;
    var pass = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    let message = document.getElementsByClassName("msg-text");

    if (p.id == 'pass') {
        if (pass.test(p.value)) {
            message[4].innerHTML = "";
        } else {
            message[4].innerHTML = "You must enter At least one upper case, one lower case, one digit and Minimum eight in length";
        }
    }

    if (p.id == 'c-pass') {
        if (p.value == password.value) {
            message[5].innerHTML = ""
        } else {
            message[5].innerHTML = "Password does not match the confirm password!";
        }
    }

}

function hideMessage() {
    document.getElementsByClassName('status-message')[0].style.display = "none";
    window.location.href = "http://localhost/helperland/?controller=home&function=contact";
}