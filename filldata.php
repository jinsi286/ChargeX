<?php
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}
session_start();
$id=$_SESSION['suid'];
$d = $_GET["dt"];
$day=date('d',strtotime($d));
//echo $d;
//$now=date("m/d/Y");
//$date=date_format($d,"m/d/Y");
$sqry = "select * from schedule where sid = $id and '$d' between sdate and edate";
$sres = mysqli_query($con,$sqry);
if(!mysqli_num_rows($sres)>0)
{
    echo "<table>";
    echo "<tr><td> Schedule is Not Available";
    echo "</td></tr>";
    echo "</table>";

}

else
{
$srow = mysqli_fetch_array($sres);
$hdate =$srow['hdate'];
$ar=explode(",",$hdate);
$flag=FALSE;
foreach ($ar as $val)
{
    if($val==$day)
        $flag=TRUE;
}

if($flag==FALSE)
{
    if(mysqli_num_rows($sres)>0)
    {
    $qryt="select *from s_time where tid=1";
    $rsqryt=mysqli_query($con,$qryt);
    $row=mysqli_fetch_assoc($rsqryt);
    $s=$row['start_time'];
    $e=$row['end_time'];
    $du=$row['duration'];
    $break=$row['break'];
    
    $st=strtotime($s);
    $et=strtotime($e);

    $addmin=$du*60;
    //echo $slot=date("H:i",$st+$addmin);
    $addbreak=$break*60;
    $cnt=1;

    echo "<table>";
    echo "<tr>";
    echo "<tr>";
    while($st<$et)
    {
                    $now=date('Y-m-d');

                   $slot=date("H:i",$st);
                   $free=date("H:i",$st+$addmin);
                   $st+=$addmin+$addbreak;
                    echo "<tr>";
                    $cqry="select * from booking_details where a_date='$d' and a_time='$slot'";
                    $rcqry=mysqli_query($con,$cqry);
                    if(mysqli_num_rows($rcqry)>0 || ($d<=$now))
                    {
                        echo "<td><button style='width:140px;' class='btn btn-danger disabled' value='$cnt' onclick='myfunciton(event,$cnt)'>$slot-$free</button>&nbsp;</td>";
                    }
                    else
                    {
                        echo "<td><button style='width:140px;' class='btn btn-success'value='$cnt' id='btn_slot' onclick='my_function(this)'>$slot-$free</button>&nbsp;</td>";
                        
                    }   
                    $cnt=$cnt+1; 
                    
                    
                    echo "</tr>";
                    
    } 
    
    echo "</table>";
    

    }
    /*else
    {
        echo "<table>";
        echo "<tr><td> Schedule is Not Available";
        echo "</td></tr>";
        echo "</table>";
    }*/
}

else
{
    echo "<table>";
    echo "<tr><td><b style='font-size:20px;'>". $d ."  is Holiday";
    echo "</b></td></tr>";
    echo "</table>";
}
}

?>