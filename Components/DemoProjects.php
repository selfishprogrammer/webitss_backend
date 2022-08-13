<?php
require_once('../DB/db.php');
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$object = json_decode($json, true);
$order_id = $object['order_id'];
$categories = $object['categories'];
$name = $object['name'];
$details = $object['details'];
$developer = $object['developer'];
$developer_review = $object['developer_review'];
$client_review = $object['client_review'];
$client = $object['client'];
$image_1 = $object['image_1'];
$image_2 = $object['image_2'];
$image_3 = $object['image_3'];
$image_4 = $object['image_4'];
$status = $object['status'];
$requirement = $object['requirement'];
$rating = $object['rating'];
$costs = $object['costs'];
$date_of_start = $object['date_of_start'];
$date_of_end = $object['date_of_end'];

$demo_projects = mysqli_query($conn, "insert into `demo_projects` (`order_id`,`categories`,`name`,`details`,`developer`,`developer_review`,`client_review`,
`client`,`image_1`,`image_2`,`image_3`,`image_4`,`status`,`requirement`,`rating`,`costs`,`date_of_start`,`date_of_end`)
 values ('$order_id','$categories','$name','$details','$developer','$developer_review','$client_review','$client','$image_1','$image_2','$image_3','$image_4',
 '$status','$requirement','$rating','$costs','$date_of_start','$date_of_end')");

if ($demo_projects) {
   $update_order = mysqli_query($conn, "update `orders` set `rated`='yes' where `order_id`='$order_id'");
   if ($update_order) {
      $msg = array('data' => 'Successfully Registered !', 'status' => 'true');
      echo json_encode($msg);
   } else {
      $msg = array('data' => 'Something went wrong !', 'status' => 'false');
      echo json_encode($msg);
   }
} else {
   $msg = array('data' => 'Something went wrong !', 'status' => 'false');
   echo json_encode($msg);
}
