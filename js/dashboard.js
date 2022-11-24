function nav_fold() {
    var html = document.getElementById('data_html');
    var nav = document.getElementById('navigation_container');
    if (nav.classList.contains("thin")) {
        nav.classList.remove("thin");
        html.classList.remove("thin");
    }
    else {
        nav.classList.add("thin");
        html.classList.add("thin");
    }
}
function nav_open() {
    var html = document.getElementById('data_html');
    var nav = document.getElementById('navigation_container');
    nav.classList.remove("thin");
    html.classList.remove("thin");
}


document.getElementById('fold').addEventListener('click', function (e) {
    nav_fold();
});

document.addEventListener("click", function (evt) {
    let flyoutEl = document.getElementById('fold'),
        targetEl = evt.target; // clicked element      
    do {
        if (targetEl == flyoutEl) {
            // This is a click inside, does nothing, just return.
            return;
        }
        // Go up the DOM
        targetEl = targetEl.parentNode;
    } while (targetEl);
    // This is a click outside.
    nav_open();
});
var data = JSON.parse(localStorage.getItem("dashboard_data"));
document.getElementById("name").textContent = data.name;
document.getElementById("name2").textContent = data.name;
document.getElementById("desig").textContent = data.desig + " ," + data.dep;