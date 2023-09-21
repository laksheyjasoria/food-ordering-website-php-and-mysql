<?php
include 'connection/connect.php';
session_start();
if(isset($_POST['cart'])){
if (isset($_SESSION["user_id"])) {
$uid = $_SESSION['user_id'];
$i = $_POST['id'];
$q = $_POST['quantity'];
$p = $_POST['price'];
$total = $p * $q;
$qry0 = $db->query("SELECT * from `cart` where user_id = '$uid' and product_id = '$i'");
$zzz = $qry0->fetch_assoc();
if($zzz > 0){
$old_q = $zzz['quantity'];
$new_q = $old_q + $q;
$qry1 = $db->query("UPDATE `cart` SET `quantity` = '$new_q' where user_id = '$uid' and product_id = '$i'");
if($qry1 > 0){
$_SESSION['success'] = 'Your Dish is succesfully Added to cart';
header('Location:'. $_SERVER['HTTP_REFERER']);
}else{
$_SESSION['error'] = 'Something went wrong';
header('Location:'. $_SERVER['HTTP_REFERER']);
}
}else{
$qry2 = $db->query("INSERT INTO `cart`(`user_id`, `product_id`, `quantity`, `Total`) VALUES ('$uid','$i','$q','$total')");
if($qry2 > 0){
    $_SESSION['success'] = 'Your Dish is succesfully Added to cart';
    header('Location:'. $_SERVER['HTTP_REFERER']);
}else{
    $_SESSION['error'] = 'Something went wrong';
    header('Location:'. $_SERVER['HTTP_REFERER']);
}
}
}else{
$_SESSION['error'] = 'Please Login first!!!';
 header('Location:'. $_SERVER['HTTP_REFERER']);
}
}
?>