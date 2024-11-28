<?php session_start()?>
<?php include "connect.php"?>

<?php 
  $muserid = $_SESSION['muserid'];
  $rs = mysqli_query($con, "select * from mechanic where username='$muserid'");
  $row = mysqli_fetch_row($rs);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Auto care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="css/ur.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 


  </head>
  <body onload="getLocation()">
  <form class="form" action="edit-mechanic-profile.php" method="post">
    <a href="mh.php"><i class="fas fa-user-plus"></i></a>
    <input class="user-input" type="text" name="username" placeholder="Username" value="<?=$row[0]?>" readonly>
    <input class="user-input" type="password" name="password" placeholder="Create Password" value="<?=$row[1]?>" required>
    <input class="user-input" type="text" name="sname" placeholder="Service center name" value="<?=$row[2]?>" required>
    <input class="user-input" type="text" name="fullname" placeholder="Mechanic fullname" value="<?=$row[3]?>" required>
    <input class="user-input" type="text" name="address" placeholder="Address" value="<?=$row[4]?>" required>
    <input class="user-input" type="email" name="email" placeholder="Email" value="<?=$row[5]?>" required>
    <input class="user-input" type="tel" name="phone" placeholder="Phone No" value="<?=$row[6]?>" pattern="^[6789][0-9]{9}$" required>
    <input class="user-input" type="text" name="lat" id="lat" placeholder="Latitude" value="<?=$row[7]?>" readonly>
    <input class="user-input" type="text" name="lon" id="lon" placeholder="Longitude" value="<?=$row[8]?>" readonly>
    <input class="btn" type="submit" name="" value="UPDATE">
  </form>

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