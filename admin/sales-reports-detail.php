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
    <title>Sales Reports Details - Client Management System</title>
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
                                        <h3 class="inner-tittle two">Sales Reports </h3>
						<div class="graph">
							<div class="tables">
								 <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
<h4 align="center" class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
<hr />
								<table class="table" border="1"> <thead> <tr>  
									<th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="select month(PostingDate) as lmonth,year(PostingDate) as lyear,sum(ServicePrice) as totalprice from  tblinvoice join tblservices on tblservices.ID= tblinvoice.ServiceId where date(tblinvoice.PostingDate) between '$fdate' and '$tdate' group by lmonth,lyear";
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
									       
									       <td><?php  echo  $row->lmonth."/".$row->lyear;?></td>
									       <td><?php  echo "Rs.".$total=$row->totalprice;?></td>
									        
									     </tr>
									     <?php
									     $ftotal+=$total;
									      $cnt=$cnt+1;}} ?>
									      <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo "Rs.".$ftotal;?></td>
   
                 
                 
                </tr>
									     </tbody> </table>
									     <?php } else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
 ?>
 <h4 align="center" class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
    <h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
    <hr /> 
    <table class="table" border="1"> <thead> <tr>  
									<th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="select year(PostingDate) as lyear,sum(ServicePrice) as totalprice from  tblinvoice join tblservices on tblservices.ID= tblinvoice.ServiceId where date(tblinvoice.PostingDate) between '$fdate' and '$tdate' group by lyear";
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
									       
									       <td><?php  echo  $row->lyear;?></td>
									       <td><?php  echo "Rs.".$total=$row->totalprice;?></td>
									        
									     </tr>
									     <?php
									     $ftotal+=$total;
									      $cnt=$cnt+1;}} }?>
									      <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo "Rs.".$ftotal;?></td>
   
                 
                 
                </tr>
									     </tbody> </table>
							</div>

								</div>
				
									</div>
					<!--//graph-visual-->
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