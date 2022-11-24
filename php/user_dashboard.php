<?php
if (isset($_GET["req"])) {
    $req = $_GET["req"];
    if ($req == "app_dashboard") {
        echo "hi";
        virtual('../html/user_dashboard.html');
    } else if ($req == "app_complaints") {
    } else if ($req == "app_notifications") {
    } else if ($req == "app_user_elec_menu") {
        include('../html/user_electrical_department.html');
    } else if ($req == "app_user_water_menu") {
        include('../html/user_water_department.html');
    } else if ($req == "app_user_sewage_menu") {
        include('../html/user_sewage_department.html');
    } else if ($req == "app_user_road_menu") {
        include('../html/user_road_department.html');
    } else if ($req == "app_user_gas_menu") {
        include('../html/user_gas_department.html');
    } else if ($req == "app_user_emergency_menu") {
        include('../html/user_emergency_services.html');
    } else if ($req == "app_queries") {
        include('../html/about_us.html');
    } else if ($req == "app_user_street_lamp_complaint") {

        session_start();
        $_SESSION["dep"] = "Electrical";
        $_SESSION["cat"] = "Street Lamp";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
    } else if ($req == "app_user_house_power_supply_complaint") {
    } else if ($req == "app_user_elec_meter_complaint") {
    } else if ($req == "app_user_fire_complaint") {
    } else if ($req == "app_user_medical_complaint") {
    } else if ($req == "app_user_police_complaint") {
    } else if ($req == "app_user_meter_issues_complaint") {
    } else if ($req == "app_user_leakage_complaint") {
    } else if ($req == "app_user_road_maintain_complaint") {
    } else if ($req == "app_user_potholes_complaint") {
    } else if ($req == "app_user_new_connection_complaint") {
    } else if ($req == "app_user_maintenance_complaint") {
    } else if ($req == "app_user_new_water_connection_complaint") {
    } else if ($req == "app_user_water_connection_maintenance_complaint") {
    }
}