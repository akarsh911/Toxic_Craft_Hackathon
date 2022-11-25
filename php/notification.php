<?php
include_once('../php/script_check_login.php');
if (!check_login()) {
  header("Location: /login");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboard</title>
    <link rel="stylesheet" href="../css/dasboard_style.css" />
    <script src="../js/load_dashboard.js"></script>
</head>

<body>
    <!--#include virtual="../html/dasboard_header.html" -->
    <?php include("../html/dasboard_header.html"); ?>
    <div class="no_head">
        <div class="navigation_container " id="navigation_container">
            <div class="navigation_bar">
                <?php
        require_once("../php/user_dashboard_data.php");
        $user_mail = get_log_in($_COOKIE["key"]);
        $ds = get_dashboard_type($user_mail);
        if ($ds == 0)
          include("../html/user_nav.html");
        else if ($ds == 1)
          include("../html/admin_nav.html"); ?>
            </div>
        </div>

        <div class="data_html" id="data_html">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

            <body>
                <style>
                .totacontainer {
                    padding-left: 50px;
                    padding-top: 30px;
                }
                </style>
                <div class="totacontainer">
                    <div class="w3-card-4" style="width:70%">
                        <header class="w3-container w3-light-grey">
                            <h3>Karan Gulati</h3>
                        </header>
                        <div class="w3-container">
                            <p>1 new Notification</p>
                            <hr>
                            <img src="https://img.favpng.com/17/15/15/computer-icons-vector-graphics-person-portable-network-graphics-clip-art-png-favpng-Mpiqqduizneyba1MwZgLaRGeM.jpg"
                                alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                            <p>I have a problem in electricity,lights are not working ,i am complaining from a month</p>
                            <br>
                        </div>
                        <button class="w3-button w3-block w3-dark-grey">+Register Complaint</button>
                    </div>
                </div>
        </div>
        <div class="totacontainer">
            <div class="w3-card-4" style="width:70%">
                <header class="w3-container w3-light-grey">
                    <h3>Akarsh Srivastava</h3>
                </header>
                <div class="w3-container">
                    <p>1 new complaint</p>
                    <hr>
                    <img src="https://img.favpng.com/17/15/15/computer-icons-vector-graphics-person-portable-network-graphics-clip-art-png-favpng-Mpiqqduizneyba1MwZgLaRGeM.jpg"
                        alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                    <p>I have a problem in electricity,lights are not working ,i am complaining from a month</p><br>
                </div>
                <button class="w3-button w3-block w3-dark-grey">+Register Complaint</button>
            </div>
        </div>
    </div>

    <div class="totacontainer">
        <div class="w3-card-4" style="width:70%">
            <header class="w3-container w3-light-grey">
                <h3>Sarthak</h3>
            </header>
            <div class="w3-container">
                <p>1 new complaint</p>
                <hr>
                <img src="https://img.favpng.com/17/15/15/computer-icons-vector-graphics-person-portable-network-graphics-clip-art-png-favpng-Mpiqqduizneyba1MwZgLaRGeM.jpg"
                    alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <p>I have a problem in electricity,lights are not working ,i am complaining from a month</p><br>
            </div>
            <button class="w3-button w3-block w3-dark-grey">+Register Complaint</button>
        </div>
    </div>
    </div>
    <div class="totacontainer">
        <div class="w3-card-4" style="width:70%">
            <header class="w3-container w3-light-grey">
                <h3>Jay</h3>
            </header>
            <div class="w3-container">
                <p>1 new complaint</p>
                <hr>
                <img src="https://img.favpng.com/17/15/15/computer-icons-vector-graphics-person-portable-network-graphics-clip-art-png-favpng-Mpiqqduizneyba1MwZgLaRGeM.jpg"
                    alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                <p>I have a problem in electricity,lights are not working ,i am complaining from a month</p><br>
            </div>
            <button class="w3-button w3-block w3-dark-grey">+Register Complaint</button>
        </div>
    </div>
    </div>
    </div>
    <script src="../js/dashboard.js"></script>
</body>

</html>