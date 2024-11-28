<?php session_start()?>
<?php include "connect.php"?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Auto care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 

    <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

  </head>
  <body onload="getLocation()">
    <br>
    <center><a href="home.php" class="btn btn-success">Home</a></center>
    <center>
      <br>
  <form class="form" action="request-service1.php" method="post">
    <b>Current Latitude:</b>
    <input class="user-input" type="text" name="lat" id="lat" placeholder="Latitude" readonly>
    <b>Current Longitude:</b>
    <input class="user-input" type="text" name="lon" id="lon" placeholder="Longitude" readonly>
    <input class="btn btn-success" type="submit" name="" value="SEARCH NEARY BY">
  </form>
</center>
<?php
  $un = $_SESSION['cuserid'];
  $rs = mysqli_query($con, "select request_id, request_date, mechanic_fullname, service_center_name, address, distance, request.status from request, mechanic where request.mechanic_username = mechanic.username and cust_username='$un'");
?>

<div class="container">
    <br><br>
    <br><br>
    <table class="table table-hover">
    <tr>
        <th>Request#</th>
        <th>Date</th>
        <th>Mechanic Name</th>
        <th>Service Center Name</th>
        <th>Address</th>
        <th>Distance</th>
        <th>Status</th>
    </tr>
    <?php
        while($row = mysqli_fetch_row($rs)){
    ?>
    <tr>
        <td><?=$row[0]?></td>
        <td><?=$row[1]?></td>
        <td><?=$row[2]?></td>
        <td><?=$row[3]?></td>
        <td><?=$row[4]?></td>
        <td><?=$row[5]?></td>
        <td><?=$row[6]?></td>
    </tr>
    <?php
        }
    ?>
    </table>
    </div>

  <script>
    var x = document.getElementById("lat")
    var y = document.getElementById("lon")

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition)
      } else {
        x.innerHTML = "Geolocation is not supported by this browser."
      }
    }
    
    function showPosition(position) {
      x.value = position.coords.latitude 
      y.value = position.coords.longitude
    }
    </script>


</body>
</html>