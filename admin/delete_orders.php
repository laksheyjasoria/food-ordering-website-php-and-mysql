<?php
include("../connection/connect.php");
error_reporting(0);
session_start();


// sending query
if(mysqli_query($db,"DELETE FROM order2 WHERE O_id = '".$_GET['order_del']."'")){
 mysqli_query($db,"DELETE FROM order1 WHERE orderNo = '".$_GET['order_del']."'");
 header("location:allorders.php");  
}


?>
