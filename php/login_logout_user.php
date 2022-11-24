<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/database_connect.php');
function logged_in($f_name, $email, $sesson_id)
{
    $conn = openCon();
    $ip = get_client_ip();
    $sql = "INSERT INTO logged_in (f_name,email,session_key,ip,state) VALUES ('$f_name','$email','$sesson_id','$ip','0')";
    if ($conn->query($sql) === TRUE) {
        return 1;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
function logout($email)
{
    $conn = openCon();
    $sql = "UPDATE logged_in  SET state='1' WHERE email='$email' OR session_key='$email'";
    if ($conn->query($sql) === TRUE) {
        return "1";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function check_log_in($key)
{
    $conn = openCon();
    $ip = get_client_ip();
    $sql = "SELECT state FROM `logged_in` WHERE session_key='$key' AND ip='$ip';";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["state"] == 0)
                return 1;
            else
                return 0;
        }
    } else {
        return 0;
    }
}

function get_log_in($key)
{
    $conn = openCon();
    $ip = get_client_ip();
    $sql = "SELECT state , email FROM `logged_in` WHERE session_key='$key' AND ip='$ip';";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["state"] == 0)
                return $row["email"];
            else
                return 0;
        }
    } else {
        return 0;
    }
}

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}