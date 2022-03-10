var userType = document.getElementById('userType').value;

if (userType == 1) {
    var settingTab = document.getElementById('pills-settings-tab');
    settingTab.setAttribute('href', '#')
    settingTab.addEventListener('click', function() {
        window.location.href = "http://localhost/Helperland/?controller=home&function=customerDashboard&parameter=pills-settings-tab";
    });
} else {
    var servierSettings = document.getElementById('s-pills-my-setting');
    servierSettings.addEventListener('click', function() {
        window.location.href = "http://localhost/Helperland/?controller=home&function=servicerDashboard&parameter=s-pills-my-setting";
    })
};

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