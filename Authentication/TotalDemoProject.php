<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);

$demo_projects = mysqli_query($conn, "select * from `demo_projects`");
$nums = mysqli_num_rows($demo_projects);
if ($nums > 0) {
    $row = mysqli_fetch_all($demo_projects, MYSQLI_ASSOC);
    $msg = array('data' => 'Success!', 'status' => 'true', 'count' => $nums, 'records' => $row);
    echo json_encode($msg);
} else {
    $msg = array('data' => 'No record found !', 'status' => 'false', 'record' => []);
    echo json_encode($msg);
}
