<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$status = $object['status'];
if ($status === "") {
    $orders = mysqli_query($conn, "select * from `orders`");
    $nums = mysqli_num_rows($orders);
    if ($nums > 0) {
        $row = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
        echo json_encode($msg);
    }
} else if ($status === "completed") {
    $orders = mysqli_query($conn, "select * from `orders` where `status`='$status'");
    $nums = mysqli_num_rows($orders);
    if ($nums > 0) {
        $row = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
        echo json_encode($msg);
    }
} else if ($status === "rejected") {
    $orders = mysqli_query($conn, "select * from `orders` where `status`='$status'");
    $nums = mysqli_num_rows($orders);
    if ($nums > 0) {
        $row = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
        echo json_encode($msg);
    }
} else if ($status === "received") {
    $orders = mysqli_query($conn, "select * from `orders` where `status`='$status'");
    $nums = mysqli_num_rows($orders);
    if ($nums > 0) {
        $row = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
        echo json_encode($msg);
    }
} else if ($status === "inprogress") {
    $orders = mysqli_query($conn, "select * from `orders` where `status`='$status'");
    $nums = mysqli_num_rows($orders);
    if ($nums > 0) {
        $row = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
        echo json_encode($msg);
    }
} else if ($status === "reviewing") {
    $orders = mysqli_query($conn, "select * from `orders` where `status`='$status'");
    $nums = mysqli_num_rows($orders);
    if ($nums > 0) {
        $row = mysqli_fetch_all($orders, MYSQLI_ASSOC);
        $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
        echo json_encode($msg);
    }
}
