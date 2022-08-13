<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$status = $object['status'];
$order_id = $object['order_id'];

$update_status = mysqli_query($conn, "update `orders` set `status`='$status' where `order_id`='$order_id'");
if ($update_devs) {
    $msg = array('data' => 'Developer Updated!', 'status' => 'true');
    echo json_encode($msg);
} else {
    $msg = array('data' => 'Something went wrong !', 'status' => 'false');
    echo json_encode($msg);
}
