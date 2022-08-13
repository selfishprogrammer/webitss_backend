<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);

$name = $object['name'];
$phone = $object['phone'];
$email = $object['email'];
$order = $object['order'];
$orderType = $object['orderType'];
$details_of_order = $object['details_of_order'];
$status = $object['status'];
$developer = $object['developer'];
$price = $object['price'];
$advance_payment = $object['advance_payment'];
$due_payment = $object['due_payment'];
$rated = $object['rated'];


$add_orderDetails = mysqli_query($conn, "insert into `orders` (`name`,`email`,`phone`,`order`,`orderType`,`details_of_order`,
`status`,`developer`,`price`,`advance_payment`,`due_payment`,`rated`) values 
('$name','$email','$phone','$order','$orderType','$details_of_order','$status','$developer','$price','$advance_payment','$due_payment','$rated')");

if ($add_orderDetails) {
    $msg = array('data' => 'Order Accepted Successfully , We will let you know once it get verified by our team  !', 'status' => 'true');
    echo json_encode($msg);
} else {
    $msg = array('data' => 'Something went wrong !', 'status' => 'false');
    echo json_encode($msg);
}
