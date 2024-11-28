<?php session_start()?>
<?php include "connect.php"?>
<?php 
    if(isset($_POST['submit'])){
        $fname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        mysqli_query($con, "update customer set password='$password',fullname='$fname',address='$address',email='$email',phone='$phone' where username='$username'");
?>
    <script language="javascript" type="text/javascript">
    alert("Profile updated successfully!!!")
    window.location="home.php";
    </script>                       
<?php
    }

    $cuserid = $_SESSION['cuserid'];
    $rs = mysqli_query($con, "select * from customer where username='$cuserid'");
    $row = mysqli_fetch_row($rs);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Auto care</title>
  <meta charset="utf-8">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
  <link rel="stylesheet" href="css/ur.css">
</head>
<body>
      <form class="form" method="post">
        <a href="home.php"><i class="fas fa-user-plus"></i></a>
        <input class="user-input" type="text" name="username" placeholder="Username" value="<?=$row[0]?>" required>
        <input class="user-input" type="password" name="password" placeholder="Create Password" value="<?=$row[1]?>" required>
        <input class="user-input" type="text" name="fullname" placeholder="Fullname" value="<?=$row[2]?>" required>
        <input class="user-input" type="text" name="address" placeholder="Address" value="<?=$row[3]?>" required>
        <input class="user-input" type="email" name="email" placeholder="Email" value="<?=$row[4]?>" required>
        <input class="user-input" type="tel" name="phone" placeholder="Phone No" pattern="^[6789][0-9]{9}$" value="<?=$row[5]?>" required>
        <input class="btn" type="submit" name="submit" value="UPDATE">
      </form>
</body>
</html>



