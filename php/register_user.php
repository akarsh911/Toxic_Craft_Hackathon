<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/create_edit_user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/verification_credentials.php');
$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST["email"];
$psw = $_POST["psw"];
$c_psw = $_POST["c_psw"];
$ph_no = $_POST["ph_no"];
$err = 0;
$vals = array();
$f_name_json = array();
$f_name_json["val"] = $f_name;
$f_name_json["err"] = check_name($f_name);
$vals["f_name"] = $f_name_json;
if (check_name($f_name) != 1) {
    $err++;
}

$l_name_json = array();
$l_name_json["val"] = $l_name;
$l_name_json["err"] = check_name($l_name);
$vals["l_name"] = $l_name_json;
if (check_name($l_name) != 1) {
    $err++;
}
$email_json = array();
$email_json["val"] = $email;
$email_json["err"] = check_mail($email);
$vals["email"] = $email_json;
if (check_mail($email) != 1) {
    $err++;
}
$psw_json = array();
$psw_json["val"] = $psw;
$psw_json["err"] = check_psw($psw);
$vals["psw"] = $psw_json;
if (check_psw($psw) != 1) {
    $err++;
}
$c_psw_json = array();
$c_psw_json["val"] = $c_psw;
$c_psw_json["err"] = check_c_psw($psw, $c_psw);
$vals["c_psw"] = $c_psw_json;
if (check_c_psw($psw, $c_psw) != 1) {
    $err++;
}
$ph_no_json = array();
$ph_no_json["val"] = $ph_no;
$ph_no_json["err"] = check_ph_no($ph_no);
$vals["ph_no"] = $ph_no_json;
if (check_ph_no($ph_no) != 1) {
    $err++;
}




if (find_user($email) == 1) {
    $vals["used_email"] = true;
    $err++;
} else {
    $vals["used_email"] = false;
}

if (find_user($ph_no) == 1) {
    $vals["used_ph_no"] = true;
    $err++;
} else {
    $vals["used_ph_no"] = false;
}


if ($err == 0) {

    $resp = "";
    if ($resp = create_user($email, $f_name, $l_name, $ph_no, $psw) == 1) {
        echo '<script>alert("id created login now!");</script>';
        echo '<script>window.onload = (event) => {location.replace("../login")};</script>';
        //TODO: redirect to login page with message

    } else {
        echo $resp;
    }
} else {
    echo "<script> sessionStorage.setItem('err_data', `" . json_encode($vals, JSON_PRETTY_PRINT) . "`);</script>";
    echo '<script>window.onload = (event) => {location.replace("../register")};</script>';
}