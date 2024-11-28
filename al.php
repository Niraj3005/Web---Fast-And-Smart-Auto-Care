<?php session_start()?>
<?php include "connect.php"?>

<?php
  if(isset($_POST['submit'])){
    $uid = $_POST["loginUser"];
    $pwd = $_POST["loginPassword"];
  
    $rs = mysqli_query($con, "select * from admin where admin_id='$uid' and admin_pwd='$pwd'");

    if(mysqli_num_rows($rs)>0){
      $_SESSION["auserid"] = $uid;
      header("Location: adminh.php");
    }
    else{
?>
      <script language="javascript" type="text/javascript">
          alert("Login failed. Invalid details!!!")
          window.location="al.php";
      </script>
<?php
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto care</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/al.css">
  <title>Login Form Demo</title>
</head>
<body>
  <div class="full-page">
        <div class="navbar">
            <div>
                <h1>Admin Login</h1>
            </div>
            <nav>
                <ul id='MenuItems'>
                    <li><a href='ul.php'>Home</a></li>
                </ul>
           </nav>
       </div>
    </div>    
  <div class="login-wrapper">
    <form class="form" method="POST">
      <img src="images/avatar.png" alt="">
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="loginUser" id="loginUser" required>
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="loginPassword" id="loginPassword" required>
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" value="Login" name="submit" class="submit-btn">
    </form>
 </body>
</html>