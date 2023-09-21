<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
include_once 'function.php';
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="images/foodpicky.png">
    <title>FoodPicky - Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
       <!-- header header  -->
       <?php include_once 'header.php';?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include_once 'left_sidebar.php';?>
       
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
           
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
            <?php
echo $_SESSION['error'];
unset($_SESSION['error']);
        echo $_SESSION['success'];
        unset($_SESSION['success']); ?>
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Popular Dishes</h4>
                               <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">+ Add Dish</button>
                                								
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
<th>Category</th>
                                                <th>Dish Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>
												  
                                            </tr>
                                        </thead>
                                      <!--  <tfoot>
                                            <tr>
                                               <th>Category</th>
                                                <th>Dish Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>
                                            </tr>
                                        </tfoot>-->
                                        <tbody>
<?php
$sql="SELECT * FROM popular order by id desc";
$query=mysqli_query($db,$sql);
if(!mysqli_num_rows($query) > 0 )
{
echo '<td colspan="11"><center>No Dish-Data!</center></td>';
}
else
{				
while($rows=mysqli_fetch_array($query))
{
$mql="select * from food_category where id='".get_order_details($rows['dish_id'])['Category']."'";
$newquery=mysqli_query($db,$mql);
$fetch=mysqli_fetch_array($newquery);
echo '<tr><td>'.$fetch['name'].'</td>
<td>'.get_order_details($rows['dish_id'])['title'].'</td>
<td>'.get_order_details($rows['dish_id'])['slogan'].'</td>
<td>&#8377; '.get_order_details($rows['dish_id'])['price'].'</td>
<td><div class="col-md-3 col-lg-8 m-b-10">
<center><img src="Res_img/dishes/'.get_order_details($rows['dish_id'])['img'].'" class="img-responsive  radius" style="max-height:180px;max-width:200px;" /></center>
</div></td>
<td><center><a href="add.php?action=delpop&menu_del='.$rows['dish_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> </center>
<!--<a href="update_menu.php?menu_upd='.get_order_details($rows['dish_id'])['d_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
</td></tr>-->';
}	
}
?>
</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="float:left;">Add Popular</h4>
          <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
          
        </div>
        <form action="add.php?action=addpopular" method="post">
        <div class="modal-body">
          <!--<p>Some text in the modal.</p>-->
          <select class="btn btn-info btn-lg" name="pop" style="overflow-x:hidden;">
            <option value="">--Select Popular Dish--</option>
            <?php 
            $sql="SELECT * FROM dishe order by d_id desc";
            $query=mysqli_query($db,$sql);
            while($row=mysqli_fetch_array($query))
{
           echo' <option value='.$row['d_id'].'>'.$row['title'].'</option>';
}?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" name="addpopular" class="btn btn-success" >Submit</button>
          <a role="button" class="btn btn-default"  href="all_popular.php" >Close</a>
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
</form>
      </div>
      
    </div>
  </div>

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2022 All rights reserved. Made with &#x1F49C; by <b><a href="https://www.youtube.com/channel/UC4_6-VSWBw_QHMyjrDDEvVQ"> GPW</a></b> Team. </footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>