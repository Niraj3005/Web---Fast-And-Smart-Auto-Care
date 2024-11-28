<?php include "connect.php"?>
	<title>Auto care</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
    $rs = mysqli_query($con, "select request_id, request_date, fullname, phone, distance, request.status from customer, request where customer.username = request.cust_username");
?>
<div class="container">
<br><br>
<center><a href="adminh.php" class="btn btn-success">Home</a></center><br><br>
<table class="table table-hover">
<tr>
    <th>Request ID</th>
	<th>Request Date</th>
	<th>Name</th>
	<th>Phone</th>
	<th>Distance</th>
    <th>Status</th>
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
	<td><?=$row[5]?></td>
</tr>
<?php
	}
?>
</table>
</div>