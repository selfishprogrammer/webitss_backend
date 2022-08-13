<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin:*');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$user_id = $object['user_id'];
$get_policy_version_of_user = mysqli_query($conn, "select * from `users` where `user_id`='$user_id'");
if ($get_policy_version_of_user) {
    $row = mysqli_fetch_assoc($get_policy_version_of_user);
    $get_actual_policy_version = mysqli_query($conn, "select * from `master_configuration`");
    if ($get_actual_policy_version) {
        $row2 = mysqli_fetch_assoc($get_actual_policy_version);
        $msg = array('data' => 'Policy Versions Retrived', 'status' => 'true', 'versionAccepted' => $row['policy_version'], 'currentPolicyVersion' => $row2['current_policy_version']);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'Something went wrong !', 'status' => 'false');
        echo json_encode($msg);
    }
} else {
    $msg = array('data' => 'Something went wrong !', 'status' => 'false');
    echo json_encode($msg);
}
