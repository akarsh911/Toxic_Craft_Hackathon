<?php
function openCon()
{
    $dbhost = "sql113.byethost15.com";
    $dbuser = "b15_33066427";
    $dbpass = "by@Premium#119$911";
    $db = "b15_33066427_smart_patiala";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
function closeCon($conn)
{
    $conn->close();
}