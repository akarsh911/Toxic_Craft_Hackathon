<?php
if (isset($_GET["user_id"])) {

    $user_id = $_GET["user_id"];
    $dep = $_GET["dep"];
    $cat = $_GET["cat"];
    $title = $_POST["title"];
    $desc = $_POST["description"];
    $file = $_POST["filename"];
    $lat = $_POST["lat"];
    $long = $_POST["lng"];
    require_once("../php/complaint_register.php");
    if (new_complaint($dep, $cat, $user_id, $title, $desc, $file, $lat, $long) == true) {
        echo "success";
    } else {
        echo "fail";
    }
}