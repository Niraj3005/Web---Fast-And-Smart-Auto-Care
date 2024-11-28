<?php include "connect.php"?>

<?php
	if(isset($_GET['del'])){
		mysqli_query($con, "delete from contact where id=".$_GET['del']);
	}
?>

<title>Auto care</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
    $rs = mysqli_query($con, "select * from contact order by id");
?>
<div class="container">
<br><br>
<center><a href="adminh.php" class="btn btn-success">Home</a></center><br><br>
<table class="table table-hover">
<tr>
    <th>ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Message</th>
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
	<td><a href="view-admin-contact.php?del=<?=$row[0]?>" class="btn btn-success" onclick="return confirm('Delete contact?')">Delete</a></td>
</tr>
<?php
	}
?>
</table>
</div>