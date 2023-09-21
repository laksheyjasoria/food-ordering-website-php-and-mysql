<?php
session_start();
include '../connection/connect.php';
if(!isset($_SESSION["adm_id"]) || trim($_SESSION["adm_id"]) == ''){
header('location: index.php');
}
$sql = "SELECT * FROM admin WHERE adm_id = '".$_SESSION["adm_id"]."'";
$query = $db->query($sql);
$user = $query->fetch_assoc();
?>