<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/php/database_connect.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/php/notification_mails.php");

function new_complaint($dep, $cat, $user_id, $title, $descrip, $resource_url, $xcord, $ycord)
{
    $comp_no = gen_comp_id($dep, $cat);
    $conn = openCon();
    $assigned_id = get_employee_code_min($dep, 0);
    $supervisor_id = get_employee_code_min($dep, 1);
    $current_date = date("Y-m-d h:i:sa");
    $sql = "INSERT INTO city_complaints (comp_id,user_id,department,category,title,descrip,assigned_id,supervisor_id,complaint_date,resource_url,complaint_state,x_cord,y_cord) VALUES ('$comp_no','$user_id','$dep','$cat','$title','$descrip','$assigned_id','$supervisor_id','$current_date','$resource_url','started','$xcord','$ycord')";
    if ($conn->query($sql) === TRUE) {
        assign_job($supervisor_id, 1, $comp_no);
        assign_job($assigned_id, 0, $comp_no);
        return true;
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    closeCon($conn);
}
function gen_comp_id($dep, $cat)
{
    $comp = get_last_complaint_s_no();
    $comp_number = strtoupper(substr($dep, 0, 2) . substr($cat, 0, 3)) . ($comp++);
    return $comp_number;
}
function get_last_complaint_s_no()
{
    $conn = openCon();
    $sql = "SELECT s_no FROM `city_complaints`;";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        $row = 0;
        while ($row = $result->fetch_assoc()) {
        }
        return $row["s_no"];
    } else {
        return 0;
    }
    closeCon($conn);
}
function get_employee_code_min($dep, $type)
{
    $min = 9999;
    $min_code = 0;
    $conn = openCon();
    $sql = "SELECT emp_code,assigned_jobs FROM `city_officials` WHERE emp_department='$dep' AND  emp_type='$type' ;";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $emp_code = $row["emp_code"];
            $job = $row["assigned_jobs"];
            if ($job <= $min) {
                $min = $job;
                $min_code = $emp_code;
            }
        }
        return $min_code;
    } else {
        return 0;
    }
    closeCon($conn);
}
function get_employee_jobs($emp_code)
{

    $conn = openCon();
    $sql = "SELECT assigned_jobs FROM `city_officials` WHERE emp_code='$emp_code';";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        }
        return $row["assigned_jobs"];
    } else {
        return 0;
    }
    closeCon($conn);
}
function assign_job($emp_code, $emp_type, $comp_id)
{
    $job = get_employee_jobs($emp_code) + 1;
    $conn = openCon();
    $sql = "UPDATE city_officials  SET assigned_jobs='$job' WHERE emp_code='$emp_code'";
    if ($conn->query($sql) === TRUE) {
        if ($emp_type == 0) {
            notify_employee();
        } else {
            notify_supervisor();
        }

        return "1";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    closeCon($conn);
}
function employe_complaint_update($comp_id, $emp_code, $emp_remark, $status, $emp_resc_url)
{
    $conn = openCon();
    $sql = "UPDATE city_complaints  SET remark='$emp_remark',remark_url='$emp_resc_url',complaint_state='$status' WHERE emp_code='$emp_code' AND comp_id='$comp_id' ";
    if ($conn->query($sql) === TRUE) {
        notify_complaint_update_supervisor($comp_id);
        notify_complaint_update_user($comp_id);

        return "1";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    closeCon($conn);
}
function user_satisfaction_status($comp_id, $user_rating)
{
    $conn = openCon();
    if ($user_rating == 404) {
        $complaint_state = "Reopen";
        $comp = true;
    } else {
        $complaint_state = "Closed";
        $comp = false;
    }
    $sql = "UPDATE city_complaints  SET user_feedback='$user_rating',complaint_state='$complaint_state' WHERE  comp_id='$comp_id' ";
    if ($conn->query($sql) === TRUE) {
        //to be worked upon
        // notify_complaint_update_supervisor($comp_id);
        //  notify_complaint_update_user($comp_id);
        if ($comp) {
            reopen_complaint($comp_id);
            //call reopen 
        } else {
            //reduce complaint

        }
        return "1";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    closeCon($conn);
}
function reopen_complaint($comp_id)
{
}
function close_complaint($comp_id)
{
    $conn = openCon();
    $sql = "SELECT supervisor_id,assigned_id FROM `city_complaints` WHERE comp_id='$comp_id' ;";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            unassign_complaint($row["supervisor_id"], 1);
            unassign_complaint($row["assigned_id"], 0);
        }
    } else {
        return 0;
    }
    closeCon($conn);
}

function unassign_complaint($emp_code, $emp_type)
{
    $job = get_employee_jobs($emp_code) - 1;

    $conn = openCon();
    $sql = "UPDATE city_officials SET assigned_jobs='$job' WHERE emp_code='$emp_code'";
    if ($conn->query($sql) === TRUE) {
        //notify_complaint_update_supervisor($comp_id);
        // notify_complaint_update_user($comp_id);
        if ($emp_type == 0) {
        } else {
        }
        return "1";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
    closeCon($conn);
}
function complaints_user($user_id)
{

    $conn = openCon();
    $sql = "SELECT department,category,title,x-cord,y-cord,descrip,assigned_id,complaint_date,resource_url,remarks,remark_url,supervisor_remark,user_feedback FROM `city_complaints` WHERE user_id='$user_id' ;";
    $result = $conn->query($sql);
    if (!$result) {
        echo ("Error description: " . $conn->error);
    }
    $all_comps = array();
    $count = 0;
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $count++;
            $all_comps[$count] = $row;
        }
        $myJSON = json_encode($all_comps);
        echo "<script> sessionStorage.setItem('err_data', `" . json_encode($myJSON, JSON_PRETTY_PRINT) . "`);</script>";
        echo '<script>window.onload = (event) => {location.replace("../html/onboard.html")};</script>';
    } else {
        return 0;
    }
    closeCon($conn);
}