<?php
header('P3P: CP="CAO PSA OUR"');
session_start();
$user_id = $_GET["user_id"];
$dep = $_GET["dep"];
$cat = $_GET["cat"];
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