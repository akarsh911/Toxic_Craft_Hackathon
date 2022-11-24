var data = JSON.parse(localStorage.getItem("dashboard_data"));
document.getElementById("name").innerHTML = data.name;
document.getElementById("email").textContent = data.email;
document.getElementById("desig").textContent = data.desig;
document.getElementById("dep").textContent = data.dep;