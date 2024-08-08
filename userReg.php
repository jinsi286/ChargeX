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

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login/Register</title>
        <link rel="stylesheet" href="login2.css">
    </head>
<body>
    
  <div class="container">
     
      <div class="formbx" style="height:800px">
        
        <div class="form signinform">
            <form name="frm" action="#" method="post">
              <br>
                <a href="userhome2.php"><h2 style="color: orangered">EasyRide</h2></a>
                <h3>Sign Up</h3>

                <input type="text" placeholder="Enter Your Name" name="name" required>
                <input type="text" placeholder="Email" name="email" required>
                <input name = "mobile" placeholder="Mobile Number" type="text" required/>
                <textarea name="address" placeholder="   Address" type="text" required></textarea>
              </br>
                <input type="text" placeholder="Registration Number" name="regno" required>
                <input type="text" placeholder="Chassis Number" name="chassis" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="password" placeholder="Confirm password" required>
                <input type="submit" name="register" value="Register">
            </form>
            <h4>Already have an Account ?</h4>

            <a href="userLogin.php" style="color: redorange">
            Sign In
          </a>
        </div>
      </div>
      </div>


      <?php 
        if(isset($_POST["register"]))
        {
          $name = $_POST["name"];
          $email = $_POST["email"];
          $mobile = $_POST["mobile"];
          $address = $_POST["address"];
          $regno = $_POST["regno"];
          $chassis = $_POST["chassis"];
          $password = $_POST["password"];
          $qry = "insert into user (u_name,u_email,u_mobile,u_address,u_regno,u_chassis,u_password) values ('$name','$email','$mobile','$address','$regno','$chassis','$password')";
          $res = mysqli_query($con,$qry);

          if($res)
          {
            //echo "inserted";
            if(isset($_GET['sid']))
            {
                $_SESSION['suid']=$_GET['sid'];
                $id=$_SESSION['suid'];
                 header("location:userLogin.php?sid=$id");
            }  
            else         
            header("location:userhome.php");
          }
          else
          {
            echo "failed";
          }
        }
      ?> 
      
</body>
</html>