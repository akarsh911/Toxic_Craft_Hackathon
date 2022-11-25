<?php
require_once('../php/script_check_login.php');
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
            <link href="../css/profile.css" rel="stylesheet" />
            <script src="../js/profile.js"></script>
            <div class="container">
                <div class="avatar-flip">
                    <img src="https://e7.pngegg.com/pngimages/136/22/png-clipart-user-profile-computer-icons-girl-customer-avatar-angle-heroes-thumbnail.png"
                        height="150" width="150">
                    <img src="https://png.pngtree.com/png-vector/20190425/ourmid/pngtree-camera-icon-vector-illustration-in-line-style-for-any-purpose-png-image_989668.jpg"
                        height="150" width="150">
                </div>
                <h2><span id="name">Sarthak Srivastava</span></h2>
                <h4><span id="email">9988220704</span></h4>
                <ul><b>
                        <li class="row">Phone-number: <span id="ph_no">9161828551</span></li>
                        <li class="row">Designation: <span id="desig">Citizen</span></li>
                        <li class="row">Department: <span id="dep">Patiala</span></li>
                    </b>
                </ul>
            </div>
            <script src="../js/profile.js"></script>
        </div>
    </div>
    </div>
    <script src="../js/dashboard.js"></script>
</body>

</html>