<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$name = $object['name'];
$email = $object['email'];
$phone = $object['phone'];
$queries = $object['queries'];


$insert_data = mysqli_query($conn, "insert into `contactus` (`name`,`email`,`phone`,`queries`) values ('$name','$email','$phone','$queries')");
if ($insert_data) {
    $msg = array('data' => 'Successfully Submitted !', 'status' => 'true');
    echo json_encode($msg);
} else {
    $msg = array('data' => 'Something Went Wrong !', 'status' => 'false');
    echo json_encode($msg);
}
