<?php
$type = $_GET["type"];

if ($type == "login" || $type == "Login") {
    require_once('./php/script_check_login.php');
    if (check_login()) {
        header("Location: /dashboard");
        exit();
    } else {
        virtual('./html/template.html');
        virtual('./html/login_set.html');
    }
} else if ($type == "dashboard" || $type == "Dashboard") {
    virtual('./html/dashboard.html');
} else if ($type == "register") {
    virtual('./html/template.html');
    virtual('./html/onboard.html');
} else if ($type == "verify") {
    if (refer("/php/login_user.php") || refer("/php/verify_email.php")) {
        virtual('./html/template.html');
        virtual('./html/verify_box.html');
    } else {
        header('HTTP/1.0 403 Forbidden');
        virtual('./html/template.html');
        virtual('./html/403.html');
        die();
    }
} else if ($type == "verify_error") {
    if (refer("/php/verify_email.php")) {
        virtual('./html/template.html');
        virtual('./html/verification_failed.html');
    } else {
        header('HTTP/1.0 403 Forbidden');
        virtual('./html/template.html');
        virtual('./html/403.html');
        die();
    }
} else if ($type == "verify_success") {
    if (refer("/php/verify_email.php")) {
        virtual('./html/template.html');
        virtual('./html/verification_success.html');
    } else {
        header('HTTP/1.0 403 Forbidden');
        virtual('./html/template.html');
        virtual('./html/403.html');

        die();
    }
} else {
    //  header('HTTP/1.0 403 Forbidden');
    virtual('./html/template.html');
    virtual('./html/home_page 2.html');
    //  virtual('./html/404.html');
    //  die();
}
function refer($url)
{
    $re_url = get_link() . $url;
    if (isset($_SERVER['HTTP_REFERER'])) {
        if ($_SERVER['HTTP_REFERER'] != "undefined" && $_SERVER['HTTP_REFERER'] != null && $_SERVER['HTTP_REFERER'] == $re_url)
            return true;
        else
            return false;
    } else
        return false;
}
function get_link()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    // Append the host(domain name, ip) to the URL.   
    $url .= $_SERVER['HTTP_HOST'];
    return $url;
}