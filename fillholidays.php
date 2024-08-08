<?php
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}
else
{
}
session_start();
 //$id=$_SESSION['upid'];
$sdate = $_GET["sdt"];
$edate = $_GET["edt"];
$sd=date('d',strtotime($sdate));
$ed=date('d',strtotime($edate));
$dcnt=$ed-$sd;
$cnt=0;
while($cnt<=$dcnt)
{
   //echo $sdate ;
   
   $day = date('d',strtotime($sdate));
   echo '<div class="checkbox">
        <label>
            <input class="uniform" type="checkbox" value="'. $day.'" name="checkbox[]"/>'; 
            echo date('d-m-Y',strtotime($sdate));
    echo '</label>
   </div>';
   $sdate = date('Y-m-d',strtotime('+1 day',strtotime($sdate)));
   $cnt=$cnt+1;

}
?>