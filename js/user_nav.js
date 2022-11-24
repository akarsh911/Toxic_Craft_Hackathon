addEventListener('hashchange', (event) => { });
onhashchange = (event) => {
    console.log(location.hash);
    var target = document.getElementsByTagName("body")[0];
    var chng = document.getElementById("data_html");
    var hash = window.location.hash.substring(1);
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
