<?php include "connect.php"?>

<?php

	$rs = mysqli_query($con, "SELECT mechanic_fullname as name, latitude as lat, longitude as lon, service_center_name as description FROM mechanic");
    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    echo json_encode($data);
?>