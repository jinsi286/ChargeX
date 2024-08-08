<?php
    session_start();
    $con = mysqli_connect("localhost","root","","db_charging_station");
    if(!$con)
    {
        echo "Connection failed";
    }

    $u_id = $_SESSION["u_id"];
    if(!$u_id)
    {
        header("location:userLogin.php");
    }

    ?>

    <!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,250,600,700,800,900&display=swap');

    * {
      font-family: "Poppins", sans-serif;
    }

    * {
      box-sizing: border-box;
    }

    .column1 {
      width: 100%;
      padding: 10px;
      height: auto;


    }

    .styled-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 1.5em;
      min-width: 400px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      overflow-y: scroll;
      overflow: hidden;
    }

    .styled-table thead tr {
      color: #ffffff;
      text-align: left;
    }



    @media screen and (max-width: 600px) {
      .column1 {
        width: 100%;
      }
    }

    table {
      width: 100%;
    }

    .styled-table th,
    .styled-table td {
      padding: 12px 15px;
      font-weight: 600;
      text-align: left;
    }

    .styled-table td{
      color: rgb(58, 55, 54);
    }

     .styled-table tbody tr {
    border-bottom: 1px solid orangered;
} 


    .styled-table tbody tr:last-of-type {
      border-bottom: 2px solid orangered;
    }

    .styled-summary {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      min-width: 400px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      overflow-y: scroll;
      overflow: hidden;
    }

    .btn{
      position: absolute;
      top:55px;
      right:0;
      background-color: green;
      color: white;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
    }
    .btn2{
      position: absolute;
      background-color: orange;
      color: white;
      font-weight: bold;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
    }
  </style>
</head>
<body>

    <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Your Profile</h2>
    <a class="btn" href="userhome.php">  &#8592; Back to Home</a>
    <form name="frm" action="#" method="post">
        <table>
      
      <?php

      $qry = "select * from user where u_id = $u_id";
      $res = mysqli_query($con,$qry);
      $row = mysqli_fetch_row($res);
                                    
      echo "<tr>";
      echo "<td>Name:</td>";
      echo "<td><input type='text' name='name' value='$row[1]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Email:</td>";
      echo "<td><input type='text' name='email' value='$row[2]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Password:</td>";
      echo "<td><input type='password' name='password' value='$row[7]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Mobile:</td>";
      echo "<td><input type='text' name='mobile' value='$row[3]'></td>"; 
      echo "</tr>";
      echo "<tr>";
      echo "<td>Address:</td>";
      echo "<td><textarea name='address' cols='60px' rows='5px'>$row[4]</textarea>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Registration Number:</td>";
      echo "<td><input type='text' name='regno' value='$row[5]'></td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Chassis Number:</td>";
      echo "<td><input type='text' name='chno' value='$row[6]'></td>";
      echo "</tr>";
      
    

  ?>
      <tr colspan='2'><td><input type="submit" class="btn2" name="update" value="Update"></td></tr>
    </table>
    
    </form>

    <?php
    if(isset($_POST["update"]))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $regno = $_POST['regno'];
        $chno = $_POST['chno'];
        $qry = "UPDATE user SET u_name='$name',u_email='$email',u_password='$password',u_mobile='$mobile',u_address='$address',u_regno='$regno',u_chassis='$chno' WHERE u_id = $u_id";
        $res = mysqli_query($con,$qry);
        if($res)
        {
            echo "<script type='text/javascript'>";
            echo "alert('Updated Successfully')";
            echo "</script>";
            $flag = true;
        }

        if($flag)
        {
            header("location:userhome.php");
        }

        


    }
    ?>
    
    </body>
    </html>
