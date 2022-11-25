<?php
header('P3P: CP="CAO PSA OUR"');
if (isset($_GET["req"])) {
    $req = $_GET["req"];
    if ($req == "app_dashboard") {
        include('../html/emp_dashboard.html');
    }
    if ($req == "app_analytics") {
        require_once("emp_analytics.php");
    }
}