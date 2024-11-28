<?php include "connect.php"?>
<body>
<?php
	$sid = $_GET["sid"];

    mysqli_query($con, "delete from services where service_id=$sid");
    header("Location: view-service.php");
?>
