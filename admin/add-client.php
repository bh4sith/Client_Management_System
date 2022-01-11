<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$clientmsaid=$_SESSION['clientmsaid'];
 $acctid=mt_rand(100000000, 999999999);
 $accttype=$_POST['accounttype'];
 $password=md5($_POST['password']);
 $cname=$_POST['cname'];
 $comname=$_POST['comname'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $zcode=$_POST['zcode'];
 $wphnumber=$_POST['wphnumber'];
 $cellphnumber=$_POST['cellphnumber'];
 $ophnumber=$_POST['ophnumber'];
 $email=$_POST['email'];
 $websiteadd=$_POST['websiteadd'];
 $notes=$_POST['notes'];
 
$sql="insert into tblclient(AccountID,AccountType,ContactName,CompanyName,Address,City,State,ZipCode,Workphnumber,Cellphnumber,Otherphnumber,Email,WebsiteAddress,Notes,Password)values(:acctid,:accttype,:cname,:comname,:address,:city,:state,:zcode,:wphnumber,:cellphnumber,:ophnumber,:email,:websiteadd,:notes,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
$query->bindParam(':accttype',$accttype,PDO::PARAM_STR);
$query->bindParam(':cname',$cname,PDO::PARAM_STR);
$query->bindParam(':comname',$comname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':zcode',$zcode,PDO::PARAM_STR);
$query->bindParam(':wphnumber',$wphnumber,PDO::PARAM_STR);
$query->bindParam(':cellphnumber',$cellphnumber,PDO::PARAM_STR);
$query->bindParam(':ophnumber',$ophnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':websiteadd',$websiteadd,PDO::PARAM_STR);
$query->bindParam(':notes',$notes,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Client has been added.")</script>';
echo "<script>window.location.href ='add-client.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Client - Client Management System</title>
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
                                        <h4 class="header-title">Add Client</h4>
											<div class="forms-main">
											
											<div class="graph-form">
											<div class="form-body">
										<form method="post"> 
																				
												<div class="form-group"> <label for="exampleInputEmail1">Account Type</label> 
													<select  name="accounttype"  class="form-control select2" required='true'>
													<option value="">Choose Account Type</option>
													<option value="Active Account">Active Account</option>
													<option value="Inactive Account">Inactive Account</option>
													<option value="Contact/Lead">Contact/Lead</option>
													<option value="Unknown">Unknown</option>
													
												</select> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Contact Name</label> <input type="text" name="cname" placeholder="Contact Name [a-z]" value="" class="form-control" required='true'> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Company Name</label> <input type="text" name="comname" placeholder="Company Name" value="" class="form-control" required='true'> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Address</label> <textarea type="text" name="address" placeholder="Address" value="" class="form-control" required='true' rows="4" cols="3"></textarea> </div>
												<div class="form-group"> <label for="exampleInputEmail1">City</label> <input type="text" name="city" placeholder="City" value="" class="form-control" required='true'> </div>
												<div class="form-group"> <label for="exampleInputEmail1">State</label> <input type="text" name="state" placeholder="State" value="" class="form-control" required='true'> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Zip Code</label> <input type="text" name="zcode" placeholder="Zip Code" value="" class="form-control" required='true' pattern="[0-9]*"> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Work Phone Number</label><input type="tel" name="wphnumber" value="" placeholder="Work Phone Number"  class="form-control" maxlength='10' required='true' pattern="[0-9]+"> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Cell Phone Number</label><input type="tel" name="cellphnumber" value="" placeholder="Cell Phone Number"  class="form-control" maxlength='10' pattern="[0-9]+"> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Other Phone Number</label><input type="tel" name="ophnumber" value="" placeholder="Work Phone Number"  class="form-control" maxlength='10' pattern="[0-9]+"> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="" placeholder="Email address" class="form-control" required='true'> </div> 
											<div class="form-group"> <label for="exampleInputEmail1">Password</label>
												<input placeholder="password" type="password" name="password" required="true" id="password" class="form-control">
											</div>
												<div class="form-group"> <label for="exampleInputPassword1">Website Address</label> <input type="text" name="websiteadd" value="" placeholder="https://example.com" required='true' class="form-control" pattern="https://.*" size="30"> </div>
												<div class="form-group"> <label for="exampleInputEmail1">Notes</label> <textarea type="text" name="notes" placeholder="Notes" value="" class="form-control" required='true' rows="4" cols="3"></textarea> </div>

												
												  
											</div>
											</div>
											</div> 
									
												<button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                         
                            
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