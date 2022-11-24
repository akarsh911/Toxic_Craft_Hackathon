<?php

if (isset($_COOKIE['key']) &&  $_COOKIE["key"] != "undefined" && $_COOKIE["key"]  != null) {
    $key = $_COOKIE["key"];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/php/login_logout_user.php");
    unset($_COOKIE['key']);
    setcookie('key', '', time() - 3600, '/');
    echo "<script> sessionStorage.clear();</script>";
    echo '<script>window.onload = (event) => {location.replace("../login")};</script>';
}
else{
    echo "<script> sessionStorage.clear();</script>";
    echo '<script>window.onload = (event) => {location.replace("../login")};</script>';
}