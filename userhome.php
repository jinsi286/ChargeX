<?php
    session_start();
    $con = mysqli_connect("localhost","root","","db_charging_station");
    if(!$con)
    {
        echo "Connection failed";
    }

    echo $sqry = "select s_id from admin where approved = 1 && usertype_id=2";
    $sres = mysqli_query($con,$sqry);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="./Images/Restaurants/download.png" type="image/icon type">
<link rel="stylesheet" href="home2.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    
</div>

    <!--Header section start-->
    <header>
        <a href="#" class="logo"><i class="fa fa-car"></i>EasyRide</a>
        <nav class="navbar">
            <a class="active" href="userhome.php">Home</a>
            <a href="userhome.php#station">Charging Stations</a>
            <a href="userBooking.php">Bookings</a>
            <!-- <a href="#" onclick="openAbout()">about</a> -->
            <a href="./contact.html" >Contact us</a>
            
            <!-- <a class="feed" id="feedback">feedback</a> -->
            
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="userProfile.php" class="fa fa-user" aria-hidden="true"></i>
            <a href="userLogout.php" class="fas fa-sign-in-alt"></a>
            
        </div>
    </header>
    <div class="back">
    <div class="container1" id="co1">
        <div class="post">
            <div class="text">Thanks for Rating us!</div>
            <div class="edit">Edit</div>
            <i class="fas fa-times" id="close"></i>
    
        </div>
        <div class="star-widget">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="#">
            <i class="fas fa-times" id="close"></i>
            <h4></h4>
            <div class="textarea">
                <textarea cols="30" placeholder="Describe your experience"></textarea>
    
            </div>
            
            <div class="btn">
                <button type="submit">Post</button>
            </div>
        </form>
        </div>    
    </div>
    </div>
    <!-- Header section ends-->

    <!--search form-->
    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box" class="fas fa-search"></label>
        <i class="fas fa-times" id="close1"></i>
    </form>
    <!--Search Form ends-->

    <!--Home section start-->
    <section class="home" id="home-section">
<!--Add-->
<div class="add">
 <div class="add-container">
 <img src="Images/ChargingStationLogo.png" height="100px" width="300px">
 <div class="textimg"><h3>Welcome to</h3><h2 style="color:orange;">EasyRide</h2>
 <a href="userhome.php#station"><button class="ordr">Book Now</button></a></div>
 
 </div>
</div>
<!--Add ends-->


<!--Charging Station-->
<br>
<br>
<section class="barb" id="station">
<div class="spl">
    <h2>Charging Stations</h2>
    
    <br><br>
</div>

 
    
    <div class="box-container">
    <?php

        while($srow = mysqli_fetch_row($sres))
        {
            echo "<div class='box'>";
            $csqry = "select * from stationreg where s_id = $srow[0]";
            $csres = mysqli_query($con,$csqry);
            $srow = mysqli_fetch_row($csres);
            echo "<a href='userMenu.php?res_id=$srow[0]'><img src='$srow[3]' height='150px'></a>";
            echo "<h2>$srow[1]</h2>";
            echo"<div><a href='viewDetails.php?sid=$srow[0]'><button class='btn btn-success' >View Details</button></a></div>";
            echo"<div><a href='userhome2.php?sid=$srow[0]'><button class='btn btn-success' >Book Slot</button></a></div>";
            

        echo "</div>";
        }
    ?>
        

    </div>
    </section>
    

</section>


<!--Footer Section-->
<footer class="footer">
    <div class="container">
        <div class="row">
            
            <div class="footer-col">
                <ul>
                    <i class="fa fa-utensils"></i>
                    <span>EasyRide</span>
                </ul>
                <div class="map">
                    <ul>
                        <i class="fa fa-map-marker"></i>
                            <span style="font-size: medium;">Address : A-118, Orbit, Vapi, Gujarat - 396191
                            </span>
                    </ul>
                    </div>
                <div class="mail">
                    <ul>
                        <i class="fas fa-inbox"></i>
                        <span style="color:orange;font-size: medium;">
                            Write us at : support@easyride.com
                        </span>
                    </ul>
                </div>
            </div>
            

            </div>
            </div>
            

</footer>
<!--Home  ends-->

    

    <!--Java Script-->
    
    <!--JavaScript ends -->

</body>
</html>