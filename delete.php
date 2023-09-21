<?php
session_start();
include 'connection/connect.php';
include 'function.php';
if (isset($_GET['id'])) {
$i = $_GET['id'];                                                                                                                                                                                                                                                                                                                                                                                                                                # code...
}

switch ($_GET['action']) {
              case 'r_cart':
$qry1 = $db->query("DELETE FROM cart WHERE cart_Id = '$i'");
if($qry1 > 0){
$_SESSION['success'] = 'Your request is succesfully completed';
header('Location:'. $_SERVER['HTTP_REFERER']);
}else{
$_SESSION['error'] = 'Something went wrong';
header('Location:'. $_SERVER['HTTP_REFERER']);
}
              break;
              case 'checkout':
$count_my_page = ("order.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$order_id= $hits[0];
$tot = $_POST['total'];
$qry1 = $db->query("INSERT INTO `order2`(`O_id`,`user_id`, `Total`) VALUES ('$order_id','$i','$tot')");
if($qry1 > 0){
$qry1 = $db->query("SELECT * from `cart` where user_id = $i");
foreach ($qry1 as $item)  // fetch items define current into session ID
{
$pid = $item['product_id'];
$q = $item['quantity'];
$tot = $item['Total'];
$qry2 = $db->query("INSERT INTO `order1`(`orderNo`, `o_product`, `o_quantity`, `amount`) VALUES ('$order_id','$pid','$q','$tot')");
}
$qry3 = $db->query("DELETE FROM `cart` where user_id = $i");
if($qry3 > 0){
$_SESSION['success'] = 'Thankyou! Your Order Placed Successfully!';
header('Location:'. $_SERVER['HTTP_REFERER']);
}else{
$_SESSION['error'] = 'Something went wrong';
header('Location:'. $_SERVER['HTTP_REFERER']);
}
}else{
$_SESSION['error'] = 'Something went wrong';
header('Location:'. $_SERVER['HTTP_REFERER']);
}
break;

case 'order':
if(mysqli_query($db,"DELETE FROM order2 WHERE O_id = '".$_GET['id']."'")){
#echo "hi";
if(mysqli_query($db,"DELETE FROM order1 WHERE orderNo = '".$_GET['id']."'")){
$_SESSION['success'] = 'Your Order Canceled Successfully!';
header('Location:'. $_SERVER['HTTP_REFERER']);
}else{
$_SESSION['error'] = 'Something went wrong';
header('Location:'. $_SERVER['HTTP_REFERER']);
}
}else{
$_SESSION['error'] = 'Something went wrong';
header('Location:'. $_SERVER['HTTP_REFERER']);
}
break;
case 'addcart':
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

break;
case 'addcarthome':
 if (isset($_SESSION["user_id"])) {
 $uid = $_SESSION['user_id'];
$q=1;
$p = get_food_details($i)['price'];
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
 
break;
default:
break;
}





?>