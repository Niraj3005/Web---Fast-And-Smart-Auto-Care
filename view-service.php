<?php include "connect.php"?>
<title>Auto care</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php

	if(isset($_POST['submit'])){
		$sname = $_POST["sname"];
		mysqli_query($con, "insert into services(service_name) values('$sname')");
	}

	$rs = mysqli_query($con, "SELECT * from services");
?>
<div class="container">
<br><br>
<center><a href="adminh.php" class="btn btn-success">Home</a></center><br>
<form method="POST">
<table align="center" class="table">
<tr>
	<td><b>Service Name:</b></td>
	<td align="center"><input type="text" name="sname" required></td>
</tr>
<tr>
	<td align="center" colspan="2"><input type="submit" name="submit" value="ADD" class="btn btn-info"></td>
</tr>
</table>
</form>
<table class="table table-hover">
<tr>
	<th>Service ID</th>
	<th>Service Name</th>
	<th></th>
    <th></th>
</tr>
<?php
	while($row = mysqli_fetch_row($rs)){
?>
<tr>
	<td><?=$row[0]?></td>
	<td><?=$row[1]?></td>
	<td><a href="delete-service.php?sid=<?=$row[0]?>" class="btn btn-warning" onclick="return confirm('Delete service?')">Delete</a></td>
	<td><a href="edit-service.php?sid=<?=$row[0]?>" class="btn btn-warning">Edit</a></td>
</tr>
<?php
	}
?>
</table>
</div>