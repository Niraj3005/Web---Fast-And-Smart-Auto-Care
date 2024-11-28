<?php include "connect.php"?>
<?php 
    $bno = $_GET["bno"];
    $rs = mysqli_query($con, "select * from bill where bill_no=$bno");
    $row = mysqli_fetch_row($rs);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Auto care</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/ur.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
  </head>
  <body>
  <form class="form" action="pay-bill2.php" method="post">
    <b style="color: white;">Bill No:</b>
    <input class="user-input" type="text" name="bid" value="<?=$row[0]?>" readonly>
    <b style="color: white;">Bill Date:</b>
    <input class="user-input" type="text" name="bdate" value="<?=$row[1]?>" readonly>
    <b style="color: white;">Request ID:</b>
    <input class="user-input" type="text" name="rid" value='<?=$row[2]?>' readonly>
    <b style="color: white;">Vehicle No:</b>
    <input class="user-input" type="text" name="vno" value='<?=$row[3]?>' readonly>
    <b style="color: white;">Bill Amount:</b>
    <input class="user-input" type="text" name="bamt" value='<?=$row[4]?>' readonly>
    <b style="color: white;">Services:</b>
    <p style="text-align: left;">
    <ol style="color:white;">
<?php
    $rs = mysqli_query($con, "select service_name from services, bill_services where bill_services.service_id = services.service_id and bill_no=$bno");
    while($row = mysqli_fetch_row($rs)){
?>
    <li><?=$row[0]?></li>
<?php
    }
?>
    </ol>
    </p>
    <b style="color: white;">Card No:</b>
    <input class="user-input" type="text" name="cardno" placeholder="xxxx xxxx xxxx xxxx" pattern="^[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$" required>
    <b style="color: white;">Bank Name:</b>
    <input class="user-input" type="text" name="bname" placeholder="Bank Name" required>
    <input class="btn" type="submit" name="" value="PAY NOW">
  </form>
</body>
</html>