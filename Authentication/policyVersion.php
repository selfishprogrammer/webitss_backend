<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin:*');
$json = file_get_contents("php://input");
$object = json_decode($json, true);

$user_id = $object['user_id'];
$policy_version = $object['policy_version'];

$update_policy_version = mysqli_query($conn, "update `users` set `policy_version`='$policy_version' where `user_id`='$user_id'");
if ($update_policy_version) {
    $msg = array('data' => 'Policy Versions Updated', 'status' => 'true');
    echo json_encode($msg);
} else {
    $msg = array('data' => 'Something went wrong !', 'status' => 'false');
    echo json_encode($msg);
}
