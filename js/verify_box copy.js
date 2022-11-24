var data = sessionStorage.getItem("type");
if (data != "" && data != null) {
    data = JSON.parse(data);
    if (data.val == "email_verify") {
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
}
