<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
include("function.php");
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						
														mysqli_query($db,$SQL);
														
														$success = "Thankyou! Your Order Placed Successfully!";

														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="checkout.png">
    <title>Order Checkout</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
    
    <div class="site-wrapper">
        <!--header starts-->
        <!--header starts-->
        <?php include 'header.php';?>
        <!-- banner part starts -->
        <div class="page-wrapper">
            <!--<div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick your favourite dishes</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Get delivered & Pay</a></li>
                    </ul>
                </div>
            </div>-->
			
                <div class="container">
                    <br>
                 
					   <span style="color:green;">
								<?php echo $_SESSION['success']  ?>
										</span>
                                        <span style="color:red;">
								<?php echo $_SESSION['error']  ?>
										</span>
					
                </div>
            <?php unset($_SESSION['success']);
            unset($_SESSION['error']);?>
			
			
				  
            <div class="container m-t-30">
			<form action="delete.php?action=checkout&id=<?php echo $_SESSION['user_id'] ; ?>" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="add.php">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                            <?php
$item_total = 0;
$sub_total = 0;
$u = $_SESSION['user_id'];
$qry1 = $db->query("SELECT * from `cart` where user_id = $u");
foreach ($qry1 as $item)  // fetch items define current into session ID
{
?><tr>
<td><?php echo get_food_details($item["product_id"])['title']; ?></td>
<td>&#8377;<?php echo get_food_details($item["product_id"])['price']; ?></td>
<td><?php echo $item['quantity']; ?></td>
<?php $item_total = get_food_details($item["product_id"])['price'] * $item['quantity']; ?>
<?php $sub_total +=$item_total; ?>
<td> &#8377;<?php echo $item_total; ?></td>
</tr>
					
<?php }?>
<input type="hidden" name="total" value="<?php echo $sub_total; ?>">
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> &#8377;<?php echo $sub_total; ?></td>
                                                    </tr>
                                                  
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> &#8377;<?php echo $sub_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on delivery</span>
                                                    <br> <span>Pay digitally with SMS Pay Link. Cash may not be accepted in COVID restricted areas.</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" checked value="credit" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Credit Card<img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio"  value="debit" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Debit Card<img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <?php if($item > 0){?>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                   <?php }?>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
                 <p class="text-xs-center" > <button  onclick="location.href='food.php'" class="btn btn-outline-primary btn-block" >Back</button></p>
                </div>
             <!-- Featured restaurants ends -->
      <?php include 'app_section.php';?>
        <!-- start: FOOTER -->
        <?php include 'footer.php'; ?>
        <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
         </div>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>
