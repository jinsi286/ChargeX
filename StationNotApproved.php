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


if(isset($_GET["id"]))
    {
        $s_id = $_GET["id"];
        $qry = "update admin set approved = 1 where s_id = $s_id";
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
    <title>Pending Requests</title>
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

                            <a  class="navbar-brand" href="AdminDashboard.php">
                            <img src="Images/logo3.jpg" height="110px" width="200px">
                            <figcaption>EV Charging Stations</figcaption>
                            
                        </header>
                        <!-- END LOGO SECTION -->
                        <!-- <ul class="nav navbar-top-links navbar-center"> -->
                            <br><br>

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
                
                     
                            <div id="nav">
                                <div class="col-lg-12">
                        <div style="text-align: center;">

                            <div class="col-lg-1"><a href="StationApproved.php"><img src="Images/manage.jpg" height="50px" width="50px"><figcaption>Charging Stations<figcaption></a></div>

                            <div class="col-lg-1">
                            <a href="StationNotApproved.php">
                                <img src="Images/pending.jpg" height="50px" width="50px">
                                <figcaption>Pending Requests</figcaption>
                                <!-- <span class="label label-danger"><?php echo $count1; ?></span> -->
                            </a>
                            </div>
                             <div class="col-lg-1"><a href="adminBookings.php"><img src="Images/car.jpg" height="50px" width="50px"><figcaption>History<figcaption></a></div>

                            <div class="col-lg-1">
                            <a href="adminProfile.php">
                                <img src="Images/prof.jpg" height="50px" width="50px">
                                <figcaption>Profile</figcaption>
                               
                            </a>
                            </div>
                            <div class="col-lg-1">
                            <a href="">
                                <img src="Images/graph.jpg" height="50px" width="50px">
                                <figcaption>Insights</figcaption>
                                <!-- <span class="label label-danger"><?php echo $count1; ?></span> -->
                            </a>
                            </div>
                        
                        
                        

                    </div>
                </div>
                


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

                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <br><br><br><br><br>
                            <h2>Pending Requests</h2>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Charging Station Name</th>
                                            <th>Address</th>
                                            <th>Owner name</th>
                                            <th>email</th>
                                            <th>Mobile</th>
                                            <th>Documents</th>
                                            <th>Location</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $qry = "select s_id from admin where approved = 0";
                                            $res = mysqli_query($con,$qry);
                                            while($frow = mysqli_fetch_row($res))
                                            {
                                                $sqry = "select * from stationreg where s_id = $frow[0]";
                                                //echo $frow[0];
                                                $sres = mysqli_query($con,$sqry);
                                                while($row = mysqli_fetch_row($sres))
                                                {
                                                    echo "<tr>";
                                                    echo "<td><img src = '$row[3]' height = '200px' width = '200px'></td>";
                                                    echo "<td>$row[1]</td>";
                                                    echo "<td>$row[2]</td>";
                                                    echo "<td>$row[7]</td>";
                                                    echo "<td>$row[8]</td>";
                                                    echo "<td>$row[9]</td>";
                                                    echo "<td><a href='$row[4]' target='_blank'>View</a></td>";
                                                    echo "<td>$row[5]&nbsp;&nbsp;$row[6]</td>";
                                                    echo "<td><a href='StationNotApproved.php?id=$row[0]' class='btn btn-primary'>Approve</a></td>";
                                                    echo "</tr>";
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