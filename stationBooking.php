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

$s_id = $_SESSION["s_id"];
if(!$s_id)
{
    header("location:StationLogin.php");
}

if(isset($_GET["booked_id"]) && isset($_GET["charged_id"]))
    {
        $booked_id = $_GET["booked_id"];
        $charged_id = $_GET["charged_id"];
       $qry = "update booking_details set status=$charged_id where bid = $booked_id";
        $res = mysqli_query($con,$qry);
        if(!$res)
        {
            echo "failed";
        }
    }


?>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Blank Page</title>
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
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
                <div id="top">

                    <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 20px;">
                        <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                            <i class="icon-align-justify"></i>
                        </a>
                        <!-- LOGO SECTION -->
                       <div class="row">
                        <header class="navbar-header">

                            <a  class="navbar-brand" href="stationDashboard.php">
                            <img src="Images/logo3.jpg" height="110px" width="200px">
                            <figcaption>EV Charging Stations</figcaption>
                        </header>

                        <ul class="nav navbar-top-links navbar-right">

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="stationProfile.php"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>
                        <!-- END LOGO SECTION -->
                        <!-- <ul class="nav navbar-top-links navbar-center"> -->
                            <br><br>
                            <div id="nav">
                                <div class="col-lg-12">
                        <div style="text-align: center;">

                            <div class="col-lg-1"><a href="schedule.php"><img src="Images/schedule.jpg" height="50px" width="50px"><figcaption>Schedule<figcaption></a></div>

                            <div class="col-lg-1"><a href="stationBooking.php"><img src="Images/booking.jpg" height="50px" width="50px"><figcaption>Bookings<figcaption></a></div>

                            

                            <div class="col-lg-1"><a href="stationProfile.php"><img src="Images/prof.jpg" height="50px" width="50px"><figcaption>Profile<figcaption></a></div>


                            
                        </div>

                    </div>
                </div>
                <!-- <ul class="nav navbar-top-links navbar-right">

                    ADMIN SETTINGS SECTIONS 

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    END ADMIN SETTINGS -->
                <!-- </ul>
 --> 
</div>
            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2></h2>
                        <br><br><br><br><br><br>

                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Orders</h2>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Booked by</th>
                                            <!-- <th>Restaurant Name</th> -->
                                            <th>Vehicle No.</th>
                                            <th>Booked Date</th>
                                            <th>Booked Time</th>
                                             <th>Status</th>
                                             <th>Cancel</th>

                                            <!-- <th>Delivery Partner</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $qry = "select * from booking_details where sid = $s_id order by a_date ";
                                            $res = mysqli_query($con,$qry);
                                            while($row = mysqli_fetch_array($res))
                                            
                                                    {
                                                        echo "<tr>";
                                                         $nqry = "select u_name,u_regno from user where u_id = $row[2]";
                                                    $nres = mysqli_query($con,$nqry);
                                                    $nrow = mysqli_fetch_row($nres);
                                                    echo "<td>$nrow[0]</td>";
                                                
                                                    echo "<td>$nrow[1]</td>";

                                                    echo "<td>$row[3]</td>";
                                                    echo "<td>$row[4]</td>";
                                                   
                                                    if($row[5]==0)
                                                    {
                                                        echo "<td>Booked&#8594;<a href='stationBooking.php?booked_id=$row[0] & charged_id=1' class='btn btn-warning'>Charging</a></td>";
                                                    }
                                                    else if($row[5]==1)
                                                    {
                                                        echo "<td>Booked&#8594; Charging&#8594;<a href='stationBooking.php?booked_id=$row[0] & charged_id=2' class='btn btn-success'>Charged</a></td>";
                                                    }
                                                    else if($row[5]==2)
                                                    {
                                                        echo "<td>Booked&#8594; Charging&#8594;Charged</td>";
                                                    }
                                                    else if($row[5]==3)
                                                    {
                                                        echo "<td>Booked&#8594; Cancelled</td>";
                                                     }

                                                     if($row[5]==0)
                                                    
                                                    {
                                                        echo "<td><a href='stationBooking.php?booked_id=$row[0] & charged_id=3' class='btn btn-danger'>Cancel</a></td>";
                                                    }

                                                    else
                                                    {
                                                        echo "<td><a href='stationBooking.php' class='btn btn-' style='cursor: not-allowed;color: currentColor;background-color: grey'>Cancel</a></td>";
                                                    }
                                                   
                                                    echo "</tr>";
                                                
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

                <hr />




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
     <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>