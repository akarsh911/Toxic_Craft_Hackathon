<?php
session_start();

if (isset($_SESSION["email"])) {
    if (!isset($_SESSION["tried"])) {
        $_SESSION["tried"] = 3;
    }
    require_once($_SERVER['DOCUMENT_ROOT'] . "/php/verfication_code_generator.php");

    if (isset($_POST["code"]) && isset($_SESSION["email"])) {
        $resp = verify_code($_POST["code"], $_SESSION["email"]);
        echo $resp;
        if ($resp == 1) {
            session_destroy();
            echo "<script> sessionStorage.clear();</script>";
            echo '<script>window.onload = (event) => {location.replace("../verify_success")};</script>';
        } else if ($resp == 2 && $_SESSION["tried"] > 1) {
            $_SESSION["tried"]--;
            $err = array();
            $err["val"] = "email_verify";
            $err["err"] = "Incorrect Verification Code <br>" . $_SESSION["tried"] . " attempt(s) remain";
            echo "<script> sessionStorage.setItem('type', `" . json_encode($err, JSON_PRETTY_PRINT) . "`);</script>";
            echo '<script>window.onload = (event) => {location.replace("../verify")};</script>';
        } else if ($_SESSION["tried"] > 1 && $resp == 3) {
            destroy_all($_SESSION["email"]);
            $err = array();
            $err["val"] = "expired";
            echo "<script> sessionStorage.setItem('type', `" . json_encode($err, JSON_PRETTY_PRINT) . "`);</script>";
            echo '<script>window.onload = (event) => {location.replace("../verify")};</script>';
            session_destroy();
        } else {
            session_destroy();
            echo "expired";
            echo "<script> sessionStorage.clear();</script>";
            echo '<script>window.onload = (event) => {location.replace("../verify_error")};</script>';
        }
    } else {
        virtual("../html/verify_email.html");
        if (create_code($_SESSION["email"]) == 1) {
            session_destroy();
        } else {
        }
    }
} else {

    echo "<script>alert('error retry');</script>";
    session_destroy();
    echo "<script> sessionStorage.clear();</script>";
    echo '<script>window.onload = (event) => {location.replace("../login")};</script>';
}