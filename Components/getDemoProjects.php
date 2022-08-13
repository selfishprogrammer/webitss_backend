<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$data = mysqli_query($conn, "select * from `demo_projects`");
$nums_of_record = mysqli_num_rows($data);

if ($nums_of_record > 0) {
    $row = mysqli_fetch_all($data, MYSQLI_ASSOC);
    $msg = array('data' => 'Success!', 'status' => 'true', 'records' => $row);
    echo json_encode($msg);
} else {
    $msg = array('data' => 'Failed!', 'status' => 'false');
    echo json_encode($msg);
}
