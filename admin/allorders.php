<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>	</script>
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Menu</h3> </div>
                
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        
                       
                      
                       
						
						
						     <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Orders</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
								
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
<th>#</th>
                                                <th>Order No</th>
                                               <th>User</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                               <th>Action</th>
												  
                                            </tr>
                                        </thead>
                                        <!--<tfoot>
                                            <tr>
											 <th>Restaurant Name</th>
                                                <th>Dish Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>
                                            </tr>
                                        </tfoot>-->
                                        <tbody>
<?php
$f = 0;
$sql="SELECT users.username,users.u_id, order2.* FROM users JOIN order2 ON users.u_id=order2.user_id ";
$query=mysqli_query($db,$sql);
if(!mysqli_num_rows($query) > 0 )
{
echo '<td colspan="11"><center>No Orders Yet!</center></td>';
}
else
{				
while($rows=mysqli_fetch_array($query))
{
$f++;
echo '<tr><td>'.$f.'</td>
<td>'.$rows['O_id'].'</td>
<td>'.$rows['username'].'</td>
<td>&#8377; '.$rows['Total'].'</td>
<td>'.$rows['dt'].'</td>';?>
<?php 
$status=$rows['O_status'];
if($status=="0" or $status=="NULL")
{
?>
<td> <button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true"> Dispatch</button></td>
<?php 
}
if($status=="in process")
{ ?>
<td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On the Way!</button></td> 
<?php
}
if($status=="closed")
{
?>
<td> <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"> Delivered</button></td> 
<?php 
} 
?>
<?php
if($status=="rejected")
{
?>
<td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button></td> 
<?php 
} 
?>
<td>
<a href="delete_orders.php?order_del=<?php echo $rows['O_id'];?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
<a href="view_order.php?user_upd=<?php echo $rows['O_id'];?>" class="btn btn-primary btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-eye" style="font-size:16px"></i></a> 
<a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['O_id']);?>');" title="Update order"><button type="button" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></button></a>

<?php /*
echo '
<a href="#myModal" data-bs-toggle="modal" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
</td></tr>';*/
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
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2022 All rights reserved. Made with &#x1F49C; by <b><a href="https://www.youtube.com/channel/UC4_6-VSWBw_QHMyjrDDEvVQ"> GPW</a></b> Team. </footer>
            <!-- End footer -->
        </div>

     <!-- Modal -->
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
    <div class="modal fade" id="edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Other Images of Product</h4>
              </div>
              <div class="modal-body">
       
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="addimg.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
              <input type="number" name="ied" value="" id="ei" hidden>
                <div class="form-group">
                  <label for="exampleInputFile">Photo 1 : </label>
                  <input type="file" name="i1" id="exampleInputFile">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputFile">Photo 2 : </label>
                  <input type="file" name="i2" id="exampleInputFile">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputFile">Photo 3 : </label>
                  <input type="file" name="i3" id="exampleInputFile">
                  </div>
                  <div class="form-group">
                  <label for="exampleInputFile">Photo 4 : </label>
                  <input type="file" name="i4" id="exampleInputFile">
                  </div>
               
              </div>
              <!-- /.box-body -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="psubmit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 

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