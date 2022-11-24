function login() {
    var chng = document.getElementById("content_holder");
    var target = document.getElementsByTagName("body")[0];
    $.ajax(
        {
            url: '../html/login_set.html',
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
