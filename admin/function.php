<?php
function get_order_details($id) {
include '../connection/connect.php';
$sql = "SELECT * FROM `dishe` WHERE  d_id = '$id' ";
$query = $db->query($sql);
$set = $query->fetch_assoc();
return $set;
}
?>