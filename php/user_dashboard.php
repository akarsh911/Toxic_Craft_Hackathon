<?php
header('P3P: CP="CAO PSA OUR"');
if (isset($_GET["req"])) {
    $req = $_GET["req"];
    if ($req == "app_dashboard") {
        virtual('../html/user_dashboard.html');
    } else if ($req == "app_complaints") {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        require_once('../php/complaint_register.php');
        complaints_user(get_log_in($_COOKIE["key"]));
        virtual('../html/user_complaints.html');
    } else if ($req == "app_profile") {
        include('../html/profile.html');
    } else if ($req == "app_notification") {
        include('../html/complaintcards.html');
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
    } else if ($req == "app_user_garbage_menu") {
        include('../html/user_garbage.html');
    } else if ($req == "app_queries") {
        include('../html/about_us.html');
    } else if ($req == "app_user_street_lamp_complaint") {

        session_start();
        echo "Electrical Department- Damaged Street Lamp";
        $_SESSION["dep"] = "Electrical";
        $_SESSION["cat"] = "Street Lamp";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_house_power_supply_complaint") {
        session_start();
        echo "Electrical Department-House Power Supply";
        $_SESSION["dep"] = "Electrical";
        $_SESSION["cat"] = "House Power Supply";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_elec_meter_complaint") {
        session_start();
        echo "Electrical Department-Electrical Meter Complaint";
        $_SESSION["dep"] = "Electrical";
        $_SESSION["cat"] = "Elec Meter Complaint";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_fire_complaint") {
        session_start();
        echo "Emergency Services-Fire";
        $_SESSION["dep"] = "Emergency Services";
        $_SESSION["cat"] = "Fire";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_medical_complaint") {
        session_start();
        echo "Emergency Services- Medical";
        $_SESSION["dep"] = "Emergency Services";
        $_SESSION["cat"] = "Medical";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_police_complaint") {

        session_start();
        echo "Emergency Services- Police";
        $_SESSION["dep"] = "Emergency Services";
        $_SESSION["cat"] = "Police";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_meter_issues_complaint") {
        session_start();
        echo "Gas Services- Meter Issues";
        $_SESSION["dep"] = "Gas";
        $_SESSION["cat"] = "Meter Issues";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_leakage_complaint") {
        session_start();
        echo "Gas Services- Leakage";
        $_SESSION["dep"] = "Gas";
        $_SESSION["cat"] = "Leakage";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_new_gas_complaint") {
        session_start();
        echo "Gas Services-New Gas";
        $_SESSION["dep"] = "Gas";
        $_SESSION["cat"] = "New Gas";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_road_maintain_complaint") {
        session_start();
        echo "Road-Road Maintain ";
        $_SESSION["dep"] = "Road";
        $_SESSION["cat"] = "Road Maintain";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_potholes_complaint") {
        session_start();
        echo "Road- Potholes";
        $_SESSION["dep"] = "Road";
        $_SESSION["cat"] = "Potholes";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_new_connection_complaint") {
        session_start();
        echo "Sewage- New Connection";
        $_SESSION["dep"] = "Sewage";
        $_SESSION["cat"] = "New Connection";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_maintenance_complaint") {
        session_start();
        echo "Sewage-Maintenance";
        $_SESSION["dep"] = "Sewage";
        $_SESSION["cat"] = "Maintenance";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_new_water_connection_complaint") {
        session_start();
        echo "Water - New Water Connection";
        $_SESSION["dep"] = "Water";
        $_SESSION["cat"] = "New Water Connection";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_water_connection_maintenance_complaint") {
        session_start();
        echo "Water -Water Connection Maintenance";
        $_SESSION["dep"] = "Water";
        $_SESSION["cat"] = "Water Connection Maintenance";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_litter_complaint") {
        session_start();
        echo "Garbage-litter";
        $_SESSION["dep"] = "Garbage";
        $_SESSION["cat"] = "litter";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_garbage_pickup_complaint") {
        session_start();
        echo "Garbage-garbage pickup";
        $_SESSION["dep"] = "Garbage";
        $_SESSION["cat"] = "garbage pickup";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_pest_complaint") {
        session_start();
        echo "Pest";
        $_SESSION["dep"] = "Pest";
        $_SESSION["cat"] = "Comp";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_stray_complaint") {
        session_start();
        echo "Stray";
        $_SESSION["dep"] = "Stray";
        $_SESSION["cat"] = "Comp";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    } else if ($req == "app_user_general_complaint") {
        session_start();
        echo "General Complaint";
        $_SESSION["dep"] = "General Complaint";
        $_SESSION["cat"] = "Comp";
        require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
        $_SERVER["user_id"] = get_log_in($_COOKIE["key"]);
        include('../html/complaint_form.html');
        echo "<script src='../js/change_comp.js'></script>";
        echo "<script>caller('" . get_log_in($_COOKIE["key"]) . "','" . $_SESSION["dep"] . "','" . $_SESSION["cat"] . "');</script>";
    }
}