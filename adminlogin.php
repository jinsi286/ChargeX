<?php
session_start();
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}

if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $qry = "select * from admin where email = '$email' && password = '$password' && usertype_id = 1";
    $res = mysqli_query($con,$qry);
    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $_SESSION["admin_id"] = 1;
        header("location:adminDashboard.php");
    }
    else
    {
        echo "login failed";
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

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                        <div class="row">
                        <header class="navbar-header">

                            <a  class="navbar-brand" href="AdminDashboard.php">
                            <img src="Images/logo3.jpg" height="100px" width="100px">
                            <figcaption>EV Charging Stations</figcaption></a>
                        </header>
                        <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">


                    

                   
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                       <br><br><br><br><br>



                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Admin Login
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" id="popup-validation" name="frm" action="#" method="post">
                                <div class="form-group">
                                            <label class="control-label col-lg-4">E-mail</label>

                                            <div class=" col-lg-8">
                                                <input class="validate[required,custom[email]] form-control" type="text" name="email"
                                                    id="email" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Password</label>

                                            <div class=" col-lg-8">
                                                <input class="validate[required] form-control" type="password" name="password" id="password" />
                                            </div>
                                        </div>
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input type="submit" value="Login" class="btn btn-success btn-lg " name="login" />
                                        </div>
                                    </form>
                        </div>
                        <!-- <div class="panel-footer">
                            Panel Footer
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
