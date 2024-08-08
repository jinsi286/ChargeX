
<?php
    session_start();
    $con = mysqli_connect("localhost","root","","db_charging_station");
    if(!$con)
    {
        echo "Connection failed";
    }


    $userid = $_SESSION["u_id"];
    if(!$userid)
    {
        header("location:userLogin.php");
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
      width: 55px;
      font-weight: bold;
      cursor: pointer;
      padding: 15px;
      border: none;
      font-size: 20px;
      text-decoration: none;
      
 </style>
</head>

<body>
  <div class="column1 styled-table" style="background-color:white;">
    <h2 style="color: orangered; font-weight:bold;">Boking History</h2>
    <!-- <a class="btn2" href="logout.php">Logout</a> -->
    <a class="btn" href="userhome.php">  &#8592; Back to Home</a>
    <form name="frm" action="address.php" method="post">
    
          <?php 
                $qry = "select * from booking_details where uid = $userid order by bid desc";
                $res = mysqli_query($con,$qry);
                $cnt=mysqli_num_rows($res);
                if($cnt>=1)
                {
                while($row = mysqli_fetch_row($res))
                {
                  echo '<table align="left">';
                  echo '<thead>';
                    echo '<tr style="color:rgb(40, 40, 40)">';
                    $sqry = "select station_name,address,image from stationreg where s_id = $row[1]";
                    $sres = mysqli_query($con,$sqry);
                    $srow = mysqli_fetch_row($sres);
                    echo "<td><img src='$srow[2]' height='75px' width='75px'";
                    echo "colspan='4' style='text-decoration:underline'>&nbsp;&nbsp;$srow[0]</td>";
                    echo "<tr><td colspan='4' style='font-size:15px;color:grey'>Address:&nbsp;&nbsp;$srow[1]</td></tr>";
                    echo '</thead>';
                    $mqry = "select * from booking_details where bid = $row[0]";
                    $mres = mysqli_query($con,$mqry);
                    echo "<tbody style='font-size:20px'>";
                     echo "<tr><td style='color:darkblue'>Booked Date:&nbsp;&nbsp;$row[3]</td></tr>";
                      echo "<tr><td style='color:grey'>Booked Time :&nbsp;&nbsp;$row[4]</td></tr>";
                   
                      if($row[5]==0)
                                                    {
                                                        echo "<td style='color:orange'>Booked</td>";
                                                    }
                                                    else if($row[5]==1)
                                                    {
                                                        echo "<td style='color:orange'>Charging";
                                                    }
                                                    else if($row[5]==2)
                                                    {
                                                        echo "<td style='color:green'>Charged</td>";
                                                    }
                                                    else if($row[5]==3)
                                                    {
                                                        echo "<td style='color:red'>Cancelled</td>";
                                                     }

                      echo "<tr><td style='color:red'><strong><em></em></strong></td></tr>";
                      echo "</tbody>";
                    echo '</table>';
                    echo "<hr>";
                }
              }
              else
              {
                 echo '<table align="left">';
                  echo '<thead>';
                    echo '<tr style="color:rgb(40, 40, 40)">';
                    echo '<td>No History</td>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '</table>';
              }

                ?>
      </tr>
      </thead>
    </table>
  </form>
</div>
</body>
</html>
      