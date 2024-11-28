<?php include "connect.php"?>

<?php
	$uid = $_GET["uid"];
	$status = $_GET["status"];

	$status = $status==0?1:0;

	mysqli_query($con, "UPDATE customer SET status=$status WHERE username='$uid'");

	header("Location: validate-user.php");
?>