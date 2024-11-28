<?php include "connect.php"?>
<title>Auto care</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
	$rs = mysqli_query($con, "SELECT * from customer");
?>
<div class="container">
<br><br>
<center><a href="adminh.php" class="btn btn-success">Home</a></center><br><br>
<table class="table table-hover">
<tr>
	<th>User Name</th>
	<th>Full Name</th>
    <th>Address</th>
    <th>Email ID</th>
	<th>Mobile No</th>
	<th></th>
</tr>
<?php
	while($row = mysqli_fetch_row($rs)){
?>
<tr>
	<td><?=$row[0]?></td>
	<td><?=$row[2]?></td>
	<td><?=$row[3]?></td>
	<td><?=$row[4]?></td>
	<td><?=$row[5]?></td>
	<td><a href="validate-user1.php?status=<?=$row[6]?>&uid=<?=$row[0]?>" class="btn btn-warning"><?=$row[6]==0?"Activate":"Deactivate"?></a></td>
</tr>
<?php
	}
?>
</table>
</div>