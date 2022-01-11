<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
/*Delete code*/
if(isset($_GET['did'])) // Get Id
{
	$did=$_GET['did'];
	$sql="DELETE FROM `tblinvoice` WHERE BillingId='$did'";
	$dbh->query($sql);
	echo "<script>window.alert('Invoice record deleted.');</script>";
	echo "<script>window.location.href='invoices.php'</script>";
}
  	?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Invoice - Client Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include_once('includes/sidebar.php');?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
          <?php include_once('includes/header.php');?>
            <!-- header area end -->
            <!-- page title area start -->
            <?php include_once('includes/pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Invoice Details</h4>
                                <div class="data-tables">
                                    <table  class="table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
												<th>S.NO</th>
                                                <th>Invoice Id</th>
												<th>Company Name</th>
												<th>Contact Name</th> 
												<th>Invoice Date</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
										<?php
$sql="select distinct tblclient.ContactName,tblclient.CompanyName,tblinvoice.BillingId,tblinvoice.PostingDate from  tblclient   
	join tblinvoice on tblclient.ID=tblinvoice.Userid  order by tblinvoice.ID desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;

foreach($results as $row)
{               ?>
									     <tr class="active">
									      <th scope="row"><?php echo htmlentities($cnt);?></th>
									       <td><?php  echo htmlentities($row->BillingId);?></td>
									       <td><?php  echo htmlentities($row->CompanyName);?></td>
									        <td><?php  echo htmlentities($row->ContactName);?></td>
									         <td><?php  echo htmlentities($row->PostingDate);?></td> 
									         
									        <td><a href="view-invoice.php?invoiceid=<?php  echo $row->BillingId;?>">View</a>|<a href="invoices.php?did=<?php echo $row->BillingId; ?>"onclick="return confirm('Do you really want to delete?');">Delete</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;} ?>
									     </tbody> </table> 
								</div>

							</div>
				
						</div>
					<!--//graph-visual-->
					</div>
				</div>
			</div>
		</div>	<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			
	</div>

		<div class="clearfix"></div>		
	</div>
	
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
<?php }  ?>