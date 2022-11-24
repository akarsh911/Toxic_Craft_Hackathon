function ping() {
    var chng = document.getElementById("box1");
    var target = document.getElementsByTagName("body")[0];
    var chng = document.getElementById("box1");
    $.ajax(
        {
            url: '../php/verify_email.php',
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

}

document.getElementById("email").innerText = sessionStorage.getItem("email");
var data = sessionStorage.getItem("type");
data = JSON.parse(data);
if (data != null && data != "" && data.err != "" && data.err != null) {
    document.getElementById("input_box").classList.remove("refill");
    document.getElementById("input_box").classList.add("refill");
    document.getElementById("verify_error").style.visibility = "visible";
    document.getElementById("verify_error").innerHTML = data.err;
}