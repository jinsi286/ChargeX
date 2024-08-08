<?php
session_start();
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}

$s_id = $_SESSION["s_id"];
if(!$s_id)
{
    header("location:StationLogin.php");
}


if(isset($_POST["save"]))
{
    $station_name = $_POST["station_name"];
    $address = $_POST["address"];
    $owner_name = $_POST["owner_name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $longitude = $_POST["longitude"];
    $latitude = $_POST["latitude"];
    $password = $_POST["password"];
    $filename = $_FILES["uploadimg"]["name"];
    if($filename != "")
    {
    	$tmpname = $_FILES["uploadimg"]["tmp_name"];    
        $folder = "RestaurantImages/".$filename;
        move_uploaded_file($tmpname,$folder);
        $station_img = $folder;
        $qry = "update stationreg set station_name = '$station_name',address = '$address',image = '$station_img',owner_name = '$owner_name',email = '$email',mobile = '$mobile',password = '$password',longitude = '$longitude',latitude = '$latitude'  where s_id = $s_id";
    }
    else
    {
    	$qry = "update stationreg set station_name = '$station_name',address = '$address',owner_name = '$owner_name',email = '$email',mobile = '$mobile',password = '$password',longitude = '$longitude',latitude = '$latitude'  where s_id = $s_id";
    }
    $sres = mysqli_query($con,$qry);
    if(!$sres)
    {
        echo "failed";
    } 
    else
    {
    	header("location:stationProfile.php");
    }
}