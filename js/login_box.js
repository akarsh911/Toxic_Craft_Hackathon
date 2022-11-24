var data = sessionStorage.getItem("err");
if (data != "" && data != null) {

    data = JSON.parse(data);
    if (data.val != null && data.val != "") {
        document.getElementById("password_error").innerText = data.val;
        document.getElementById("password_error").style.visibility = "visible";
    }
}
function change_pwd() {
    var chng = document.getElementById("chng");
    var but = document.getElementById("pwd");
    if (but.type == "password") {
        chng.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
        but.type = "text";
    }
    else {
        chng.innerHTML = '<i class="fa fa-eye"></i>';
        but.type = "password";
    }
}
function fg_pwd() { 
    var chng = document.getElementById("content_holder");
    var target = document.getElementsByTagName("body")[0];
    $.ajax(
        {
            url: '../html/forgot_psw.html',
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
