<?php
$user_id = $_SESSSION["user_id"];
$dep = $_SESSSION["dep"];
$cat = $_SESSSION["cat"];
$title = $_POST["title"];
$desc = $_POST["description"];
$file = $_POST["file"];
$lat = $_POST["lat"];
$long = $_POST["long"];
require_once("../php/complaint_register.php");
if (new_complaint($dep, $cat, $user_id, $title, $desc, $file, $lat, $long) == true) {
    echo "success";
} else {
    echo "fail";
}