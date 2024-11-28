<?php include "connect.php"?>

<?php

  if(isset($_POST['submit'])){
    $sname = $_POST["sname"];
    $fname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];
    
    $rs = mysqli_query($con, "select * from mechanic where username='$username'");
    if(mysqli_num_rows($rs)>0){
?>
    <script language="javascript" type="text/javascript">
    alert("Username already registered")
    window.location="mr.php";
    </script>             
<?php
    }
    else{  
      mysqli_query($con, "insert into mechanic values('$username','$password','$sname','$fname','$address','$email','$phone',$lat,$lon,0)");
?>
  <script language="javascript" type="text/javascript">
    alert("You are registered successfully.");
    window.location="mr.php";
    </script>
<?php
    }
  }
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
  <body onload="getLocation()" style="padding: 100px;">
  <form class="form" method="post">
    <i class="fas fa-user-plus"></i>
    <input class="user-input" type="text" name="username" placeholder="Username" required>
    <input class="user-input" type="password" name="password" placeholder="Create Password" required>
    <input class="user-input" type="text" name="sname" placeholder="Service center name" required>
    <input class="user-input" type="text" name="fullname" placeholder="Mechanic fullname" required>
    <input class="user-input" type="text" name="address" placeholder="Address" required>
    <input class="user-input" type="email" name="email" placeholder="Email" required>
    <input class="user-input" type="tel" name="phone" placeholder="Phone No" pattern="^[6789][0-9]{9}$" required>
    <input class="user-input" type="text" name="lat" id="lat" placeholder="Latitude" readonly>
    <input class="user-input" type="text" name="lon" id="lon" placeholder="Longitude" readonly>
    <input class="btn" type="submit" name="submit" value="SIGN UP">
    <div class="options-02">
    <p>Already Registered? <a href="ml.php">Login</a></p>
    </div>
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