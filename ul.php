<?php session_start()?>
<?php include "connect.php"?>

<?php
  if(isset($_POST['submit'])){
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    $rs = mysqli_query($con, "select * from customer where username='$uid' and password='$pwd' and status = 1");

    if(mysqli_num_rows($rs)>0){
          $_SESSION["cuserid"] = $uid;
          header("Location: home.php");
    }
    else{
?>
      <script language="javascript" type="text/javascript">
        alert("Login failed. Invalid details or account not activated yet!!!")
        window.location="ul.php"
      </script>
<?php
    } 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auto Care</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="css/ul.css">
</head>
<body>
  <div class="full-page">
    <div class="navbar">
      <div><h1>Auto Care</h1></div>
      <nav>
        <ul id='MenuItems'>
          <li><a href='index.php'>Home</a></li>
          <li><a href='ml.php'>Mechanic</a></li>
          <li><a href='al.php'>Admin</a></li>
          <li><a href='knowledge.php'>Knowledge</a></li>
          <li><a href='contact.php'>Contact</a></li>
        </ul>
      </nav>
      </div>
    </div> 
  
    <div class="login-wrapper">
      <form class="form" method="post">
        <i class="fas fa-user-circle"></i>
        <input class="user-input" type="text" name="uid" placeholder="Username" required>
        <input class="user-input" type="password" name="pwd" placeholder="Password" required>
        <div class="options-01">
        <label class="remember-me"><input type="checkbox" name="">Remember me</label><a href="fp.php">Forgot your password?</a>
        </div>
        <input class="btn" type="submit" name="submit" value="LOGIN">
        <div class="options-02">
          <p>Not Registered? <a href="ur.php">Create an Account</a></p>
        </div>
      </form>
    </div>
  </body>
</html>