<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);

$name = $object['name'];
$phone = $object['phone'];
$email = $object['email'];
$password = $object['password'];
$devRole = $object['devRole'];



$devs_details = mysqli_query($conn, "insert into `developers` (`name`,`email`,`phone`,`password`,`devRole`,`devStatus`,`accountStatus`) values 
('$name','$email','$phone','$password','$devRole','Free','active')");
if ($devs_details) {
    $msg = array('data' => 'Developers Added Successfullly', 'status' => 'true');
    echo json_encode($msg);
} else {
    echo  mysqli_error($conn);
    $msg = array('data' => 'Something went wrong !', 'status' => 'false');
    echo json_encode($msg);
}
