<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Client Management System || Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="ssets/css/export.css" type="text/css" media="all" />
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
                <!-- sales report area start -->
                <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
$sql6="select  sum(tblservices.ServicePrice) as todaysale
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()";

  $query6 = $dbh -> prepare($sql6);
  $query6->execute();
  $results6=$query6->fetchAll(PDO::FETCH_OBJ);
  foreach($results6 as $row6)
{

$todays_sale=$row6->todaysale;
}


  ?>
                                        <h3 class="header-title mb-0">Today Sales</h3>
                                       <p style="font-size: 20px;color: #844de3"><?php echo $todays_sale;?></p>
                                    </div>
                                </div>
                                <canvas id="coin_sales4" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
$sql7="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;";

  $query7 = $dbh -> prepare($sql7);
  $query7->execute();
  $results7=$query7->fetchAll(PDO::FETCH_OBJ);
  foreach($results7 as $row7)
{

$yest_sale=$row7->totalcost;
}


  ?>
                                        <h4 class="header-title mb-0">Yesterday Sales</h4>
                                        <p style="font-size: 20px;color: #844de3"><?php echo $yest_sale;?></p>
                                    </div>
                                </div>
                                <canvas id="coin_sales5" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
$sql8="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)>=(DATE(NOW()) - INTERVAL 7 DAY);";

  $query8 = $dbh -> prepare($sql8);
  $query8->execute();
  $results8=$query8->fetchAll(PDO::FETCH_OBJ);
  foreach($results8 as $row8)
{

$sevendays_sale=$row8->totalcost;
}


  ?>
                                        <h4 class="header-title mb-0">Last Sevendays Sales</h4>
                                        <p style="font-size: 20px;color: #844de3"><?php echo $sevendays_sale;?></p>
                                    </div>
                                </div>
                                <canvas id="coin_sales6" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php
$sql9="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId";

  $query9 = $dbh -> prepare($sql9);
  $query9->execute();
  $results9=$query9->fetchAll(PDO::FETCH_OBJ);
  foreach($results9 as $row9)
{

$total_sale=$row9->totalcost;
}


  ?>
                                        <h4 class="header-title mb-0">Total Sales</h4>
                                        <p style="font-size: 20px;color: #844de3"><?php echo $total_sale;?></p>
                                    </div>
                                </div>
                                <canvas id="coin_sales7" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="sales-report-area sales-style-two">
                    <div class="row">
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                        <?php 
$sql ="SELECT ID from tblclient ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$tclients=$query->rowCount();
?>
                                        <h3 class="header-title mb-0">Total Clients</h3>
                                       <p style="font-size: 20px;color: #844de3"><?php echo htmlentities($tclients);?></p>
                                    </div>
                                </div>
                                <canvas id="coin_sales4" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                            <div class="single-report">
                                <div class="s-sale-inner pt--30 mb-3">
                                    <div class="s-report-title d-flex justify-content-between">
                                       <?php 
$sql1 ="SELECT ID from tblservices ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$tser=$query1->rowCount();
?>	
                                        <h4 class="header-title mb-0">Total Services</h4>
                                        <p style="font-size: 20px;color: #844de3"><?php echo htmlentities($tser);?></p>
                                    </div>
                                </div>
                                <canvas id="coin_sales5" height="100"></canvas>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- sales report area end -->
             
                
            </div>

        </div>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
 
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="assets/js/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="assets/js/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="assets/js/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
