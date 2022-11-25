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
                    include("../html/admin_nav.html");
                else if ($ds == 2)
                    include("../html/emp_nav.html"); ?>
            </div>
        </div>

        <div class="data_html" id="data_html"></div>
    </div>
    </div>
    <script src="../js/dashboard.js"></script>
</body>

</html>