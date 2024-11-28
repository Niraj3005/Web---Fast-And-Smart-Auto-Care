<?php include "connect.php"?>
<?php
    $rid = $_GET['rid'];
    $rs = mysqli_query($con, "select * from bill where request_id=$rid");

    if(mysqli_num_rows($rs)>0){
?>
    <script language="javascript" type="text/javascript">
    alert("Bill already sent")
    window.location="generate-bill.php";
    </script>                       
<?php
    }

    $rs = mysqli_query($con, "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'autocare' AND TABLE_NAME = 'bill'");
    $row = mysqli_fetch_row($rs);
    $bid = $row[0];

    $rs = mysqli_query($con, "select current_date");
    $row = mysqli_fetch_row($rs);
    $bdate = $row[0];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/ur.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"> 
  </head>
  <body>
  <form class="form" action="post-bill1.php" method="post">
    <b style="color: white;">Bill No:</b>
    <input class="user-input" type="text" name="bid" value="<?=$bid?>" readonly>
    <b style="color: white;">Bill Date:</b>
    <input class="user-input" type="text" name="bdate" value="<?=$bdate?>" readonly>
    <b style="color: white;">Request ID:</b>
    <input class="user-input" type="text" name="rid" value="<?=$_GET['rid']?>" readonly>
    <b style="color: white;">Vehicle No:</b>
    <input class="user-input" type="text" name="vno" placeholder="Vehicle No" pattern="^[A-Z]{2} [0-9]{2} [A-Z]{2} [0-9]{4}$" required>
    <b style="color: white;">Bill Amount:</b>
    <input class="user-input" type="number" name="bamt" placeholder="Bill Amount" min=500 required>
    <b style="color: white;">Select Services:</b>
    <select class="user-input" name="sid[]" multiple>
<?php
    $rs = mysqli_query($con, "select * from services");
    while($row=mysqli_fetch_row($rs)){
?>
    <option value='<?=$row[0]?>'><?=$row[1]?></option>
<?php
    }
?>
    </select>
    <input class="btn" type="submit" name="" value="SEND">
  </form>
</body>
</html>