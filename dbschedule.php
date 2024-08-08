
<?php

$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}
  

if(isset($_GET["delid"]))
{

    $delid = $_GET["delid"];
   // $qry = "delete from schedule where id = $delid";
    //$res = mysqli_query($con,$qry);

    /* to update booking details*/
  $sqry="select * from schedule where id=$delid";
    $rsqry=mysqli_query($con,$sqry);

    $rqry=mysqli_fetch_row($rsqry);
    $sdate=$rqry[2];
    $edate=$rqry[3];

    $uqry="update booking_details set status=3 where a_date between '$sdate' and '$edate'";
    $ruqry=mysqli_query($con,$uqry);

    $qry = "delete from schedule where id = $delid";
    $res = mysqli_query($con,$qry);
    if(!$res)
    {
        echo "deletion failed";
    }
    else
    {
        header("location:schedule.php");
    }
}


?>