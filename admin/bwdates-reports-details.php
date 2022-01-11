<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Between Report Details - Client Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
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
          
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="inner-tittle two">Between dates reports </h2>
						
							
								<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h7 align="right" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h7>
								<div class="data-tables">
                <table class="table text-center">
                                        <thead class="bg-light text-capitalize">
								 <thead> <tr> <th>S.NO</th> 
									<th>Invoice Id</th>
									<th>Company Name</th>
									 <th>Contact Name</th> 
									 <th>Invoice Date</th>
									 <th>Action</th>
									  </tr>
									   </thead>
									   </thead>
									    <tbody>
									    	<?php
$sql="select distinct tblclient.ContactName,tblclient.CompanyName,tblinvoice.BillingId,tblinvoice.PostingDate from  tblclient   
	join tblinvoice on tblclient.ID=tblinvoice.Userid  where date(tblinvoice.PostingDate) between '$fdate' and '$tdate'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									     <tr class="active">
									      <th scope="row"><?php echo htmlentities($cnt);?></th>
									       <td><?php  echo htmlentities($row->BillingId);?></td>
									       <td><?php  echo htmlentities($row->CompanyName);?></td>
									        <td><?php  echo htmlentities($row->ContactName);?></td>
									         <td><?php  echo htmlentities($row->PostingDate);?></td> 
									         
									        <td><a href="view-invoice.php?invoiceid=<?php  echo $row->BillingId;?>">View</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody>  </table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
<?php }  ?>