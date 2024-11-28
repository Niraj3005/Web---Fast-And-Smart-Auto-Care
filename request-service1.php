<?php include "connect.php"?>

<title>Auto care</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<body>
<?php
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];

    $dist = 10;

    $query = "SELECT username, service_center_name, mechanic_fullname, address, phone, latitude, longitude, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat - latitude)*pi()/180/2),2)+COS($lat*pi()/180 )*COS(latitude*pi()/180)*POWER(SIN(($lon-longitude)*pi()/180/2),2))) as distance FROM mechanic WHERE longitude between ($lon-$dist/cos(radians($lat))*69) and ($lon+$dist/cos(radians($lat))*69) and latitude between ($lat-($dist/69)) and ($lat+($dist/69)) having distance < $dist ORDER BY distance limit 100"; 


    $rs = mysqli_query($con, $query);
?>
<div class="container">
    <br><br>
    <center><a href="home.php" class="btn btn-success">Home</a></center><br><br>
    <table class="table table-hover">
    <tr>
        <th>Service Center Name</th>
        <th>Owner Name</th>
        <th>Address</th>
        <th>Mobile No</th>
        <th>Distance</th>
        <th></th>
    </tr>
    <?php
        while($row = mysqli_fetch_row($rs)){
    ?>
    <tr>
        <td><?=$row[1]?></td>
        <td><?=$row[2]?></td>
        <td><?=$row[3]?></td>
        <td><?=$row[4]?></td>
        <td><?=$row[7]?></td>
        <td><a href="send-request.php?uid=<?=$row[0]?>&dist=<?=$row[7]?>" class="btn btn-warning">Send Request</a></td>
    </tr>
    <?php
        }
    ?>
    </table>
    </div>