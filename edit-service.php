<?php include "connect.php"?>

<?php
  if(isset($_POST['submit'])){
    $sid = $_POST["sid"];
    $sname = $_POST["sname"];

    mysqli_query($con, "update services set service_name='$sname' where service_id=$sid");

    header("Location: view-service.php");
  }
?>
<title>Auto care</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
  $sid = $_GET["sid"];

  $rs = mysqli_query($con, "select * from services where service_id=$sid");
  $row = mysqli_fetch_row($rs);
?>
<div class="container">
<br><br>
<center><a href="adminh.php" class="btn btn-success">Home</a></center><br>
<form method="POST">
<table align="center" class="table">
<tr>
  <td><b>Service ID:</b></td>
  <td align="center"><input type="text" name="sid" value="<?=$row[0]?>" readonly></td>
</tr>
<tr>
  <td><b>Service Name:</b></td>
  <td align="center"><input type="text" name="sname" value="<?=$row[1]?>" placeholder="Service name" required</td>
</tr>
<tr>
  <td align="center" colspan="2"><input type="submit" name="submit" value="UPDATE" class="btn btn-info"></td>
</tr>
</table>
</form>
</div>