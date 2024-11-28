<?php session_start()?>
<?php include "connect.php"?>

<?php 
    if(isset($_POST['submit'])){
        $fid = $_POST["fid"];
        $fdate = $_POST["fdate"];
        $cid = $_SESSION["cuserid"];
        $mid = $_POST["muserid"];
        $msg = $_POST["msg"];

        mysqli_query($con, "insert into feedback values($fid,'$fdate','$cid','$mid','$msg')");
?>
        <script language="javascript" type="text/javascript">
        alert("Feedback posted successfully!!!")
        window.location="home.php";
        </script>                       
<?php  
    }

    $rs = mysqli_query($con, "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'autocare' AND   TABLE_NAME = 'feedback'");
    $row = mysqli_fetch_row($rs);
    $fid = $row[0];

    $rs = mysqli_query($con, "select current_date");
    $row = mysqli_fetch_row($rs);
    $fd = $row[0];
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
    <b style="color: white;">Feedback ID:</b>
    <input class="user-input" type="text" name="fid" value="<?=$fid?>" readonly>
    <b style="color: white;">Feedback Date:</b>
    <input class="user-input" type="text" name="fdate" value="<?=$fd?>" readonly>
    <b style="color: white;">Mechanic:</b>
    <select class="user-input" name="muserid" style="color: black" required>
    <option value="">Select Mechanic</option>
<?php
    $rs = mysqli_query($con, "select username, mechanic_fullname from mechanic where status=1");

    while($row = mysqli_fetch_row($rs)){
?>
    <option value="<?=$row[0]?>"><?=$row[1]?></option>
<?php
    }
?>
    </select>
    <b style="color: white;">Feedback:</b>
    <input class="user-input" type="text" name="msg" placeholder = "Enter your feedback here" required>
    <input class="btn" type="submit" name="submit" value="POST">
  </form>
</body>
</html>