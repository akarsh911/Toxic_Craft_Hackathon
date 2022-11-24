<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/database_connect.php');
function create_json_data($user_mail)
{
    $arr=array();
    $arr["name"]=get_name($user_mail);
    $arr["ph_no"]=get_ph_no($user_mail);
    $arr["email"]=$user_mail;
    if(get_dashboard_type($user_mail)==0)
    {
        
    }
    else{
        $arr["desig"]=get_designation($user_mail);
        $arr["dep"] = get_designation($user_mail);
    }
}
function get_name($user_mail)
{
    $conn = openCon();
    $ip = get_client_ip();
    $sql = "SELECT f_name,l_name,dashboard_type,ph_no FROM `city_users` WHERE email='$user_mail'";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["state"] == 0)
                return $row["f_name"] . " " . $row["l_name"];
            else
                return 0;
        }
    } else {
        return 0;
    }
}
function get_ph_no($user_mail)
{
    $conn = openCon();
    $ip = get_client_ip();
    $sql = "SELECT f_name,l_name,dashboard_type,ph_no FROM `city_users` WHERE email='$user_mail'";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["state"] == 0)
                return $row["ph_no"];
            else
                return 0;
        }
    } else {
        return 0;
    }
}
function get_dashboard_type($user_mail)
{
    $conn = openCon();
    $ip = get_client_ip();
    $sql = "SELECT f_name,l_name,dashboard_type,ph_no FROM `city_users` WHERE email='$user_mail'";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["state"] == 0)
                return $row["dashboard_type"];
            else
                return 0;
        }
    } else {
        return 0;
    }
}