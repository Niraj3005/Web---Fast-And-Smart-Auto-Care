<?php session_start()?>
<?php include "connect.php"?>
<?php
    $cuserid = $_SESSION["cuserid"];
    $muserid = $_GET["uid"];
    $dist = $_GET["dist"];

	$rs = mysqli_query($con, "insert into request(cust_username, mechanic_username,distance) values('$cuserid','$muserid',$dist)");
?>
<script>
    alert("Request submitted successfully.")
    window.location = "home.php"
</script>
