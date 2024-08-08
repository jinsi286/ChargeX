<?php
$con = mysqli_connect("localhost","root","","db_charging_station");
    if(!$con)
    {
        echo "Connection failed";
    }
session_start();
echo $a_time=$_POST["slotno"];
echo $a_date=$_POST["sdate"];
echo $sid=$_SESSION['suid'];
echo $uid=$_SESSION["u_id"];

   
if(!$a_time)
{//echo "Please select date and time slot to confirm your booking";
header("location:bookingerror.html");
    
}
else
{
    $qry="insert booking_details(sid,uid,a_date,a_time)values($sid,$uid,'$a_date','$a_time')";
    $res=mysqli_query($con,$qry);
    if($res)
    {
        //session_destroy();
        header("location:bookingsuccess.php");
    }
}


?>