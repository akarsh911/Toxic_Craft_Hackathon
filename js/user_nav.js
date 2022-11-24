addEventListener('hashchange', (event) => { });
onhashchange = (event) => {
    console.log(location.hash);
    var target = document.getElementsByTagName("body")[0];
    var chng = document.getElementById("data_html");
    var hash = window.location.hash.substring(1);
    if(hash == "user_street_lamp_complaint" || hash == "user_house_power_supply_complaint" || hash == "user_elec_meter_complaint" || hash == "user_new_water_connection_complaint" || hash == "user_water_connection_maintenance_complaint" || hash == "user_pest_complaint" || hash == "user_stray_complaint" || hash == "user_new_connection_complaint" || hash == "user_maintenance_complaint" || hash == "user_road_maintain_complaint" || hash == "user_pothole_complaint" || hash == "user_fire_complaint" || hash == "user_medical_complaint" || hash == "user_police_complaint" || hash == "user_meter_issues_complaint" || hash == "user_leakage_complaint" || hash == "user_new_gas_complaint" || hash == "user_general_complaint")
    $.ajax(
        {
            url: '../php/user_dashboard.php?req=app_' + hash,
            dataType: "html",
            success: function (data) {
                chng.innerHTML = data;
                var scripts = chng.getElementsByTagName("script");
                console.log(scripts);
                for (var i = 0; i < scripts.length; i++) {
                    var newScript = document.createElement("script");
                    newScript.src = scripts[i].src;
                    target.appendChild(newScript);
                }

            },
            error: function (e) {
                alert('Error: ' + e);
            }
        });
};
window.addEventListener("load", (event) => {
    var target = document.getElementsByTagName("body")[0];
    var chng = document.getElementById("data_html");
    var hash = window.location.hash.substring(1);
    if (hash == "")
        hash = "dashboard";
    $.ajax(
        {
            url: '../php/user_dashboard.php?req=app_' + hash,
            dataType: "html",
            success: function (data) {
                chng.innerHTML = data;
                var scripts = chng.getElementsByTagName("script");
                console.log(scripts);
                for (var i = 0; i < scripts.length; i++) {
                    var newScript = document.createElement("script");
                    newScript.src = scripts[i].src;
                    target.appendChild(newScript);
                }

            },
            error: function (e) {
                alert('Error: ' + e);
            }
        });
});
