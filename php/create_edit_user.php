<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/php/database_connect.php");
function create_user($email, $f_name, $l_name, $ph_no, $psw_hash)
{
    $conn = openCon();
    $sql = "INSERT INTO city_users (f_name,l_name,email,ph_no,psw_hash,user_state,dashboard_type,email_verify) VALUES ('$f_name','$l_name','$email','$ph_no','$psw_hash','user','0','1')";
    if ($conn->query($sql) === TRUE) {
        return 1;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
function find_user($email)
{
    $conn = openCon();
    $sql = "SELECT f_name FROM city_users WHERE email='$email' || ph_no='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return 1;
        }
    } else {
        return 0;
    }
}

function get_email($email)
{
    $conn = openCon();
    $sql = "SELECT email FROM city_users WHERE email='$email' || ph_no='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $row['email'];
        }
    } else {
        return 0;
    }
}

function login($email, $psw_hash)
{
    $conn = openCon();
    $sql = "SELECT f_name FROM city_users WHERE (email='$email' || ph_no='$email') && psw_hash='$psw_hash'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $row["f_name"];
        }
    } else {
        return 0;
    }
}

function check_email_verify($email)
{
    $conn = openCon();
    $sql = "SELECT email_verify FROM city_users WHERE email='$email' || ph_no='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            return $row['email_verify'];
        }
    } else {
        return 0;
    }
}
function register_employee($email, $f_name, $l_name, $ph_no, $psw_hash, $emp_dep, $emp_type, $emp_designation)
{
    $emp_code = generate_eid($ph_no, $emp_dep, $emp_type);
    $conn = openCon();
    $sql = "INSERT INTO city_users (f_name,l_name,email,ph_no,psw_hash,user_state,dashboard_type,email_verify,emp_code) VALUES ('$f_name','$l_name','$email','$ph_no','$psw_hash','employee','1','0','$emp_code')";
    if ($conn->query($sql) === TRUE) {

        $sql2 = "INSERT INTO city_officials (f_name,l_name,email,ph_no,emp_designation,emp_department,emp_type,assigned_job,emp_code) VALUES ('$f_name','$l_name','$email','$ph_no','$emp_designation','$emp_dep','$emp_type','0','$emp_code')";
        if ($conn->query($sql2) === TRUE) {


            return 1;
        } else {
            return "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
function generate_eid($ph_no, $emp_dep, $emp_type)
{
    $comp = get_last_emp_id();
    $id    = strtoupper(substr($emp_dep, 0, 3)) . $emp_type . substr($ph_no, 0, 3) . ($comp++);
    return $id;
}
function get_last_emp_id()
{
    $conn = openCon();
    $sql = "SELECT s_no FROM city_officials";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ro = $row['s_no'];
        }
        return $ro;
    } else {
        return 0;
    }
}