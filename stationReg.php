<?php
    $con = mysqli_connect("localhost","root","","db_charging_station");
    if(!$con)
    {
        echo "Connection failed";
    }


?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>Station Registration</title>
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
    <link rel="stylesheet" href="assets/css/bootstrap-fileupload.min.css" />
     <link href="assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
 <link rel="stylesheet" href="assets/plugins/validationengine/css/validationEngine.jquery.css" />
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
                            <img src="Images/logo3.jpg"height="100px" width="100px">
                            <figcaption>Charging Station</figcaption></a>
                        </header>
                        <!-- END LOGO SECTION -->
                        <!-- <ul class="nav navbar-top-links navbar-center"> -->
                            <br><br>
                            <div id="nav">
                                <div class="col-lg-12">
                        <div style="text-align: center;">

                           

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

                        <br><br>
                        <h2 align="center">Charging Station Registration</h2>
                        <br><br><br>
                        <form class="form-horizontal" id="popup-validation" name = "frm" action="#" method = "post" enctype="multipart/form-data">

                            <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Charging Station Details
                        </div>
                        <div class="panel-body">
                                                <div class="form-group">
                        <label class="control-label col-lg-4">Charging Station Name</label>
                        <div class="col-lg-4">
                            <input type="text" class="validate[required] form-control" name="station_name" id="rest_name" value = "">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="autosize" class="control-label col-lg-4">Address</label>

                    <div class="col-lg-4">
                        <textarea name="address" id="autosize" class="validate[required] form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-4">Charging Station Documents</label>
                        <div class="col-lg-8">
                     <input type="file" name="document" class="form-control" aria-label="file example" required>
    <!-- <div class="invalid-feedback">Example invalid form file feedback</div> -->
                </div>
            </div>
                <div class="form-group">
                        <label class="control-label col-lg-4">Charging Station Logo</label>
                        <div class="col-lg-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="assets/img/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="uploadfile"/></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Owner Details
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                        <label class="control-label col-lg-4">Charging Station Owner Name</label>
                        <div class="col-lg-4">
                            <input type="text" class="validate[required] form-control" name="owner_name" id="owner_name" value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">E-mail</label>

                        <div class=" col-lg-4">
                            <input class="validate[required,custom[email]] form-control" type="text" name="email" id="email" value = ""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Contact Number</label>

                        <div class="col-lg-4">
                            <div class="input-group">
                                <input class="validate[required] form-control" name = "mobile" id="mobile" type="text" data-mask="99999-99999" />
                                <!-- <span class="input-group-addon"></span> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>

                        <div class=" col-lg-4">
                            <input class="validate[required] form-control" type="password" name="password" id="password" value = "" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Confirm Password</label>

                        <div class=" col-lg-4">
                            <input class="validate[required,equals[password]] form-control" type="password" name="rpassword" value = "" id="rpassword" />
                        </div>
                    </div>
                        </div>
                    </div>
                
                </div>

                    
                    <div style="text-align:center" class="form-actions no-margin-bottom">
                        <input type="submit" value = "Register" name = "btnreg" id = "btnreg" class="btn btn-primary btn-lg " />
                    </div>
                    <!-- <div style="text-align:center" class="form-actions no-margin-bottom">
                        <input type="hidden" name="euid" value = "<?php if(isset($euid)){ echo $euid;}?>">
                    </div> -->
                    </form>



                    </div>
                </div>

                <hr />




            </div>


            <?php

                
                if($con)
                    {
                        if(isset($_POST["btnreg"]))
                        {
                            //if(isset($_POST["uploadfile"]))
                            //{
                                $filename = $_FILES["uploadfile"]["name"];
                                $tmpname = $_FILES["uploadfile"]["tmp_name"];
                                //print_r($_FILES["uploadfile"]);
                                $folder = "StationImg/".$filename;
                                move_uploaded_file($tmpname, $folder);

                                //for documents
                                $documentname = $_FILES["document"]["name"];
                                $dtmpname = $_FILES["document"]["tmp_name"];
                                //print_r($_FILES["uploadfile"]);
                                $dfolder = "StationDocs/".$documentname;
                                move_uploaded_file($dtmpname, $dfolder);
                            //}
                            $station_name = $_POST["station_name"];
                            $address = $_POST["address"];
                            $image = $folder;
                            $document=$dfolder;
                            $owner_name = $_POST["owner_name"];
                            $email = $_POST["email"];
                            $mobile = $_POST["mobile"];
                            $password = $_POST["password"];

                            $qry = "insert into stationreg(station_name,address,image,document,longitude,latitude,owner_name,email,mobile,password) values ('$station_name','$address','$image','$document','3034.44','3034.45','$owner_name','$email','$mobile','$password')";

                            $res = mysqli_query($con,$qry);
                            if($res)
                            {
                                echo "Inserted successfully";
                                //header("location:StationLogin.php");
                            }
                            else
                            {
                                echo "Insertion failed";
                            }

                            $sqry = "select max(s_id) as 'maxid' from stationreg";
                            $res = mysqli_query($con,$sqry);
                            $data = mysqli_fetch_array($res);
                            $s_id = $data['maxid'];
                            $qry = "select owner_name,email,mobile,password from stationreg where s_id = $s_id";
                            $res = mysqli_query($con,$qry);
                            $row = mysqli_fetch_row($res);
                            $iqry = "insert into admin(s_id,usertype_id,name,email,mobile,password) values($s_id,2,'$row[0]','$row[1]','$row[2]','$row[3]')";
                            $ires = mysqli_query($con,$iqry);
                            if(!$ires)
                            {
                                echo "Insertion failed";
                            }
                        }

                            
                    }
                ?>

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
    <script src="assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
<script src="assets/js/formsInit.js"></script>
<script src="assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="assets/js/validationInit.js"></script>
    <script>
        $(function () { formValidation(); });
        </script>
        <script>
            $(function () { formInit(); });
        </script>
         <!-- END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY-->
    
</html>