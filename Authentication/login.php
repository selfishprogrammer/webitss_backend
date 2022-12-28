<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$email = $object['email'];
$password = $object['password'];


$check_login = mysqli_query($conn, "select * from `users` where `email`='$email' and `password`='$password'");
$nums_of_record = mysqli_num_rows($check_login);

if ($nums_of_record > 0) {
    $check_email_verified = mysqli_query($conn, "select * from `users` where `email`='$email' and `emailVerified`='[v]'");
    $nums = mysqli_num_rows($check_email_verified);
    if ($nums > 0) {
        $row = mysqli_fetch_assoc($check_login);
        $msg = array('data' => 'Successfully LoggedIn !', 'status' => 'true',  'details' => $row);
        echo json_encode($msg);
    } else {
        $row = mysqli_fetch_assoc($check_login);
        $msg = array('data' => 'Please verify your email!', 'status' => 'notVerified', 'details' => $row);
        echo json_encode($msg);
    }
} else {
    $msg = array('data' => 'Email Or Password Incorrect! or not Exist', 'status' => 'false');
    echo json_encode($msg);
}
