<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin:*');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$name = $object['name'];
$email = $object['email'];
$phone = $object['phone'];
$password = $object['password'];
$categories = $object['categories'];

$duplicate_email = mysqli_query($conn, "select * from `users` where `email`='$email'");
$nums_of_record = mysqli_num_rows($duplicate_email);
if ($nums_of_record > 0) {
    $msg = array('data' => 'Email Already Exists', 'status' => 'false');
    echo json_encode($msg);
} else {
    $insert_data = mysqli_query($conn, "insert into `users` (`name`,`email`,`phone`,`password`,`categories`) values ('$name','$email','$phone','$password','$categories')");
    if ($insert_data) {
        $msg = array('data' => 'Successfully Registered !', 'status' => 'true');
        echo json_encode($msg);
    } else {
        $msg = array('data' => 'Something Went Wrong !', 'status' => 'false');
        echo json_encode($msg);
    }
}
