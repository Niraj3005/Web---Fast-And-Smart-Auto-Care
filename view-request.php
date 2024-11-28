<?php session_start()?>
<?php include "connect.php"?>
	<title>Auto care</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
<body>
<?php
    $muserid = $_SESSION["muserid"];

    $rs = mysqli_query($con, "select request_id, request_date, fullname, phone, distance from customer, request where customer.username = request.cust_username and request.mechanic_username='$muserid' and request.status='Pending'");
?>
<div class="container">
<br><br>
<center><a href="mh.php" class="btn btn-success">Home</a></center><br><br>
<table class="table table-hover">
<tr>
    <th>Request ID</th>
	<th>Request Date</th>
	<th>Name</th>
	<th>Phone</th>
	<th>Distance</th>
    <th></th>
    <th></th>
</tr>
<?php
	while($row = mysqli_fetch_row($rs)){
?>
<tr>
	<td><?=$row[0]?></td>
	<td><?=$row[1]?></td>
	<td><?=$row[2]?></td>
	<td><?=$row[3]?></td>
	<td><?=$row[4]?></td>
	<td><a href="accept-request.php?rid=<?=$row[0]?>" class="btn btn-warning">Accept</a></td>
    <td><a href="reject-request.php?rid=<?=$row[0]?>" class="btn btn-warning">Reject</a></td>
</tr>
<?php
	}
?>
</table>
</div>