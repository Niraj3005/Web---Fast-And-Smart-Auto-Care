<?php session_start()?>
<?php include "connect.php"?>

	<title>Auto care</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
 	$muserid = $_SESSION['muserid'];

    $rs = mysqli_query($con, "select feedback_id, feedback_date, fullname, feedback_msg from feedback, customer where feedback.cust_userid = customer.username and mechanic_userid = '$muserid' order by feedback_id");
?>
<div class="container">
<br><br>
<center><a href="mh.php" class="btn btn-success">Home</a></center><br><br>
<table class="table table-hover">
<tr>
    <th>Feedback ID</th>
	<th>Feedback Date</th>
	<th>Customer Name</th>
	<th>Feedback</th>
</tr>
<?php
	while($row = mysqli_fetch_row($rs)){
?>
<tr>
	<td><?=$row[0]?></td>
	<td><?=$row[1]?></td>
	<td><?=$row[2]?></td>
	<td><?=$row[3]?></td>
</tr>
<?php
	}
?>
</table>
</div>