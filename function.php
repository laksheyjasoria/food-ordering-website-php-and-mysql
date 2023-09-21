<?php 
function get_food_details($id) {
include 'connection/connect.php';
$sql = "SELECT * FROM dishe where d_id = $id";
$query = $db->query($sql);
$set = $query->fetch_assoc();
return $set;
}
?>