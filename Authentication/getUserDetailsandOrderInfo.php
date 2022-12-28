<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$email = $object['email'];
$users = mysqli_query($conn, "select * from `users` where `email`='$email'");
$nums = mysqli_num_rows($users);
if ($nums > 0) {
    $row = mysqli_fetch_assoc($users);
    $getOrderDetailsOfUser = mysqli_query($conn, "select * from `orders` where `email`='$email'");
    $numsUser = mysqli_num_rows($getOrderDetailsOfUser);
    if ($numsUser > 0) {
        $Userrow = mysqli_fetch_assoc($getOrderDetailsOfUser);
    }
    $msg = array('data' => 'Successfully fetched Response!', 'status' => 'true', 'count' => $nums, 'records' => $row, 'orderDetails' => $Userrow);
    echo json_encode($msg);
} else {
    $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => null);
    echo json_encode($msg);
}
