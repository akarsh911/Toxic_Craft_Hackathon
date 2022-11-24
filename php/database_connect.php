<?php

/*function initialize_database()
{
    $conn = openCon();
    $sql = "CREATE TABLE city_users (
s_no INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
f_name VARCHAR(30) NOT NULL,
l_name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
ph_no VARCHAR(10) NOT NULL,
psw_hash VARCHAR(50) NOT NULL,
user_state VARCHAR(50) NOT NULL,
dashboard_type VARCHAR(50) NOT NULL,
photo_url VARCHAR(50) NOT NULL,
email_verify VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }


 
    $sql = "CREATE TABLE city_complaints (
s_no INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
comp_id VARCHAR(30) NOT NULL,
department VARCHAR(30) NOT NULL,
title VARCHAR(50) NOT NULL,
x-cord VARCHAR(50) NOT NULL,
y-cord VARCHAR(50) NOT NULL,
descrip VARCHAR(200) NOT NULL,
assigned_id VARCHAR(50) NOT NULL,
supervisor_id VARCHAR(50) NOT NULL,
complaint_state VARCHAR(50) NOT NULL,
comp_date  VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    closeCon($conn);
}
*/
function openCon()
{
    $dbhost = "localhost";
    $dbuser = "connection";
    $dbpass = "ork9Ld-dB7A3p(6M";
    $db = "smart_patiala";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}
function closeCon($conn)
{
    $conn->close();
}