<?php
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}
session_start();
$userid = $_SESSION["u_id"];
if(isset($_GET['sid']))
{
    $sid = $_GET['sid'];
    if(!$userid)
    {
        header("location:userLogin.php?sid=$sid");
    }
}
if(isset($_SESSION['suid']))
{
    $sid = $_SESSION['suid'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home2.css">

    <script>
    function myfunciton(e,val)
    {
	alert(e.target.innerText+val);
    }

    function my_function(ele)
    {
        alert(ele.innerText);
	    var slot=ele.innerText;
        document.getElementById("slotno").value=slot;
        

    }
    function loaddata(ele)
    {
        alert(ele.value);
        var d = ele.value;
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
                document.getElementById("dynamicpart").innerHTML=xmlhttp.responseText;
            }
        }    
        xmlhttp.open("GET","filldata.php?dt="+d,true);
        xmlhttp.send();

    }
    
</script>
</head>

<body>

<!-- header section starts  -->

<header class="header">

  <a href='userhome.php'><h1 style="color:orange;"><b>EasyRide</b></h1></a>

    <nav class="navbar">

        <h2><b>Welcome <?php echo $_SESSION['u_name'];?></b></h2>
        <a class="active" href='logout.php'>Logout</a>
    </nav>

</header>
<!-- header section ends  -->

<section class="doctors" id="doctors">
</br>
</br>
</br>
</br>
</br>
</br>
<h1 class="heading"> selected <span style="color:orange;">Charging Station</span> </h1>

    <div class="box-container">

<?php

    echo "<div class='box'>";
    $sqry = "select * from stationreg where s_id = $sid";
    $sres = mysqli_query($con,$sqry);
    $srow = mysqli_fetch_row($sres);
    echo "<img src='$srow[3]' height='150px' width='250px'>";
    echo "<h2 style='color:orange;'>$srow[1]</h2>";
    echo "<h2 style='color:orange;'>$srow[2]</h2>";
    echo "</div>";

?>

    </div>

</section>
<!-- booking section -->
<section class="icons-container" id="login">

<form name="form" method="post" action="dbbooking.php">
       <?php
       // $dqry="select * FROM u_schedule WHERE sid in(select max(sid) from u_schedule where uid=$id)";
       // $sdqry = mysqli_query($con,$dqry);
       // $srow = mysqli_fetch_row($sdqry);
       // echo "Make Appointment between $srow[2]"." to "."$srow[3]";
       ?>
        <div class="form-group">
                                <label class="control-label col-lg-2"><b style="color: orangered; font-size:20px">Select Date</b></label>
                                <div class="col-lg-4">
                                    <input type="date" class="validate[required] form-control" name="sdate" id="sdate" onchange="loaddata(this)" >
                                </div>
        </div>
       
        <div>
          
            <input type="hidden" name="slotno" id="slotno">
            <br/>
            <input type="submit" class="btn btn-primary" value="Book Appointment" name="btnba" id="btnba" style="width:250px;">
</div>


        </form>
        <div id='dynamicpart'>

</div>
</section>

<!-- booking section ends -->



<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>