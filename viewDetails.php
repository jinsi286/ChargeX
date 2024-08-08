<?php
$con = mysqli_connect("localhost","root","","db_charging_station");
if(!$con)
{
    echo "Connection failed";
}
if(isset($_GET['sid']))
{

   $sid=$_GET['sid'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    }

    .styled-table td{
      color: rgb(58, 55, 54);
    }

     .styled-table tbody tr {
    border-bottom: 1px solid orangered;
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
      background-color: orangered;
      color: white;
      width: 550px;
      font-weight: bold;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
      left: 30%;
 </style>
</head>

<body>
  <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Station Details</h2>
    <a class="btn" href="userhome.php">  &#8592; Back to Home</a>
    <form name="frm" action="address.php" method="post">
      <?php
                        $sqry = "select * from stationreg where s_id =$sid";
                        $sres = mysqli_query($con,$sqry);
                        $srow = mysqli_fetch_row($sres);
                      echo "<tr>";
                            echo "<td>Station Name  : </td>";
                            echo "<td>$srow[1]</td>";
                            echo "</tr>";
                            echo "<br>";
                            echo "<tr>";
                            echo "<td>Owner Name  :  </td>";
                            echo "<td>$srow[7]</td>";
                            echo "</tr>";
                            echo "<br>";
                            echo "<tr>";
                            echo "<td>Contact Number  :  </td>";
                            echo "<td>$srow[9]</td>";
                            echo "</tr>";
                            echo "<br>";
                            echo "<tr>";
                            echo "<td>Email  :  </td>";
                            echo "<td>$srow[8]</td>";
                            echo "</tr>";
                            echo "<br>";
                            echo "<tr>";
                            echo "</tr>";

        ?>
      </tr>
      </thead>
    </table>
  </form>
</div>
</body>
</html>
      