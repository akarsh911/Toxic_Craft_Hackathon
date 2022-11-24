
var data = JSON.parse(localStorage.getItem("dashboard_data"));
document.getElementById("name").innerHTML = data.name;
document.getElementById("email").textContent = data.email;
document.getElementById("ph_no").textContent = data.ph_no;
document.getElementById("desig").textContent = data.desig;
document.getElementById("dep").textContent = data.dep;
document.addEventListener('DOMContentLoaded', function () {
    alert("Ready!");
}, false);
document.addEventListener('readystatechange', () => {
    if (document.readyState == 'complete') codeAddress();
});