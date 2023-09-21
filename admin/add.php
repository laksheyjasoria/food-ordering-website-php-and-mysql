<?php
session_start();
include '../connection/connect.php';
$back = header('Location:'. $_SERVER['HTTP_REFERER']);
switch ($_GET['action']) {
  case 'addadmin':
    #echo "hi0";
    if(empty($_POST['uname']) || empty($_POST['email'])|| empty($_POST['password'])){
     
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>All fields Required!</strong>
    </div>';
   echo $back;
    }
    else{
     # echo "hi1";
    $check_username= mysqli_query($db, "SELECT username FROM admin where username = '".$_POST['uname']."' ");
    $check_email = mysqli_query($db, "SELECT email FROM admin where email = '".$_POST['email']."' ");
    
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
     # echo "hi2";
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>invalid email!</strong>
    </div>';
   echo $back;
    }
    elseif(strlen($_POST['password']) < 6)
    {
     # echo "hi3";
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Password must be >= 6!!!</strong>
    </div>';
   echo $back;
    }
    elseif(mysqli_num_rows($check_username) > 0)
    {
     # echo "hi4";
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Username already exists!</strong>
    </div>';
   echo $back;
    }
    elseif(mysqli_num_rows($check_email) > 0)
    {
     # echo "hi5";
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Email already exists!</strong>
    </div>';
   echo $back;
    }
    else{
     # echo "hi6";
    $mql = "INSERT INTO admin(username,email,password) VALUES('".$_POST['uname']."','".$_POST['email']."','".md5($_POST['password'])."')";
    mysqli_query($db, $mql);
    $_SESSION['success'] = '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Congrats!</strong> New Admin Added Successfully.</br></div>';
   echo $back;
    }
    }
    break;

    case 'addpopular':
      if(isset($_POST['addpopular'])){
        if($_POST['pop']!=null){
        $sql="SELECT count(id) as maxm FROM popular";
        $query=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($query);
        $max = $row['maxm'];
        $check_max= mysqli_query($db, "SELECT * FROM popular");
        if(mysqli_num_rows($check_max) >2 ){
        $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>ERROR!</strong> Maximum popular reached.</br></div>';
       echo $back;
       #echo "hi";
        }else{
          #$id = $_POST['pop'];
          #$sql0="SELECT * FROM popular WHERE dish_id = '".$_POST['pop']."'";
          $check_popular= mysqli_query($db, "SELECT * FROM popular WHERE dish_id = ".$_POST['pop']."");
        if(mysqli_num_rows($check_popular) >0 ){
          #echo "hi";
            $_SESSION['error']='<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>ERROR!</strong> This Dish is already added to popular</br></div>';
           echo $back;
          }else{
          
        $sql="INSERT INTO `popular`(`dish_id`) VALUES(".$_POST['pop'].")";
          $query=mysqli_query($db,$sql);
          if($query > 0){
            #echo "hi";
        $_SESSION['success'] = '<div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Congrats!</strong> Dish is Added to popular Successfully.</br></div>';
       echo $back;
          }}
        }
        }else{
          #echo "hi";
        $_SESSION['error']='<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>ERROR!</strong> No Dish is selected Please select</br></div>';
       echo $back;
        }
        
        }else{
          #echo "hi";
        $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>ERROR!</strong> You have not click on submit .</br></div>';
       echo $back;
        }
      break;  

      case 'addmenu':

        
    if(empty($_POST['d_name'])||empty($_POST['about'])||$_POST['price']==''||$_POST['res_name']=='')
		{	
											$_SESSION['error'] = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
                             echo $back;
		}
	else
		{
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
								$store = "Res_img/dishes/".basename($fnew);                      // the path to store the upload image
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=1000000)
										{
												$_SESSION['error'] = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Max Image Size is 1024kb!</strong> Try different Image.
															</div>';
                             echo $back;
										}
									else
										{
                        $sql = "INSERT INTO dishe(Category,title,slogan,price,img) VALUE('".$_POST['res_name']."','".$_POST['d_name']."','".$_POST['about']."','".$_POST['price']."','".$fnew."')";  // store the submited data ino the database :images
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Congrats!</strong> New Dish Added Successfully.
															</div>';
                             echo $back;
										}
					}
					elseif($extension == '')
					{
						$_SESSION['error'] = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>select image</strong>
															</div>';
                             echo $back;
					}
					else{
					
											$_SESSION['error'] = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid extension!</strong>png, jpg, Gif are accepted.
															</div>';
                             echo $back;
						}               
	   }

        break;

        case 'adduser':
          
          if(isset($_POST['submit'] ))
{
    if(empty($_POST['uname']) ||
   	    empty($_POST['fname'])|| 
		empty($_POST['lname']) ||  
		empty($_POST['email'])||
		empty($_POST['password'])||
		empty($_POST['phone']) ||
		empty($_POST['address']))
		{
			$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Required!</strong>
															</div>';
                             echo $back;
		}
	else
	{
		
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['uname']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
    {
       	$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid email!</strong>
															</div>';
                             echo $back;
    }
	elseif(strlen($_POST['password']) < 6)
	{
		$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Password must be >=6!</strong>
															</div>';
                             echo $back;
	}
	
	elseif(strlen($_POST['phone']) < 10)
	{
		$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid phone!</strong>
															</div>';
                             echo $back;
	}
	elseif(mysqli_num_rows($check_username) > 0)
     {
    	$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Username already exists!</strong>
															</div>';
                             echo $back;
     }
	elseif(mysqli_num_rows($check_email) > 0)
     {
    	$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Email already exists!</strong>
															</div>';
                             echo $back;
     }
	else{
       
	
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['uname']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);
  $_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Congrats!</strong> New User Added Successfully.</br></div>';
                               echo $back;
    }
	}

}

          break;
          case 'deluser':
            if(mysqli_query($db,"DELETE FROM users WHERE u_id = '".$_GET['user_del']."'")){
              $_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Congrats!</strong> User Deleted Successfully.</br></div>';
            }else{
              $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Something Went Wrong!</strong>
            </div>';
            }

             echo $back;  
            break;

            case 'delcat':
              
              if(mysqli_query($db,"DELETE FROM food_category WHERE id = '".$_GET['cat_del']."'")){
                $_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Congrats!</strong> Category Deleted Successfully.</br></div>';
              }else{
                $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Something Went Wrong!</strong>
              </div>';
              }
              break;
case 'delmenu':
  if(mysqli_query($db,"DELETE FROM dishe WHERE d_id = '".$_GET['menu_del']."'")){
    $_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Congrats!</strong> Dish is Removed Successfully.</br></div>';
  }else{
    $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Something Went Wrong!</strong>
  </div>';
  }
  break;

  case 'delord':
    if(mysqli_query($db,"DELETE FROM order2 WHERE O_id = '".$_GET['order_del']."'")){
      mysqli_query($db,"DELETE FROM order1 WHERE orderNo = '".$_GET['order_del']."'");
      $_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Congrats!</strong> Dish is Removed Successfully.</br></div>';
    }else{
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Something Went Wrong!</strong>
    </div>';
    }
    break;

  case 'delpop':
    if(mysqli_query($db,"DELETE FROM popular WHERE dish_id = '".$_GET['menu_del']."'")){
      $_SESSION['success'] = 	'<div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Congrats!</strong> Dish is Removed Successfully from popular.</br></div>';
    }else{
      $_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Something Went Wrong!</strong>
    </div>';
    }
    break;
  default:
   
    break;
}

/*
if(isset($_POST['addpopular'])){
if($_POST['pop']!=null){
$sql="SELECT max(id) as maxm FROM popular";
$query=mysqli_query($db,$sql);
$row=mysqli_fetch_array($query);
$max = $row['maxm'];
if($max==3){
$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>ERROR!</strong> Maximum popular reached.</br></div>';
header('Location:'. $_SERVER['HTTP_REFERER']);
}else{
  $id = $_POST['pop'];
  $sql0="SELECT * FROM popular WHERE dish_id = $id";
  $query0=mysqli_query($db,$sql0);
  if($query0 > 0){
    $_SESSION['error']='<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>ERROR!</strong> This Dish is already added to popular</br></div>';
   echo $back;
  }else{
  
$sql="INSERT INTO popular values(0,'$id')";
  $query=mysqli_query($db,$sql);
  if($query > 0){
$_SESSION['success'] = '<div class="alert alert-success alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Congrats!</strong> Dish is Added to popular Successfully.</br></div>';
header('Location:'. $_SERVER['HTTP_REFERER']);
  }}
}
}else{
$_SESSION['error']='<div class="alert alert-danger alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>ERROR!</strong> No Dish is selected Please select</br></div>';
header('Location:'. $_SERVER['HTTP_REFERER']);
}

}else{
$_SESSION['error'] = '<div class="alert alert-danger alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>ERROR!</strong> You have not click on submit .</br></div>';
header('Location:'. $_SERVER['HTTP_REFERER']);
}*/
?>