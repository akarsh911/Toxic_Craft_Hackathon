<script>
function setcookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000); // ) removed
        var expires = "; expires=" + date.toGMTString(); // + added
    } else
        var expires = "";
    document.cookie = name + "=" + value + expires + ";path=/"; // + and " added
}
</script>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/create_edit_user.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/login_logout_user.php');
$username = trim($_POST["username"], '\'"');
$password = trim($_POST["password"], '\'"');
$username = get_email($username);
$resp = login($username, $password);
if ($resp == "nf") {
    $err = array();
    $err["val"] = "Invalid Credentials";
    echo "<script> sessionStorage.setItem('err', `" . json_encode($err, JSON_PRETTY_PRINT) . "`);</script>";
    echo '<script>window.onload = (event) => {location.replace("../login")};</script>';
} else {
    if (check_email_verify($username) == 0) {
        session_start();
        $_SESSION["email"] = $username;

        $err = array();
        $err["val"] = "email_verify";
        echo "<script> sessionStorage.setItem('type', `" . json_encode($err, JSON_PRETTY_PRINT) . "`);</script>";
        echo "<script> sessionStorage.setItem('email', `" . $username . "`);</script>";
        echo '<script>window.onload = (event) => {location.replace("../verify")};</script>';
    } else {
        $id = gen_uuid();
        if (logout($username) == 1) {
            logout($username);
            logged_in($resp, $username, $id);
            require_once('../php/user_dashboard_data.php');
            echo "<script> localStorage.setItem('dashboard_data', `" . create_json_data($username) . "`);</script>";
            echo "<script>setcookie('key','" . $id . "', 15)</script>";
            echo '<script>window.onload = (event) => {location.replace("../dashboard")};</script>';
        }
    }
}
function gen_uuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
} ?>