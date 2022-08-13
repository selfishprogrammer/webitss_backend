<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$user_id = $object['user_id'];

$fetch_user_info = mysqli_query($conn, "select * from `orders` where `email`='$user_id'");
if (mysqli_num_rows($fetch_user_info) > 0) {
    $row = mysqli_fetch_all($fetch_user_info, MYSQLI_ASSOC);
    $msg = array('data' => 'Success!', 'status' => 'true', 'records' => $row);
    echo json_encode($msg);
} else {
    $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
    echo json_encode($msg);
}
