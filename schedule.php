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

$s_id =$_SESSION['s_id'];
if(!$s_id)
{
    header("location:StationLogin.php");
}
if(isset($_POST["set"]))
{
    if($_POST["set"] == "Add")
    {
    $uid=$s_id;
    $sdate=$_POST["sdate"];
    $edate=$_POST["edate"];
    $hdate=$_POST["checkbox"];
    $hdate1= implode(",", $hdate);
    $qry="insert into schedule(sid,sdate,edate,hdate)values($uid,'$sdate','$edate','$hdate1')";
    $res=mysqli_query($con,$qry);
    if(!$res)
    {
        echo "insertion failed";
    }
    else
    {
        echo "insertion success";
    }
    }

    if($_POST["set"] == "Save")
    {
        
        $id = $_POST["euid"];
        $sdate=$_POST["sdate"];
        $edate=$_POST["edate"];
        $hdate=$_POST["checkbox"];
        $hdate1= implode(",", $hdate);
       
        echo $qry = "update schedule set sdate = '$sdate',edate = '$edate',hdate = '$hdate1' where id = $id";
        $sres = mysqli_query($con,$qry);
        if(!$sres)
        {
            echo "failed";
        } 



        //$dqry="update booking details set status=3 where a_date between FROM u_schedule WHERE sid in(select max(sid) from u_schedule where uid=$id)";
        else
        {
            header('location:schedule.php');
        }
    }
}

$sqry = "select * from schedule where sid = $s_id";
$sres = mysqli_query($con,$sqry);




if(isset($_GET["editid"]))
{
    $euid = $_GET["editid"];
    $qry = "select * from schedule where id = $euid";
    $res = mysqli_query($con,$qry);
    if($res)
    {
        $row = mysqli_fetch_row($res);
    }
    $sdate = $row[2];
    $edate = $row[3];
    $hdate = $row[4];
    $h=explode(",",$hdate);
   
}

?>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>Station Schedule</title>
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
     <link rel="stylesheet" href="assets/plugins/validationengine/css/validationEngine.jquery.css" />
       <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
    <!-- END PAGE LEVEL  STYLES -->
        
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
     <script>
    function loaddata(ele)
    {
        sdate = document.getElementById("sdate").value;
        edate = document.getElementById("edate").value;
        alert(sdate + "---" + edate);
        var xmlhttp;
        if(window.XMLHttpRequest)
        {
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                document.getElementById("holydays").innerHTML=xmlhttp.responseText;
            }
        }    
        xmlhttp.open("GET","fillholidays.php?sdt="+sdate+"&edt="+edate,true);
        xmlhttp.send();

    }
    </script>
    <!-- BEGIN BODY-->
<body class="padTop53 " >

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
        <br>
        <div id="content">
            <br>
            <div class="inner" style="min-height:1200px;padding-top:20px;">
                <br>
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Station Schedule</h2>
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class=<?PHP if(!(isset($euid)) || !(isset($ch_id))) echo""; else 
                                echo"active"; ?>><a href="#data" data-toggle="tab">Schedule History</a>
                                </li>
                                <li class=<?PHP if(isset($euid)) echo"active"; else 
                                echo"" ?>><a href="#New" data-toggle="tab">Add Schedule</a>
                                </li>
                                
                               
                            </ul>

                            <div class="tab-content">
                                <div class="<?PHP if(isset($euid) || isset($ch_id)) echo 'tab-pane fade in'; else echo 'tab-pane fade in active'; ?>"
                                 id="data">
                                   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Schedule History
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-user">
                                    <thead>
                                        <tr>
                                            <!-- <th>Id</th> -->
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Holidays</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $now=date('Y-m-d');

                                            while($srow = mysqli_fetch_array($sres))
                                            {
                                               echo "<tr>";
                                               echo "<td>$srow[2]</td>";
                                               echo "<td>$srow[3]</td>";
                                               echo "<td>$srow[4]</td>";
                                               if($now>=$srow[2])
                                               {
                                               echo "<td><a href='schedule.php?editid=$srow[0]' class='btn btn-primary disabled'>Edit</a></td>";
                                           }
                                           else{
                                            echo "<td><a href='schedule.php?editid=$srow[0]' class='btn btn-primary'>Edit</a></td>";
                                           }
                                           if($now>=$srow[2])
                                               {

                                               echo "<td><a href='dbschedule.php?delid=$srow[0]' class='btn btn-danger disabled'>Delete</a></td>";
                                           }
                                           else{
                                            echo "<td><a href='dbschedule.php?delid=$srow[0]' class='btn btn-danger'>Delete</a></td>";
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
                                <div class="<?PHP if(isset($euid)) {echo 'tab-pane fade in active'; } else {echo 'tab-pane fade in'; }?>" id="New">
                                   <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Add Schedule
                        </div>
                        <div class="panel-body">
                <form class="form-horizontal" id="popup-validation" action="#" method="post">
                            
                        
                            
                            <div class="form-group">
                                <label class="control-label col-lg-4">Enter start date</label>
                                <div class="col-lg-4">
                                    <input type="date" class="validate[required] form-control" name="sdate" id="sdate" value="<?php if(isset($euid)){ echo $sdate; } else '';?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Enter end date</label>
                                <div class="col-lg-4">
                                    <input type="date" class="validate[required] form-control" name="edate" id="edate" onchange="loaddata(this)" value="<?php if(isset($euid)){ echo $edate; } else '';?>">
                                </div>
                            </div>  
                            <div class="form-group">
                        <label class="control-label col-lg-4">Holidays</label>

                        <div class="col-lg-8" id="holydays">
                            
                            
                        </div>
                    </div>

                            <div style="text-align:center" class="form-actions no-margin-bottom">
                                <input type="submit" value="<?php if(isset($euid)){echo 'Save'; } else{ echo 'Add';} ?>" name="set" class="btn btn-primary btn-lg " />
                                <input type="hidden" name="euid" value="<?php if(isset($euid)){echo $euid; } else{ echo '0';} ?>"/>
                            </div>
                        </form>
                            </div>
                    </div>
                </div>
                                </div>

                              
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
       <!--END PAGE CONTENT -->

</div>
    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->
    <script type="text/javascript">
        function disableprice()
        {
            document.getElementById("item_price").disabled = true;
        }

        function enableprice()
        {
            document.getElementById("item_price").disabled = false;

        }
    </script>
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPTS -->

     <script src="assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="assets/js/validationInit.js"></script>
    <script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(function () { 
            $('#dataTables-user').dataTable();
            formValidation(); });
        </script>
     <!--END PAGE LEVEL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>