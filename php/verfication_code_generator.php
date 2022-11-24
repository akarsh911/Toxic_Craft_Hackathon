<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/php/database_connect.php");
function create_code($email)
{
    $val = get_current_active($email);
    echo "<script>alert(.$val.);</script>";
    if ($val == false) {
        destroy_all($email);
        $current_date = date('Y-m-d H:i:s');
        $code = rand(100000, 999999);
        $conn = openCon();
        $sql = "INSERT INTO city_verification_email (email,code,date_created) VALUES ('$email','$code','$current_date')";
        if ($conn->query($sql) === TRUE) {
            return 0;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
        //TODO:Send Mail
    } else {
        //TODO:Resend Mail
        $code = $val;
        return 0;
    }
}
function destroy_all($email)
{
    $conn = openCon();
    $sql = "DELETE FROM city_verification_email  WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        return;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
function check_time($time1, $time2)
{
    $time1 = date_create($time1);
    $time2 = date_create($time2);
    $difference = date_diff($time1, $time2);
    $minutes = $difference->days * 24 * 60;
    $minutes += $difference->h * 60;
    $minutes += $difference->i;
    if ($minutes <= 5) {
        return true;
    } else
        return false;
}
function verify_code($code, $email)
{
    $conn = openCon();
    $current_date = date('Y-m-d H:i:s');
    $sql = "SELECT status,date_created FROM `city_verification_email` WHERE email='$email' AND code='$code';";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (check_time($row["date_created"], $current_date)) {
                if ($row["status"] == 0) {
                    destroy_all($email);
                    verified($email);
                    return 1;
                } else {
                    return 3;
                }
            } else
                return 3;
        }
    } else {
        return 2;
    }
}
function get_current_active($email)
{
    $conn = openCon();
    $current_date = date('Y-m-d H:i:s');
    $sql = "SELECT date_created,code FROM `city_verification_email` WHERE email='$email' AND status='0';";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (check_time($row["date_created"], $current_date)) {
                return $row["code"];
            } else
                return false;
        }
    } else {
        return false;
    }
}
function verified($email)
{
    $conn = openCon();
    $sql = "UPDATE city_users SET email_verify='1' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        return;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}