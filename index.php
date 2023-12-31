<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
include_once 'function.php';//include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="homepage.png">
    <title>Home</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body class="home">
    
        <!--header starts-->
        <?php include 'header.php';?>
        <!-- banner part starts -->
        <section class="hero bg-image" data-image-src="images/img/main.jpeg">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>Choose it & Enjoy your meals! </h1>
                    <h5 class="font-white space-xs">Find desired dishes and meals</h5>
                    <div class="banner-form">
                        <form class="form-inline" method="post" action="food.php">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">I would like to eat....</label>
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control form-control-lg" id="exampleInputAmount" placeholder="I would like to eat...."> </div>
                            </div>
                            <button  type="submit" name="query" class="btn theme-btn btn-lg">Search dishes</button>
                        </form>
                    </div>
                    <!--<div class="steps">
                        <div class="step-item step1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                                <g fill="#FFF">
                                    <path d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z"></path>
                                    <path d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z"></path>
                                </g>
                            </svg>
                            <h4><span>1. </span>Choose Restaurant</h4> </div>-->
                        <!-- end:Step -->
                       <!-- <div class="step-item step2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                                <g fill="#FFF">
                                    <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                            </svg>
                            <h4><span>2. </span>Order Food</h4> </div>-->
                        <!-- end:Step -->
                        <!--<div class="step-item step3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 612.001 612">
                                <path d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" fill="#FFF" /> </svg>
                            <h4><span>3. </span>Get Delivered</h4> </div>--->
                        <!-- end:Step -->
                    <!--</div>-->
                    <!-- end:Steps -->
                </div>
            </div>
            <!--end:Hero inner -->
        </section>
        <!-- banner part ends -->
      
	  
	
        <!-- Popular block starts -->
        <section class="popular">
            <div class="container">
                <div class="title text-xs-center m-b-30">
                    <h2>Popular Dishes of this Week</h2>
                    <p class="lead">We’ve got something for everyone :)</p>
                </div>
                <div class="row">
				
				
				
						<?php 
						// fetch records from database to display popular first 3 dishes from table
						$query_res= mysqli_query($db,"select * from popular"); 
									      while($r=mysqli_fetch_array($query_res))
										  {
													
						                       echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
														<div class="food-item-wrap">
															<div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.get_food_details($r['dish_id'])['img'].'">
																<div class="distance"><i class="fa fa-pin"></i>5 km</div>
																<div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																<div class="review pull-right"><a href="#">198 reviews</a> </div>
															</div>
															<div class="content">
																<h5><a href="#">'.get_food_details($r['dish_id'])['title'].'</a></h5>
																<div class="product-name">'.get_food_details($r['dish_id'])['slogan'].'</div>
																<div class="price-btn-block"> <span class="price">&#8377;'.get_food_details($r['dish_id'])['price'].'</span> <a href="delete.php?action=addcarthome&id='.$r['dish_id'].'" class="btn theme-btn-dash pull-right">Order Now</a> </div>
															</div>
															
														</div>
												</div>';
													
										  }
						
						
						?>
				</div>
            </div>
        </section>
        <!-- Popular block ends -->
        <!-- How it works block starts -->
        <section class="how-it-works">
            <div class="container">
                <div class="text-xs-center">
                    <h2>Easy 3 Steps Order</h2>
                    <!-- 3 block sections starts -->
                    <div class="row how-it-works-solution">
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                            <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="title"
aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
  <title>Restaurant</title>
  <desc>A solid styled icon from Orion Icon Library.</desc>
  <path data-name="layer2"
  d="M63 19c0-4.5-2.6-8-6-8s-6 3.5-6 8 1.6 6.5 4 7.6V51a2 2 0 1 0 4 0V26.6c2.4-1.1 4-4.1 4-7.6zm-52-6a2 2 0 0 0-4 0v6a2 2 0 0 1-2 2v-8a2 2 0 1 0-4 0v38a2 2 0 0 0 4 0V25a6 6 0 0 0 6-6z"
  fill="#fff"></path>
  <path data-name="layer1" d="M30 15a19 19 0 1 0 19 19 19 19 0 0 0-19-19zm8.3 28.9a13 13 0 0 1-21.2-8.7 2 2 0 0 1 4-.4 9 9 0 0 0 14.7 6 2 2 0 1 1 2.6 3.1zm2.7-8a2 2 0 0 1-2-2 9 9 0 0 0-16-5.7 2 2 0 0 1-3.1-2.5A13 13 0 0 1 43 33.9a2 2 0 0 1-2 2z"
  fill="#fff"></path>
</svg>
                                </div>
                                <h3>Choose your favorite dish</h3>
                                <p>We are serving you more than 3000+ popular dish varieties.</p>
                            </div>
                                <!--<div class="step step-1">
                                    <div class="icon" data-step="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                                            <g fill="#FFF">
                                                <path d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z" />
                                                <path d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z" /> </g>
                                        </svg>
                                    </div>
                                    <h3>Choose a restaurant</h3>
                                    <p>We got you covered with more than 600+ popular delivery restaurants.</p>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                            <div class="step step-2">
                                <div class="icon" data-step="2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="title"
aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
  <title>Wallet</title>
  <desc>A solid styled icon from Orion Icon Library.</desc>
  <path data-name="layer2"
  d="M58.4 4.6h-.1l-1.3.2L23 18a5.2 5.2 0 0 0-3 5v34c0 1.7 1 3.9 4 2.6L59 46a5.4 5.4 0 0 0 3-5V7c0-1.3-1.8-2.4-3.6-2.4zM32 40.2a4 4 0 1 1 4-4 4 4 0 0 1-4 4z"
  fill="#fff"></path>
  <path data-name="layer1" d="M10 14a2 2 0 0 1 2-2h15.4L48 4H5a3 3 0 0 0-3 3v36a3 3 0 0 0 3 3h11V28h-4a2 2 0 1 1 0-4h4v-1a9.4 9.4 0 0 1 2.9-7H12a2 2 0 0 1-2-2z"
  fill="#fff"></path>
</svg>
                                </div>
                                <h3>Payment</h3>
                                <p>We are using patym payment gateway so you are safe with us.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                            <div class="step step-3">
                                <div class="icon" data-step="3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" aria-labelledby="title"
aria-describedby="desc" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
  <title>Gastronomy</title>
  <desc>A solid styled icon from Orion Icon Library.</desc>
  <path data-name="layer2"
  d="M10 40H2a1 1 0 0 0-1 1v18a1 1 0 0 0 .8 1l8 2h.2l.6-.2a1 1 0 0 0 .4-.8V41a1 1 0 0 0-1-1zm51-11H11a2 2 0 0 0 0 4h2l.7 1.4a4.2 4.2 0 0 0 3.5 2.6h37.6a3.7 3.7 0 0 0 3.5-2.6L59 33h2a2 2 0 0 0 0-4z"
  fill="#fff"></path>
  <path data-name="layer1" d="M39.8 7.3a4 4 0 1 0-7.5 0A22 22 0 0 0 14.4 25h43.2A22 22 0 0 0 39.8 7.3zM53.4 53H27.8a2 2 0 0 1 0-4h8.5c-3.6-6-19.5-6-21.3-6v14a39.2 39.2 0 0 0 10.6 2h28.8c3.6 0 2.7-3.2 1.9-4a10.4 10.4 0 0 0-2.9-2z"
  fill="#fff"></path>
</svg>
                                </div>
                                <h3>Get your order</h3>
                                <p>Get your food delivered within 15 mins and enjoy your meal..!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 block sections ends -->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="pay-info">Pay by UPI, Net Banking, Debit Card, Credit Card</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- How it works block ends -->
        <!-- Featured restaurants starts -->
       <!-- <section class="featured-restaurants">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="title-block pull-left">
                            <h4>Featured Restaurants</h4> </div>
                    </div>
                    <div class="col-sm-8">-->
                        <!-- restaurants filter nav starts -->
                        <!--<div class="restaurants-filter pull-right">
                            <nav class="primary pull-left">
                                <ul>
                                    <li><a href="#" class="selected" data-filter="*">all</a> </li>
<?php 
/* display categories here
$res= mysqli_query($db,"select * from food_category");
while($row=mysqli_fetch_array($res))
{
echo '<li><a href="#" data-filter=".'.$row['name'].'"> '.$row['name'].'</a> </li>';
}*/
?>
</ul>
                            </nav>
                        </div>-->
                        <!-- restaurants filter nav ends -->
                   <!-- </div>
                </div>-->
                <!-- restaurants listing starts -->
               <!-- <div class="row">
<div class="restaurant-listing">
<?php /*  //fetching records from table and filter using html data-filter tag
$ress= mysqli_query($db,"select * from dishe");  
while($rows=mysqli_fetch_array($ress))
{
// fetch records from food_category table according to catgory ID
$query= mysqli_query($db,"select * from food_category where id='".$rows['id']."' ");
$rowss=mysqli_fetch_array($query);
echo ' <div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all '.$rowss['name'].'">
<div class="restaurant-wrap">
<div class="row">
<div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
<a class="restaurant-logo" href="" > <img src="admin/Res_img/dishes'.$rows['img'].'" alt="Restaurant logo"> </a>
</div>
<!--end:col -->
<div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
<h5><a href="" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
<div class="bottom-part">
<div class="cost"><i class="fa fa-check"></i> Min &#8377; 100</div>
<div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
<div class="ratings"> <span>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star-o"></i>
</span> (153) </div>
</div>
</div>
<!-- end:col -->
</div>
<!-- end:row -->
</div>
<!--end:Restaurant wrap -->
</div>';
}*/
?>
</div>
                </div>-->
                <!-- restaurants listing ends -->
               
            </div>
        </section>
        <!-- Featured restaurants ends -->
      <?php include 'app_section.php';?>
        <!-- start: FOOTER -->
        <?php include 'footer.php'; ?>
        <!-- end:Footer -->
    
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