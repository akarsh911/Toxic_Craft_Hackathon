<?php
if (isset($_GET["req"])) {
    $req = $_GET["req"];
    if ($req == "app_dashboard") {
        include('../html/user_dashboard.html');
    } else if ($req == "app_complaints") {
    } else if ($req == "app_notifications") {
    } else if ($req == "app_user_elec_menu") {
        include('../html/user_electrical_department.html');
    } else if ($req == "app_user_water_menu") {
        include('../html/user_electrical_department.html');
    }
}