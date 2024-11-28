<?php session_start()?>
<?php include "connect.php"?>
<?php
	$uid = $_POST["mid"];
	$pwd = $_POST["mpwd"];
	
	$rs = mysqli_query($con, "select * from mechanic where username='$uid' and password='$pwd' and status=1");

	if(mysqli_num_rows($rs)>0){
		$_SESSION["muserid"] = $uid;
		header("Location: mh.php");
	}
	else{
?>
<script language="javascript" type="text/javascript">
	alert("Login failed. Invalid details or account not activated yet!!!")
	window.location="ml.php"
</script>
<?php
  	}
?>