<?php
$ref = $_GET["ref"];
$i = $_GET["i"];
require("../php/complaint_register.php");
employe_ok_comp($ref, $i);
echo '<script>window.onload = (event) => {location.replace("../complaints")};</script>';