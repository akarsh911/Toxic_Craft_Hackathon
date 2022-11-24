function profile_v() {
    if (document.getElementById('profile_box').style.visibility == "visible") {
        document.getElementById('profile_box').style.visibility = "hidden";
    }
    else {
        document.getElementById('profile_box').style.visibility = "visible";
    }
}
window.addEventListener('click', function (e) {
    if (document.getElementById('profile_box').style.visibility == "visible") {
        if (!document.getElementById('profile_box').contains(e.target) && !document.getElementById('profile_click').contains(e.target)) {
            document.getElementById('profile_box').style.visibility = "hidden";
        }
    }
});

function notif_v() {
    if (document.getElementById('notif_box').style.visibility == "visible") {
        document.getElementById('notif_box').style.visibility = "hidden";
    }
    else {
        document.getElementById('notif_box').style.visibility = "visible";
    }
}
window.addEventListener('click', function (e) {
    if (document.getElementById('notif_box').style.visibility == "visible") {
        if (!document.getElementById('notif_box').contains(e.target) && !document.getElementById('notif_click').contains(e.target)) {
            document.getElementById('notif_box').style.visibility = "hidden";
        }
    }
});
