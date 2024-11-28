<?php include "connect.php"?>

<?php
  if(isset($_POST['submit'])){
    $fname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];        

    $result = mysqli_query($con, "select * from customer where username='$username'");

    if(mysqli_num_rows($result)>0){
?>
      <script language="javascript" type="text/javascript">
        alert("User already registered.")
        window.location="ur.php";
      </script>
<?php

    }
    mysqli_query($con, "insert into customer values('$username','$password','$fname','$address','$email','$phone',0)");
?>
    <script language="javascript" type="text/javascript">
    alert("You are registered successfully!!!")
    window.location="ul.php";
    </script>             
<?php  
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
  <body>
  <form class="form" method="post">
    <i class="fas fa-user-plus"></i>
    <input class="user-input" type="text" name="fullname" placeholder="Fullname" required>
    <input class="user-input" type="text" name="username" placeholder="Username" required>
    <input class="user-input" type="email" name="email" placeholder="Email" required>
    <input class="user-input" type="text" name="address" placeholder="Address" required>
    <input class="user-input" type="tel" name="phone" placeholder="Phone No" pattern="^[6789][0-9]{9}$" required>
    <input class="user-input" type="password" name="password" placeholder="Create Password" required>
    <input class="btn" type="submit" name="submit" value="SIGN UP">
    <div class="options-02">
    <p>Already Registered? <a href="ul.php">Login</a></p>
    </div>
  </form>
</body>
</html>