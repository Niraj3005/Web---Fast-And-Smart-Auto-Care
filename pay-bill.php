<?php session_start()?>
<?php include "connect.php"?>

	<title>Auto care</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
    $cuserid = $_SESSION["cuserid"];

    $rs = mysqli_query($con, "select bill_no, bill_date, bill.request_id, vehicle_no, bill_amt from bill, request where bill.request_id = request.request_id and bill_status='Pending' and cust_username='$cuserid'");
?>
<div class="container">
<br><br>
<center><a href="home.php" class="btn btn-success">Home</a></center><br><br>
<table class="table table-hover">
<tr>
    <th>Bill No</th>
	<th>Bill Date</th>
	<th>Request ID</th>
	<th>Vehicle No</th>
	<th>Bill Amt</th>
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
	<td><a href="pay-bill1.php?bno=<?=$row[0]?>" class="btn btn-warning">Pay Bill</a></td>
</tr>
<?php
	}
?>
</table>
</div>