<?php
session_start();
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}
else
{
}

$admin_id = $_SESSION["admin_id"];
if(!$admin_id)
{
    header("location:adminlogin.php");
}

$qry = "select * from admin where usertype_id = 2 && approved = 1";
$res = mysqli_query($con,$qry);
$count1 = mysqli_num_rows($res);
$qry = "select * from admin where usertype_id = 2 && approved = 0";
$res = mysqli_query($con,$qry);
$count2 = mysqli_num_rows($res);

?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <style>
        body {
              background-image: url('thsouthind.jpg');
              background-repeat: no-repeat;
             }
    </style>
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 ">

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="AdminDashboard.php" class="navbar-brand">
                    <img src="Images/logo3.jpg" height="150px" width="200px">
                            <figcaption>EV Charging Stations</figcaption>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">


                    

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            
                            <li><a href="adminLogout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->





        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2></h2>



                    </div>
                </div>

                <hr />
                <br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                           <br><br><br>
                           <div class="col-lg-2">
                            <a href="StationApproved.php">
                                <img src="Images/manage.jpg" height="100px" width="100px">
                                <span>Manage Charging Staions</span>
                                <span class="label label-success"><?php echo $count1; ?></span>
                            </a>
                            </div>

                            <div class="col-lg-2">
                            <a href="StationNotApproved.php">
                                <img src="Images/pending.jpg" height="100px" width="100px">
                                <span>Pending Requests</span>
                                <span class="label label-danger"><?php echo $count2; ?></span>
                            </a>
                            </div>
                        
                        

                            <div class="col-lg-2">
                            <a href="adminBookings.php">
                                <img src="Images/car.jpg" height="100px" width="100px">
                                <figcaption>&nbsp;&nbsp;History</figcaption>
                            </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                            <br>
                             <br>
                              <br>
                            <div class="col-lg-2">
                            <a href="adminProfile.php">
                                <img src="Images/prof.jpg" height="100px" width="100px">
                                <figcaption>Profile</figcaption>
                            </a>
                            </div>

                            <!-- <div class="col-lg-2">
                            <a href="Delivery.php">
                                <img src="Images/graph.jpg" height="100px" width="100px">
                                <figcaption>Insights</figcaption>
                            </a>
                            </div> -->
                        

                        </div>
                    </div>


            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>